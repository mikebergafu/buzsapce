<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'user_type' => 'sometimes|in:space_owner,space_seeker',
            'business_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        $request->user()->update($data);

        return response()->json(['user' => $request->user()->fresh()]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->tokens()->delete();
        $user->spaces()->delete();
        $user->delete();

        return response()->json(['message' => 'Account deleted']);
    }
}
