<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $customers = Customer::latest()->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Customers fetched successfully.',
            'data' => $customers->items(),

            'pagination' => [
                'current_page' => $customers->currentPage(),
                'last_page' => $customers->lastPage(),
                'per_page' => $customers->perPage(),
                'total' => $customers->total(),
                'next_page_url' => $customers->nextPageUrl(),
                'prev_page_url' => $customers->previousPageUrl(),
            ]

        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:customers,email',

            'phone' => 'required|string|max:20',

            'city' => 'nullable|string|max:255',

        ]);

        $customer = Customer::create($validated);

        return response()->json([

            'success' => true,

            'message' => 'Customer created successfully.',

            'data' => $customer

        ], 201);
    }
}