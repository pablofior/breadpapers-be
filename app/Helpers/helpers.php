<?php

if (! function_exists('formatDate')) {
    function formatDate($inputFormat, $date, $outputFormat = 'd/m/Y') {
        return \Carbon\Carbon::createFromFormat($inputFormat, $date)->format($outputFormat);
    }
}

if(! function_exists('validate')) {
    function validate($data = [], $rules = []) {
        $validator = \Illuminate\Support\Facades\Validator::make($data, $rules);

        return $validator;
    }
}