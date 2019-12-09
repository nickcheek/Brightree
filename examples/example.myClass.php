<?php

include 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;

class myClass {

    protected object $bt;

    public function __construct()
    {
        $username = 'nick@nicholascheek';
        $password = 'myPa$$word';

        $this->bt = new Nickcheek\Brightree\Brightree($username,$password);
    }

    public function getPatient($patient)
    {
        return $this->bt->Patient()->PatientFetchByPatientID($patient);
    }
}

$brightree = new myClass();
$response = $brightree->getPatient(12345);
print_r($response);