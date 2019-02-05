<?php

namespace Nickcheek\Brightree;

use SoapClient;

class Brightree
{
   public static function GetNoteByKey($id='141508')
    {
    	$opts = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
        $client   = new SoapClient(config('brightree.patient').'?singleWsdl',$opts);
        $response   = $client->PatientNoteFetchByKey(array('brightreeID' => $id));
        return $response;
    }
    
    public static function GetNotesByPatient($id='12345') 
    {
		$opts = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
	    $client   = new SoapClient(config('brightree.patient').'?singleWsdl',$opts);
        $response   = $client->PatientNoteFetchByPatient(array('brightreeID' => $id));
        return $response;
    }
}
