<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * SERVICE CALLS:
 * crmDeleteSettings (extends basicImportSettings)
 * importData type: importData
 *
 * RETURNS:
 * return->importIdentifier
 */
$five9 = new f9();

$basicImportSettings = array(
    'allowDataCleanup' => 'false',          //required bool: remove duplicates on key, default false
//    'failOnFieldParseError' => 'false',     //optional bool: stop import on incorrect data, default false
    'fieldsMapping' =>                      //required array: call getContactFields() for full list, columnNumber:int, fieldName:string, key:bool
        array(
            array ( "columnNumber" => '1', "fieldName" => "number1", "key" => false ),
            array ( "columnNumber" => '2', "fieldName" => "first_name", "key" => true ),
            array ( "columnNumber" => '3', "fieldName" => "last_name", "key" => false )
        ),
//    'reportEmail' => '',                    //optional string: if/where to send a report, default empty
    'seperator' => '',                      //required string: deliminator of list is sent, default empty
    'skipHeaderLine' => false               //required bool: skip or use top row
);

$crmDeleteSettings = array(
    'crmDeleteMode' => 'DELETE_ALL'         //required array: DELETE_ALL (doesn't apply to single record like deleteRecordFromList), DELETE_IF_SOLE_CRM_MATCH (only delete if a single match is found), DELETE_EXCEPT_FIRST (delete all except first match)
);

//IMPORTANT: crmDeleteSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$crmDeleteSettings = array_merge($basicImportSettings, $crmDeleteSettings);


$importData = array (                       //required array: values matching in 'fieldsMapping'
    array ( "3716867197","test","name"),

);

$result = $five9->deleteFromContacts($crmDeleteSettings, $importData);
print_r($result);

/*
RETURNS
Begin<br/><br/>601fa926-f058-45d5-86e8-43b720beaf76stdClass Object
(
    [return] => stdClass Object
        (
            [failureMessage] => There were errors during the upload
            [keyFields] => number1
            [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
                (
                    [entry] => stdClass Object
                        (
                            [key] => There were 0 matches found in Contacts
                            [value] => 4
                        )

                )

            [crmRecordsDeleted] => 1
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
        )

)
<br/><br/>END
Process finished with exit code 0

*/
?>