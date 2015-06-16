<?php
include_once '../includes/Five9.php';
/**
 * ------USE ONLY OFF PEAK------
 * SERVICE CALLS:
 * crmUpdateSettings (extends basicImportSettings)
 * csvData (string)
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
            array ( "columnNumber" => '1', "fieldName" => "number1", "key" => true ),
            array ( "columnNumber" => '2', "fieldName" => "first_name", "key" => false ),
            array ( "columnNumber" => '3', "fieldName" => "last_name", "key" => false )
        ),
//    'reportEmail' => '',                    //optional string: if/where to send a report, default empty
    'seperator' => '',                      //required string: deliminator of list is sent, default empty
    'skipHeaderLine' => false               //required bool: skip or use top row
);

$crmUpdateSettings = array (
    "crmAddMode" => "DONT_ADD",  //ADD_NEW, DONT_ADD should the record be added to the contact list
    "crmUpdateMode" => "UPDATE_ALL", ///UPDATE_FIRST (update only the first matched record), UPDATE_ALL (update all matched records), UPDATE_SOLE_MATCHES (update only if one matched record is found), DONT_UPDATE (dont update anything)
);
//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$crmUpdateSettings = array_merge($basicImportSettings, $crmUpdateSettings);

//readCSV//////////
$csvData = file_get_contents('../includes/testList.csv');

$xml_data = array ('crmUpdateSettings' => $crmUpdateSettings, 'csvData' => $csvData); //request parameters
$result = $five9->updateContactsCsv($crmUpdateSettings, $csvData);
print_r($result);
/*
RESULT

deleteFromListCsv.php
Begin<br/><br/>stdClass Object
(
    [return] => stdClass Object
(
    [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
(
)

[callNowQueued] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
            [listName] => test list
    [listRecordsDeleted] => 5
            [listRecordsInserted] => 0
        )

)
<br/><br/>END
Process finished with exit code 0*/

?>