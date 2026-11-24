<?php

namespace Nickcheek\Brightree\Traits;

use SoapClient;

/**
 * SoapClient subclass that strips invalid XML 1.0 characters from SOAP
 * responses before the parser sees them.
 *
 * Brightree can occasionally store legal characters in databases but illegal
 * in XML 1.0, causing SoapClient to throw "looks like we got no XML
 * document". This class transparently sanitizes the response.
 *
 * Legal XML 1.0 chars: #x9 | #xA | #xD | [#x20-#xD7FF] | ...
 * Everything else below #x20 is stripped (both literal bytes and
 * &#xNN; character references).
 */
class SanitizedSoapClient extends SoapClient
{
	public function __doRequest(
		string $request,
		string $location,
		string $action,
		int $version,
		bool $oneWay = false
	): ?string {
		$response = parent::__doRequest($request, $location, $action, $version, $oneWay);
		if ($response === null) {
			return null;
		}
		// Strip illegal XML 1.0 character references (&#x0; through &#x1F;, excluding &#x9; &#xA; &#xD;)
		$response = preg_replace('/&#x([0-8BbCcEe]|0[0-8BbCcEe]|1[0-9A-Fa-f]);/', '', $response);
		// Strip literal bytes in the same range
		$response = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/', '', $response);
		return $response;
	}
}
