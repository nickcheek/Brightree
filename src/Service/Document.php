<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use SoapClient;

class Document extends Brightree
{
	protected $document_options;

	public function __construct()
	{
		parent::__construct();

		$this->document_options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['document'],'location' => $this->config->service['document'],'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->config->service['document'] .'?singleWsdl', $this->document_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	public function DocumentTypesFetchAll()
    {
    	return $this->apiCall('DocumentTypesFetchAll',[]);
    }
    
    public function DocumentBatchCreate($query)
    {
    	return $this->apiCall('DocumentBatchCreate',$query);
    }
    
    public function DocumentBatchSearch($query)
    {
    	return $this->apiCall('DocumentBatchSearch',$query);
    }
    
    public function DocumentSearch($query)
    {
    	return $this->apiCall('DocumentSearch',$query);
    }
    
    public function FetchDocumentContent($key='12345')
    {
    	return $this->apiCall('FetchDocumentContent',array('documentKey' => $key));
    }
    
    public function GenerateDocumentID($query)
    {
    	return $this->apiCall('GenerateDocumentID',$query);
    }
    
    public function StoreDocument($query)
    {
    	return $this->apiCall('StoreDocument',$query);
    }
}