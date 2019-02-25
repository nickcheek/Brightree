<?php

namespace Nickcheek\Brightree;

use SoapClient;
use Nickcheek\Brightree\Service\Patient;


class Brightree
{
	private $wsdl;
	private $connection;
	protected $patient_options;
	protected $document_options;
	protected $documentation_options;
	
	public function __construct()
	{
		
	}
	
	public function Patient()
    {
    	return new Patient();
    }
	
	public function Document()
    {
    	return new Document();
    }
    
	public function Documentation()
    {
    	return new Documentation();
    }
    
        
}
