<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = wallet::all();
        return response()->json($wallets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'wallet_name' => 'required|string|max:255',
            'wallet_address' => 'required|string|max:255',
            'wallet_balance' => 'required', 
            'wallet_description' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $validatedData = $validator->validated();

        $wallet = Wallet::create($validatedData);

        return response()->json($wallet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(wallet $wallet)
    {
        return response()->json([
            'balance' => $wallet->wallet_balance,
            'transactions' => $wallet->transactions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
