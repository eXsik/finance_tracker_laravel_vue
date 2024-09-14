<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavingsGoalRequest;
use App\Models\SavingsGoal;
use Illuminate\Http\Request;

class SavingsGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $savings = $request->user()->savingsGoal()->latest()->get();

        return response()->json($savings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavingsGoalRequest $request)
    {
        $savings = $request->user()->savingsGoal()->create($request->validated());

        return response()->json($savings, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(SavingsGoal $savingsGoal)
    {
        return response()->json($savingsGoal, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavingsGoalRequest $request, SavingsGoal $savingsGoal)
    {
        $savingsGoal->updated($request->validated);

        return response()->json($savingsGoal, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SavingsGoal $savingsGoal)
    {
        $savingsGoal->delete();

        return response()->json(null, 200);
    }
}
