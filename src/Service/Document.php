<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Document extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

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
     * @param iterable $query
     * @return object
     */
    public function DocumentBatchCreate(iterable $query): object
    {
    	return $this->apiCall('DocumentBatchCreate',$query);
    }

    /**
     * Search batch document
     *
     * @param iterable $query
     * @return object
     */
    public function DocumentBatchSearch(iterable $query): object
    {
    	return $this->apiCall('DocumentBatchSearch',$query);
    }

    /**
     * Document batch update
     *
     * @param iterable $query
     * @return object
     */
    public function DocumentPropertyUpdate(iterable $query): object
    {
    	return $this->apiCall('DocumentPropertyUpdate',$query);
    }

    /**
     * Document Review update
     *
     * @param iterable $query
     * @return object
     */
    public function DocumentReviewUpdate(iterable $query): object
    {
    	return $this->apiCall('DocumentReviewUpdate',$query);
    }

    /**
     * Search for a document
     *
     * @param iterable $query
     * @return object
     */
    public function DocumentSearch(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function GenerateDocumentID(iterable $query): object
    {
    	return $this->apiCall('GenerateDocumentID',$query);
    }

    /**
     * Store a document
     *
     * @param iterable $query
     * @return object
     */
    public function StoreDocument(iterable $query): object
    {
    	return $this->apiCall('StoreDocument',$query);
    }
}