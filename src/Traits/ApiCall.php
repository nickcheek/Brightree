<?php

namespace Nickcheek\Brightree\Traits;

trait ApiCall
{
	/**
	 * @throws \SoapFault
	 */
	public function apiCall($call,$query) {
        $client = new SanitizedSoapClient($this->wsdl, $this->options);
        return $client->$call($query);
    }
}