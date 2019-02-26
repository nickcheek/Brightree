<?php

namespace Nickcheek\Brightree;

use SoapClient;
use Nickcheek\Brightree\Service\Patient;
use Nickcheek\Brightree\Service\Doctor;
use Nickcheek\Brightree\Service\Document;
use Nickcheek\Brightree\Service\DocumentManagement;
use Nickcheek\Brightree\Service\CustomField;
use Nickcheek\Brightree\Service\Insurance;

class Brightree
{

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
    
    public function CustomField()
    {
    	return new CustomField();
    }
    
    public function Insurance()
    {
    	return new Insurance();
    }

    public function Doctor()
    {
    	return new Doctor();
    }
    
        
}
