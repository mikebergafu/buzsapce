<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Space;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index(): JsonResponse
    {
        $spaces = Space::with('pricingOptions', 'images', 'user:id,name,phone,country_code')
            ->where('is_available', true)
            ->latest()
            ->get();

        return response()->json(['data' => $spaces]);
    }

    public function mySpaces(Request $request): JsonResponse
    {
        $spaces = $request->user()->spaces()->with('pricingOptions', 'images')->latest()->get();

        return response()->json(['data' => $spaces]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'structure_type' => 'nullable|string|max:50',
            'suitable_for' => 'nullable|array',
            'suitable_for.*' => 'string|max:50',
            'description' => 'nullable|string|max:2000',
            'location' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'width' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'dimension_unit' => 'sometimes|in:ft,m',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|max:5120',
            'pricing_options' => 'required|array|min:1',
            'pricing_options.*.type' => 'required|in:daily,monthly,commission',
            'pricing_options.*.amount' => 'required|numeric|min:0',
        ]);

        $pricingOptions = $data['pricing_options'];
        unset($data['pricing_options'], $data['images']);

        $space = $request->user()->spaces()->create($data);
        $space->pricingOptions()->createMany($pricingOptions);

        // Handle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('spaces', 'public');
                $space->images()->create(['path' => $path]);
            }
        }

        $space->load('pricingOptions', 'images');

        return response()->json(['data' => $space], 201);
    }

    public function update(Request $request, Space $space): JsonResponse
    {
        abort_unless($space->user_id === $request->user()->id, 403);

        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'structure_type' => 'nullable|string|max:50',
            'suitable_for' => 'nullable|array',
            'suitable_for.*' => 'string|max:50',
            'description' => 'nullable|string|max:2000',
            'location' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'width' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'dimension_unit' => 'sometimes|in:ft,m',
            'status' => 'sometimes|in:available,taken,maintenance',
        ]);

        if (isset($data['status'])) {
            $space->is_available = $data['status'] === 'available';
            $space->status = $data['status'];
            unset($data['status']);
        }

        $space->update($data);
        $space->load('pricingOptions', 'images');

        return response()->json(['data' => $space]);
    }
}
