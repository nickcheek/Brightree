<?php

require_once 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;

$brightree = new Brightree('nick@nicholascheek','myPa$$word');

$patientService = $brightree->Patient();

// Numeric values are treated as Brightree IDs.
$response = $patientService->find(12345);

// String values are treated as Patient IDs.
$patientByPatientId = $patientService->find('PAT-12345');

$patientByExternalId = $patientService->findByExternalId('EXT-12345');
$patientsByName = $patientService->findByName('Smith', 'John');
$patientsByPhone = $patientService->findByPhone('(555) 123-4567');
$patientSearchResults = $patientService->patientQuery()
	->lastName('Smith')
	->firstName('John')
	->branch(12, 'Main Branch')
	->sortBy('LastName')
	->pageSize(25)
	->page(1)
	->get();

$patientNoteResults = $patientService->patientNoteQuery()
	->patient(12345)
	->status(2)
	->createdBetween('2026-01-01T00:00:00', '2026-01-31T23:59:59')
	->sortBy('CreateDate', 'Descending')
	->get();

print_r($response);
print_r($patientByPatientId);
print_r($patientByExternalId);
print_r($patientsByName);
print_r($patientsByPhone);
print_r($patientSearchResults);
print_r($patientNoteResults);
