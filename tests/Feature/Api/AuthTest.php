<?php

use App\Models\User;
use App\Models\VerificationCode;
use App\Notifications\SendVerificationCode;
use Illuminate\Support\Facades\Notification;

beforeEach(function () {
    Notification::fake();
});

test('send code requires an identifier', function () {
    $this->postJson('/api/v1/auth/send-code', [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['identifier']);
});

test('send code requires country_code for phone identifiers', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => '5551234567',
    ])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['country_code']);
});

test('send code accepts valid email identifier', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ])
        ->assertSuccessful()
        ->assertJsonStructure(['message', 'expires_in']);

    Notification::assertSentTo(
        User::where('email', 'user@example.com')->first(),
        SendVerificationCode::class,
    );
});

test('send code accepts valid phone identifier with country code', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => '5551234567',
        'country_code' => '+1',
    ])
        ->assertSuccessful()
        ->assertJsonStructure(['message', 'expires_in']);

    Notification::assertSentTo(
        User::where('phone', '5551234567')->first(),
        SendVerificationCode::class,
    );
});

test('send code creates user if not exists for email', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'newuser@example.com',
    ])->assertSuccessful();

    $this->assertDatabaseHas('users', ['email' => 'newuser@example.com']);
});

test('send code creates user if not exists for phone', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => '5559876543',
        'country_code' => '+44',
    ])->assertSuccessful();

    $this->assertDatabaseHas('users', ['phone' => '5559876543', 'country_code' => '+44']);
});

test('verify code requires all fields', function () {
    $this->postJson('/api/v1/auth/verify-code', [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['identifier', 'code', 'device_name']);
});

test('verify code rejects invalid code', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ]);

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => '000000',
        'device_name' => 'iPhone 15',
    ])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['code']);
});

test('verify code issues token for valid email code', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ]);

    $code = VerificationCode::where('identifier', 'user@example.com')->first()->code;

    $response = $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => $code,
        'device_name' => 'iPhone 15',
    ]);

    $response->assertSuccessful()
        ->assertJsonStructure(['token', 'user']);

    expect($response->json('token'))->not->toBeEmpty();
});

test('verify code issues token for valid phone code', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => '5551234567',
        'country_code' => '+1',
    ]);

    $code = VerificationCode::where('identifier', '+15551234567')->first()->code;

    $response = $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => '5551234567',
        'country_code' => '+1',
        'code' => $code,
        'device_name' => 'Android Pixel',
    ]);

    $response->assertSuccessful()
        ->assertJsonStructure(['token', 'user']);
});

test('verify code marks email as verified', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ]);

    $code = VerificationCode::where('identifier', 'user@example.com')->first()->code;

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => $code,
        'device_name' => 'iPhone 15',
    ]);

    expect(User::where('email', 'user@example.com')->first()->email_verified_at)->not->toBeNull();
});

test('verify code marks phone as verified', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => '5551234567',
        'country_code' => '+1',
    ]);

    $code = VerificationCode::where('identifier', '+15551234567')->first()->code;

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => '5551234567',
        'country_code' => '+1',
        'code' => $code,
        'device_name' => 'iPhone 15',
    ]);

    expect(User::where('phone', '5551234567')->first()->phone_verified_at)->not->toBeNull();
});

test('expired code is rejected', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ]);

    $record = VerificationCode::where('identifier', 'user@example.com')->first();
    $record->update(['expires_at' => now()->subMinute()]);

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => $record->code,
        'device_name' => 'iPhone 15',
    ])->assertUnprocessable();
});

test('code cannot be reused after verification', function () {
    $this->postJson('/api/v1/auth/send-code', [
        'identifier' => 'user@example.com',
    ]);

    $code = VerificationCode::where('identifier', 'user@example.com')->first()->code;

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => $code,
        'device_name' => 'iPhone 15',
    ])->assertSuccessful();

    $this->postJson('/api/v1/auth/verify-code', [
        'identifier' => 'user@example.com',
        'code' => $code,
        'device_name' => 'iPhone 15',
    ])->assertUnprocessable();
});

test('authenticated user can access protected route', function () {
    $user = User::factory()->create();
    $token = $user->createToken('test')->plainTextToken;

    $this->getJson('/api/user', [
        'Authorization' => "Bearer $token",
    ])->assertSuccessful();
});
