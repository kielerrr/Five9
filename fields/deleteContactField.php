<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * SERVICE CALLS:
 * fieldName
 *
 * RETURNS:
 * deleteContactFieldResponse
 */
$five9 = new f9();

$fieldName = array(
    'fieldName' => 'test'
);
$result = $five9->deleteContactField($fieldName);
print_r($result);

/*
RETURNS

array(
)

*/