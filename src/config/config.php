<?php

return (object) [
	'service'=>[
		'document'=>'https://webservices.brightree.net/v0100-1610/DocumentationService/DocumentManagementService.svc',
		'patient' => 'https://webservices.brightree.net/v0100-1802/OrderEntryService/patientservice.svc',
		'documentation' => 'https://webservices.brightree.net/v0100-1811/DocumentationService/DocumentationService.svc',
		'custom' => 'https://webservices.brightree.net/v0100-1610/CustomFieldService/CustomFieldService.svc',
		'insurance' => 'https://webservices.brightree.net/v0100-1610/OrderEntryService/InsuranceService.svc',
		'reference' => 'https://webservices.brightree.net/v0100-1811/ReferenceDataService/ReferenceDataService.svc',
		'doctor' => 'https://webservices.brightree.net/v0100-1706/DoctorService/DoctorService.svc',
		'inventory' => 'https://webservices.brightree.net/v0100-1709/InventoryService/InventoryService.svc',
		'pickup' => 'https://webservices.brightree.net/v0100-1610/OrderEntryService/PickupExchangeService.svc',
		'salesorder' => 'https://webservices.brightree.net/v0100-1807/OrderEntryService/SalesOrderService.svc',
	],
	'user'=>[
		'name'=>'username',
		'pass'=>'pass',
	]
	
];