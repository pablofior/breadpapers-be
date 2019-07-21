<?php

if (! function_exists('formatDate')) {
    function formatDate($inputFormat, $date, $outputFormat = 'd/m/Y') {
        return \Carbon\Carbon::createFromFormat($inputFormat, $date)->format($outputFormat);
    }
}