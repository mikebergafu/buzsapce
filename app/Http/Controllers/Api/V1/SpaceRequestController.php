<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SpaceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpaceRequestController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'space_id' => 'required|exists:spaces,id',
            'pricing_type' => 'nullable|string',
            'message' => 'nullable|string|max:500',
        ]);

        $space = \App\Models\Space::findOrFail($data['space_id']);
        if ($space->user_id === $request->user()->id) {
            return response()->json(['message' => 'You cannot request your own space'], 422);
        }

        $spaceRequest = SpaceRequest::create([
            ...$data,
            'user_id' => $request->user()->id,
        ]);

        $spaceRequest->load('space');

        return response()->json(['data' => $spaceRequest], 201);
    }

    public function myRequests(Request $request): JsonResponse
    {
        $requests = SpaceRequest::with('space.images')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json(['data' => $requests]);
    }

    public function incomingRequests(Request $request): JsonResponse
    {
        $requests = SpaceRequest::with('space', 'user:id,name,phone,country_code')
            ->whereHas('space', fn ($q) => $q->where('user_id', $request->user()->id))
            ->latest()
            ->get();

        return response()->json(['data' => $requests]);
    }

    public function updateStatus(Request $request, SpaceRequest $spaceRequest): JsonResponse
    {
        abort_unless($spaceRequest->space->user_id === $request->user()->id, 403);

        $data = $request->validate(['status' => 'required|in:approved,rejected']);
        $spaceRequest->update($data);

        return response()->json(['data' => $spaceRequest]);
    }
}
