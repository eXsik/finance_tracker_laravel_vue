<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = $request->user()->transactions()->with('category')->latest()->get();

        return response()->json($transactions, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $transaction = $request->user()->transactions()->create($request->validated());

        return response()->json($transaction, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return response()->json($transaction->load('category'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return response()->json($transaction, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json(null, 204);
    }
}
