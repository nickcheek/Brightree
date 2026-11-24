<?php

namespace Nickcheek\Brightree\Traits;

use Nickcheek\Brightree\Exceptions\BrightreeException;

trait Custom {
    use ApiCall;

    public function Custom($service, $object) : object
    {
        try {
            return $this->apiCall($service, $object);
        } catch (BrightreeException $e) {
            throw $e;
        } catch (\SoapFault $e) {
            throw BrightreeException::fromSoapFault($e, ['method' => $service, 'params' => $object]);
        } catch (\Throwable $e) {
            throw new BrightreeException("Error calling $service: " . $e->getMessage(), 0, $e);
        }
    }
}
