<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * ------DELETES ALL RECORDS IN A LIST, DOES NOT DELETE CONTACTS-----
 * SERVICE CALLS:
 * listName string
 * reportEmail
 *
 * RETURNS:
 * return->importIdentifier
 */
$five9 = new f9();

$listName = 'test list';
$reportEmail = "admin@google.com";

$result = $five9->deleteAllFromList($listName, $reportEmail);
print_r($result);
/*
RETURNS
stdClass Object
(
    [return] => stdClass Object
        (
            [keyFields] => number1
            [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
                (
                )

            [callNowQueued] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
            [listName] => test  list
            [listRecordsDeleted] => 16
            [listRecordsInserted] => 0
        )

)

Process finished with exit code 0
*/
