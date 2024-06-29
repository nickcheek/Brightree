<?php

namespace Nickcheek\Brightree\Traits;

use SoapClient;

trait ApiCall
{
	/**
	 * @throws \SoapFault
	 */
	public function apiCall($call,$query) {
        $client = new SoapClient($this->wsdl, $this->options);
        return $client->$call($query);
    }
}