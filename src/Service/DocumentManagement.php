<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class DocumentManagement extends Brightree
{
    use ApiCall;
    protected $options;
    protected $wsdl;

	public function __construct()
	{
		parent::__construct();
        $this->wsdl = $this->config->service['documentmanagement'] .'?singleWsdl';
		$this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['documentmanagement'],'location' => $this->config->service['documentmanagement'],'trace' => 1);
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