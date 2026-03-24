<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Exceptions\BrightreeException;

function envOrNull(string $key): ?string
{
	$value = getenv($key);
	return $value === false || $value === '' ? null : $value;
}

function cliOptions(): array
{
	$options = getopt('', [
		'username:',
		'password:',
		'patient-id:',
		'patient-phone:',
		'patient-note-key:',
		'user-group-id:',
		'contact-key:',
	]);

	return [
		'username' => $options['username'] ?? envOrNull('BRIGHTREE_USERNAME'),
		'password' => $options['password'] ?? envOrNull('BRIGHTREE_PASSWORD'),
		'patient_id' => $options['patient-id'] ?? envOrNull('BRIGHTREE_PATIENT_ID'),
		'patient_phone' => $options['patient-phone'] ?? envOrNull('BRIGHTREE_PATIENT_PHONE'),
		'patient_note_key' => $options['patient-note-key'] ?? envOrNull('BRIGHTREE_PATIENT_NOTE_KEY'),
		'user_group_id' => $options['user-group-id'] ?? envOrNull('BRIGHTREE_USER_GROUP_ID'),
		'contact_key' => $options['contact-key'] ?? envOrNull('BRIGHTREE_CONTACT_KEY'),
	];
}

function printUsage(): void
{
	echo "Usage:\n";
	echo "  php examples/verify-new-api-methods.php --username=USER --password=PASS [options]\n\n";
	echo "Options:\n";
	echo "  --patient-id=12345\n";
	echo "  --patient-phone=5551234567\n";
	echo "  --patient-note-key=12345\n";
	echo "  --user-group-id=12345\n";
	echo "  --contact-key=12345\n\n";
	echo "Env vars can be used instead:\n";
	echo "  BRIGHTREE_USERNAME\n";
	echo "  BRIGHTREE_PASSWORD\n";
	echo "  BRIGHTREE_PATIENT_ID\n";
	echo "  BRIGHTREE_PATIENT_PHONE\n";
	echo "  BRIGHTREE_PATIENT_NOTE_KEY\n";
	echo "  BRIGHTREE_USER_GROUP_ID\n";
	echo "  BRIGHTREE_CONTACT_KEY\n";
}

function heading(string $title): void
{
	echo "\n=== {$title} ===\n";
}

function pass(string $label): void
{
	echo "[PASS] {$label}\n";
}

function skipTest(string $label, string $reason): void
{
	echo "[SKIP] {$label}: {$reason}\n";
}

function fail(string $label, Throwable $e): void
{
	echo "[FAIL] {$label}: {$e->getMessage()}\n";
}

function runCall(string $label, callable $callable): void
{
	try {
		$result = $callable();
		pass($label);
		if (is_object($result) || is_array($result)) {
			echo json_encode($result, JSON_PRETTY_PRINT) . "\n";
		} else {
			var_dump($result);
		}
	} catch (Throwable $e) {
		fail($label, $e);
	}
}

$config = cliOptions();

if ($config['username'] === null || $config['password'] === null) {
	printUsage();
	exit(1);
}

$patientId = $config['patient_id'] !== null ? (int) $config['patient_id'] : null;
$patientPhone = $config['patient_phone'];
$patientNoteKey = $config['patient_note_key'] !== null ? (int) $config['patient_note_key'] : null;
$userGroupId = $config['user_group_id'] !== null ? (int) $config['user_group_id'] : null;
$contactKey = $config['contact_key'] !== null ? (int) $config['contact_key'] : null;

$bt = new Brightree($config['username'], $config['password']);

echo "Brightree new-method verification\n";
echo "Configured patient ID: " . ($patientId ?? 'none') . "\n";
echo "Configured patient phone: " . ($patientPhone ?? 'none') . "\n";
echo "Configured patient note key: " . ($patientNoteKey ?? 'none') . "\n";
echo "Configured user group ID: " . ($userGroupId ?? 'none') . "\n";
echo "Configured contact key: " . ($contactKey ?? 'none') . "\n";

heading('Patient Service');

if ($patientId !== null && $patientPhone !== null) {
	runCall('FetchPatientOptInStatus', function () use ($bt, $patientId, $patientPhone) {
		return $bt->Patient()->FetchPatientOptInStatus($patientId, $patientPhone);
	});
} else {
	skipTest('FetchPatientOptInStatus', 'requires --patient-id and --patient-phone');
}

if ($patientId !== null && $patientPhone !== null) {
	$optInPayload = [
		'BrightreeID' => $patientId,
		'PatientPhone' => $patientPhone,
		'PatientOptInStatus' => [
			[
				'ProgramType' => 1,
				'OptStatus' => 2
			]
		]
	];

	runCall('UpdatePatientOptInStatus', function () use ($bt, $optInPayload) {
		return $bt->Patient()->UpdatePatientOptInStatus($optInPayload);
	});
} else {
	skipTest('UpdatePatientOptInStatus', 'requires --patient-id and --patient-phone');
}

if ($patientId !== null) {
	runCall('AdditionalPatientContactFetchByBrightreeID', function () use ($bt, $patientId) {
		return $bt->Patient()->AdditionalPatientContactFetchByBrightreeID((string) $patientId);
	});
} else {
	skipTest('AdditionalPatientContactFetchByBrightreeID', 'requires --patient-id');
}

$contactPayload = [
	'FirstName' => 'Codex',
	'LastName' => 'Verification',
	'ContactType' => ['Value' => 'Other'],
	'Phone' => $patientPhone ?? '5551234567'
];

runCall('AdditionalPatientContactCreate', function () use ($bt, $contactPayload) {
	return $bt->Patient()->AdditionalPatientContactCreate($contactPayload);
});

if ($contactKey !== null) {
	runCall('AdditionalPatientContactUpdate', function () use ($bt, $contactKey, $contactPayload) {
		$payload = $contactPayload;
		$payload['LastName'] = 'VerificationUpdated';
		return $bt->Patient()->AdditionalPatientContactUpdate($contactKey, $payload);
	});
} else {
	skipTest('AdditionalPatientContactUpdate', 'requires --contact-key');
}

heading('SalesOrder Service');

if ($patientNoteKey !== null) {
	runCall('PatientNotesCommentFetch', function () use ($bt, $patientNoteKey) {
		return $bt->SalesOrder()->PatientNotesCommentFetch($patientNoteKey);
	});
} else {
	skipTest('PatientNotesCommentFetch', 'requires --patient-note-key');
}

if ($patientId !== null) {
	$quickAddPayload = [
		'BrightreeID' => $patientId,
		'SOItemQuickAdd' => [
			'ItemIdentifier' => 'TEST-ITEM'
		]
	];

	runCall('SalesOrderQuickAddItemWithItemsDataReturn', function () use ($bt, $quickAddPayload) {
		return $bt->SalesOrder()->SalesOrderQuickAddItemWithItemsDataReturn($quickAddPayload);
	});
} else {
	skipTest('SalesOrderQuickAddItemWithItemsDataReturn', 'requires --patient-id or a real sales order payload edit');
}

if ($patientId !== null) {
	$templatePayorPayload = [
		'BrightreeID' => $patientId,
		'BrightreeDetailID' => 1,
		'SalesOrderItemInfo' => [
			'BillForDenial' => true
		]
	];

	runCall('SalesOrderTemplateUpdateItemPayor', function () use ($bt, $templatePayorPayload) {
		return $bt->SalesOrder()->SalesOrderTemplateUpdateItemPayor($templatePayorPayload);
	});
} else {
	skipTest('SalesOrderTemplateUpdateItemPayor', 'requires a real template/item payload');
}

heading('Security Service');

if ($userGroupId !== null) {
	runCall('UserGroupBDMPermissionsFetchByUserGroupBrightreeID', function () use ($bt, $userGroupId) {
		return $bt->Security()->UserGroupBDMPermissionsFetchByUserGroupBrightreeID($userGroupId);
	});

	$bdmPayload = [
		'BDMDocumentTypes' => []
	];

	runCall('UserGroupBDMPermissionsUpdate', function () use ($bt, $userGroupId, $bdmPayload) {
		return $bt->Security()->UserGroupBDMPermissionsUpdate($userGroupId, $bdmPayload);
	});
} else {
	skipTest('UserGroupBDMPermissionsFetchByUserGroupBrightreeID', 'requires --user-group-id');
	skipTest('UserGroupBDMPermissionsUpdate', 'requires --user-group-id');
}

echo "\nDone.\n";
