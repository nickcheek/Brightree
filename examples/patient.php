<?php

require_once 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;

$brightree = new Brightree('nick@nicholascheek','myPa$$word');

$response = $brightree->Patient()->PatientFetchByPatientID(12345);

print_r($response);