<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * ------DELETES 1 RECORD FROM A LIST-----
 * SERVICE CALLS:
 * listName
 * listDeleteSettings (extends basicImportSettings)
 * record->recordData
 *
 * RETURNS:
 * return->listImportResult
 */
$five9 = new f9();

$listName = "test list";

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
    'listDeleteMode' => 'DELETE_IF_SOLE_CRM_MATCH'         //required array: DELETE_ALL (doesn't apply to single record like deleteRecordFromList), DELETE_IF_SOLE_CRM_MATCH (only delete if a single match is found), DELETE_EXCEPT_FIRST (delete all except first match)
);

//$data = array ( "5555776754" , "Don1" , "Draper" );

//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$listDeleteSettings = array_merge($basicImportSettings, $listDeleteMode);

$record = array ( "5555776754" , "Don1" , "Draper" );

$result = $five9->deleteRecordFromList($listName, $listDeleteSettings, $record);
print_r($result);

/*
RETURNS
stdClass Object
(
    [return] => stdClass Object
        (
            [failureMessage] =>
            [keyFields] => number1
            [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
                (
                )

            [callNowQueued] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
            [listName] => test web2campaign list
            [listRecordsDeleted] => 0
            [listRecordsInserted] => 0
        )

)

Process finished with exit code 0


*/
?>