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

    /**
     * Fetch all document types
     *
     * @return object
     */
	public function DocumentTypesFetchAll(): object
    {
    	return $this->apiCall('DocumentTypesFetchAll',[]);
    }

    /**
     * Create batch document
     *
     * @param array $query
     * @return object
     */
    public function DocumentBatchCreate(array $query): object
    {
    	return $this->apiCall('DocumentBatchCreate',$query);
    }

    /**
     * Search batch document
     *
     * @param array $query
     * @return object
     */
    public function DocumentBatchSearch(array $query): object
    {
    	return $this->apiCall('DocumentBatchSearch',$query);
    }

    /**
     * Search for a document
     *
     * @param array $query
     * @return object
     */
    public function DocumentSearch(array $query): object
    {
    	return $this->apiCall('DocumentSearch',$query);
    }

    /**
     * Get content of a document
     *
     * @param int $key
     * @return object
     */
    public function FetchDocumentContent(int $key=12345): object
    {
    	return $this->apiCall('FetchDocumentContent',array('documentKey' => $key));
    }

    /**
     * Generate a document id number
     *
     * @param array $query
     * @return object
     */
    public function GenerateDocumentID(array $query): object
    {
    	return $this->apiCall('GenerateDocumentID',$query);
    }

    /**
     * Store a document
     *
     * @param array $query
     * @return object
     */
    public function StoreDocument(array $query): object
    {
    	return $this->apiCall('StoreDocument',$query);
    }
}