<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Document
{
	protected $document;
	protected $document_options;

	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->document = $config->document;
		$this->document_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => $this->document,'location' => $this->document,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->document .'?singleWsdl', $this->document_options);
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