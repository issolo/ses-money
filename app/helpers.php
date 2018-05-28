<?php

function failedValidationResponse($errors){
    $response = [];
    foreach ($errors as $key => $array) {
        $response[$key] = $array[0];
    }
    return $response;
}

function merchantIdValidated(\App\Merchant $merchant, $merchant_id){
    return $merchant->ses_money_id === $merchant_id;
}

function amountToFloat(string $amount): float
{
    return (float) (((int) $amount) / 100);
}

function amountToMinor($amount): string
{
    $string = ((float) $amount) * 100;
    return str_pad($string, 12, '0', STR_PAD_LEFT);
}