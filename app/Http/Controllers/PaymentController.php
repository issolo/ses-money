<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakePaymentRequest;
use App\Jobs\MakePaymentJob;
use App\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakePaymentRequest $request): JsonResponse
    {
        try {
            $job = new MakePaymentJob($request->all());
            $this->dispatch($job);
            return response()->json(array_merge($request->all(), $job->getMakePaymentResponse()), 201);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(array_merge($request->all(), [
                'status' => 'failed',
                'code' => 5000,
                'reason' => 'payment could not be processed'
            ]));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return Payment
     */
    public function show(Payment $payment): Payment
    {
        return $payment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}