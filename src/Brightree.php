<?php

namespace Nickcheek\Brightree;

use SoapClient;
use Nickcheek\Brightree\Service\Patient;
use Nickcheek\Brightree\Service\Document;
use Nickcheek\Brightree\Service\DocumentManagement;


class Brightree
{
	
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
