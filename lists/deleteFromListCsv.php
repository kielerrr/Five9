<?php
include_once '../includes/Five9.php';
/**
 *  * ------DELETES MULTIPLE RECORDS DOES NOT DELETE CRM CONTACTS------
 * SERVICE CALLS:
 * listName
 * listDeleteSettings (extends basicImportSettings)
 * csvData
 *
 * RETURNS:
 * return->importIdentifier
 */
$five9 = new f9();

$listName = "test list";

//readCSV//////////
$csvData = file_get_contents('../includes/testList.csv');

$basicImportSettings = array(
    'allowDataCleanup' => 'false',          //required bool: remove duplicates on key, default false
//    'failOnFieldParseError' => 'false',     //optional bool: stop import on incorrect data, default false
    'fieldsMapping' =>                      //required array: call getContactFields() for full list, columnNumber:int, fieldName:string, key:bool
        array(
            array ( "columnNumber" => '1', "fieldName" => "number1", "key" => true ),
            array ( "columnNumber" => '2', "fieldName" => "first_name", "key" => false ),
            array ( "columnNumber" => '3', "fieldName" => "last_name", "key" => false )
        ),
//    'reportEmail' => '',                    //optional string: if/where to send a report, default empty
    'seperator' => '',                      //required string: deliminator of list is sent, default empty
    'skipHeaderLine' => false               //required bool: skip or use top row
);

$listDeleteMode = array(
    'listDeleteMode' => 'DELETE_ALL'         //required array: DELETE_ALL (doesn't apply to single record like deleteRecordFromList), DELETE_IF_SOLE_CRM_MATCH (only delete if a single match is found), DELETE_EXCEPT_FIRST (delete all except first match)
);

//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$listDeleteSettings = array_merge($basicImportSettings, $listDeleteMode);

$result = $five9->deleteFromListCsv($listName, $listDeleteSettings, $csvData);
print_r($result);

/*
RESULT
lists/deleteFromListCsv.php
stdClass Object
(
    [return] => stdClass Object
        (
            [keyFields] => number1
            [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
                (
                    [entry] => stdClass Object
                        (
                            [key] => Entry with all key fields empty has been ignored
                            [value] => 1
                        )

                )

            [callNowQueued] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
            [listName] =>test list
            [listRecordsDeleted] => 5
            [listRecordsInserted] => 0
        )

)

Process finished with exit code 0
*/

?>