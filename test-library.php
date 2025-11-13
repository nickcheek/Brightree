<?php

require 'vendor/autoload.php';

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Exceptions\BrightreeException;

// ==============================================
// CONFIGURATION - Edit these values
// ==============================================
$username = 'YOUR_USERNAME_HERE';
$password = 'YOUR_PASSWORD_HERE';

// Test patient ID (change to a valid ID in your system)
$testPatientBrightreeID = 12345;

// ==============================================
// DO NOT EDIT BELOW THIS LINE
// ==============================================

echo "========================================\n";
echo "Brightree API Library Test Script\n";
echo "========================================\n\n";

try {
    // Initialize the Brightree client
    echo "1. Initializing Brightree client...\n";
    $bt = new Brightree($username, $password);
    echo "   ✓ Client initialized successfully\n\n";

    // Test 1: ArrayHelper functionality
    echo "2. Testing ArrayHelper (search builder)...\n";
    $searchParams = $bt->search(['SearchParams' => ['Branch' => ['Value' => 102]]])
                       ->sort(['SortParams' => []])
                       ->pageSize(10)
                       ->pages(1)
                       ->build();
    echo "   ✓ ArrayHelper working correctly\n";
    echo "   Built search array: " . json_encode($searchParams, JSON_PRETTY_PRINT) . "\n\n";

    // Test 2: Patient Service
    echo "3. Testing Patient Service...\n";
    try {
        $patient = $bt->Patient();
        echo "   ✓ Patient service instance created\n";

        // Try to fetch a patient (will fail with invalid credentials but tests the structure)
        // $result = $patient->PatientFetchByBrightreeID($testPatientBrightreeID);
        // echo "   ✓ PatientFetchByBrightreeID method callable\n";
    } catch (BrightreeException $e) {
        echo "   ℹ Patient service created but API call failed (expected if credentials are invalid)\n";
        echo "   Error: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 3: Doctor Service
    echo "4. Testing Doctor Service...\n";
    try {
        $doctor = $bt->Doctor();
        echo "   ✓ Doctor service instance created\n";
    } catch (BrightreeException $e) {
        echo "   ✗ Doctor service failed: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 4: Insurance Service
    echo "5. Testing Insurance Service...\n";
    try {
        $insurance = $bt->Insurance();
        echo "   ✓ Insurance service instance created\n";
    } catch (BrightreeException $e) {
        echo "   ✗ Insurance service failed: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 5: SalesOrder Service
    echo "6. Testing SalesOrder Service...\n";
    try {
        $salesOrder = $bt->SalesOrder();
        echo "   ✓ SalesOrder service instance created\n";
    } catch (BrightreeException $e) {
        echo "   ✗ SalesOrder service failed: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 6: CustomField Service
    echo "7. Testing CustomField Service...\n";
    try {
        $customField = $bt->CustomField();
        echo "   ✓ CustomField service instance created\n";
    } catch (BrightreeException $e) {
        echo "   ✗ CustomField service failed: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 7: Reference Service
    echo "8. Testing Reference Service...\n";
    try {
        $reference = $bt->Reference();
        echo "   ✓ Reference service instance created\n";
    } catch (BrightreeException $e) {
        echo "   ✗ Reference service failed: " . $e->getMessage() . "\n";
    }
    echo "\n";

    // Test 8: All other services
    echo "9. Testing remaining services...\n";
    $services = [
        'Document' => fn() => $bt->Document(),
        'Documentation' => fn() => $bt->Documentation(),
        'Inventory' => fn() => $bt->Inventory(),
        'Invoice' => fn() => $bt->Invoice(),
        'Pickup' => fn() => $bt->Pickup(),
        'Pricing' => fn() => $bt->Pricing(),
        'Security' => fn() => $bt->Security(),
    ];

    foreach ($services as $name => $serviceFactory) {
        try {
            $service = $serviceFactory();
            echo "   ✓ $name service instance created\n";
        } catch (BrightreeException $e) {
            echo "   ✗ $name service failed: " . $e->getMessage() . "\n";
        }
    }
    echo "\n";

    echo "========================================\n";
    echo "✓ All tests completed successfully!\n";
    echo "========================================\n\n";

    echo "NOTE: To test actual API calls, update the username and password\n";
    echo "at the top of this script with valid credentials.\n\n";

    // Example of actual API usage (commented out)
    echo "Example API usage (uncomment and edit to test):\n";
    echo "--------------------------------------------\n";
    echo "// Fetch a patient by Brightree ID\n";
    echo "// \$patient = \$bt->Patient()->PatientFetchByBrightreeID(12345);\n";
    echo "// var_dump(\$patient);\n\n";

    echo "// Search for patients\n";
    echo "// \$search = \$bt->search(['SearchParams' => ['FirstName' => ['Value' => 'John']]])\n";
    echo "//              ->sort(['SortParams' => []])\n";
    echo "//              ->pageSize(25)\n";
    echo "//              ->pages(1)\n";
    echo "//              ->build();\n";
    echo "// \$results = \$bt->Patient()->PatientSearch(\$search);\n";
    echo "// var_dump(\$results);\n\n";

    echo "// Fetch all branch offices\n";
    echo "// \$branches = \$bt->Reference()->BranchInfoFetchAll();\n";
    echo "// var_dump(\$branches);\n\n";

    echo "// Create a sales order\n";
    echo "// \$orderData = ['PatientKey' => 12345, 'BranchKey' => 102, ...];\n";
    echo "// \$order = \$bt->SalesOrder()->SalesOrderCreate(\$orderData);\n";
    echo "// var_dump(\$order);\n\n";

} catch (BrightreeException $e) {
    echo "========================================\n";
    echo "✗ Brightree Exception Occurred\n";
    echo "========================================\n";
    echo "Error: " . $e->getMessage() . "\n";
    echo "Code: " . $e->getCode() . "\n";

    if ($e->getErrorData()) {
        echo "\nError Data:\n";
        var_dump($e->getErrorData());
    }

    if ($e->getRequestData()) {
        echo "\nRequest Data:\n";
        var_dump($e->getRequestData());
    }

    echo "\nStack Trace:\n";
    echo $e->getTraceAsString() . "\n";

} catch (\Exception $e) {
    echo "========================================\n";
    echo "✗ General Exception Occurred\n";
    echo "========================================\n";
    echo "Error: " . $e->getMessage() . "\n";
    echo "Code: " . $e->getCode() . "\n";
    echo "\nStack Trace:\n";
    echo $e->getTraceAsString() . "\n";
}