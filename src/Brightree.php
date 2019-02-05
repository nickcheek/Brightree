<?php

namespace Nickcheek\Brightree;

use SoapClient;

class Brightree
{
   public function GetNoteByKey($id='141508')
    {
    	$opts = array(
            'login' => env('BT_USER'),
            'password' => env('BT_PASS'),
            'uri' => config('brightree.patient'),
            'location' => config('brightree.patient'),
            'trace' => 1
			);
    
        $client   = new SoapClient(config('brightree.patient'.'?singleWsdl'),$opts);
        $response   = $client->PatientNoteFetchByKey(array('brightreeID' => $id));
        return $response;
    }
}
