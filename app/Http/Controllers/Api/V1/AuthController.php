<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SendCodeRequest;
use App\Http\Requests\Api\VerifyCodeRequest;
use App\Models\User;
use App\Models\VerificationCode;
use App\Notifications\SendVerificationCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Send a verification code to the given identifier (phone or email).
     */
    public function sendCode(SendCodeRequest $request): JsonResponse
    {
        $identifier = $request->normalizedIdentifier();

        $verificationCode = VerificationCode::generate($identifier);

        // Find or create a temporary user to deliver the notification
        $user = $this->resolveUser($request);

        $channel = $request->isEmail() ? 'mail' : 'sms';
        $user->notify(new SendVerificationCode($verificationCode->code, $channel));

        Log::info('Verification code sent', ['identifier' => $identifier]);

        return response()->json([
            'message' => 'Verification code sent.',
            'expires_in' => 600,
        ]);
    }

    /**
     * Verify the code and issue a Sanctum token.
     */
    public function verifyCode(VerifyCodeRequest $request): JsonResponse
    {
        $identifier = $request->normalizedIdentifier();

        if (! VerificationCode::verify($identifier, $request->input('code'))) {
            throw ValidationException::withMessages([
                'code' => ['The verification code is invalid or expired.'],
            ]);
        }

        $user = $this->resolveUser($request);

        // Mark as verified
        if ($request->isEmail()) {
            $user->forceFill(['email_verified_at' => now()])->saveQuietly();
        } else {
            $user->forceFill(['phone_verified_at' => now()])->saveQuietly();
        }

        // Revoke existing tokens for this device and issue a new one
        $user->tokens()->where('name', $request->input('device_name'))->delete();
        $token = $user->createToken($request->input('device_name'));

        return response()->json([
            'token' => $token->plainTextToken,
            'user' => $user,
        ], 200);
    }

    /**
     * Resolve or create the user based on the request identifier.
     */
    private function resolveUser(SendCodeRequest|VerifyCodeRequest $request): User
    {
        if ($request->isEmail()) {
            return User::firstOrCreate(
                ['email' => $request->normalizedIdentifier()],
                ['name' => explode('@', $request->normalizedIdentifier())[0]],
            );
        }

        return User::firstOrCreate(
            ['phone' => $request->input('identifier'), 'country_code' => $request->input('country_code')],
            ['name' => 'User'],
        );
    }
}
