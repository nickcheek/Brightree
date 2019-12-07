<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Document extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

	public function __construct(object $info)
	{
	    $this->info = $info;
        $this->wsdl = $this->info->config->service['document'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['document'],'location' => $this->info->config->service['document'],'trace' => 1);
	}
    
	public function DocumentTypesFetchAll(): object
    {
    	return $this->apiCall('DocumentTypesFetchAll',[]);
    }
    
    public function DocumentBatchCreate($query): object
    {
    	return $this->apiCall('DocumentBatchCreate',$query);
    }
    
    public function DocumentBatchSearch($query): object
    {
    	return $this->apiCall('DocumentBatchSearch',$query);
    }
    
    public function DocumentSearch($query): object
    {
    	return $this->apiCall('DocumentSearch',$query);
    }
    
    public function FetchDocumentContent($key='12345'): object
    {
    	return $this->apiCall('FetchDocumentContent',array('documentKey' => $key));
    }
    
    public function GenerateDocumentID($query): object
    {
    	return $this->apiCall('GenerateDocumentID',$query);
    }
    
    public function StoreDocument($query): object
    {
    	return $this->apiCall('StoreDocument',$query);
    }
}