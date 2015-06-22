<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * ------ADDS MULTIPLE RECORDS------
 * SERVICE CALLS:
 * listName string
 * listUpdateSettings->listUpdateSettings (extends basicImportSettings)
 * importData
 *
 * RETURNS:
 * return->importIdentifier
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
//    'seperator' => '',                      //required string: deliminator of list is sent, default empty
    'skipHeaderLine' => true               //required bool: skip or use top row
);
$listUpdateSettings = array(
//      'callNowColumnNumber' => '', //starting with 1 column indicating a call now (1,T,Y, Yes
//      'callNowMode' => 'ANY', //optional NONE, NEW_CRM_ONLY (only if new to crm), NEW_LIST_ONLY (only if new to list), ANY
//      'callTime' => '', //epoch time in miliseconds
//      'callTimeColumnNumber' => '', //epoch time in miliseconds
    'cleanListBeforeUpdate' => false, //required bool: remove all records from list before adding
    "crmAddMode" => "ADD_NEW",  //ADD_NEW, DONT_ADD should the record be added to the contact list
    "crmUpdateMode" => "UPDATE_FIRST", ///UPDATE_FIRST (update only the first matched record), UPDATE_ALL (update all matched records), UPDATE_SOLE_MATCHES (update only if one matched record is found), DONT_UPDATE (dont update anything)
    "listAddMode" => "ADD_FIRST" //ADD_FIRST (adds only first when multiple matches occur), ADD_ALL (does not work with addRecordToList), ADD_IF_SOLE_CRM_MATCH (add record if only one match exists in the database
);
//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$listUpdateSettings = array_merge($basicImportSettings, $listUpdateSettings);


$importData = array (
    array ( "5555776741" , "Don0454545" , "Draper" ),
//    array ( "5551112239" , "betty777777" , "Smith" ),
//    array ( rand(1111111111,9999999999), "test", "name")
);

$result = $five9->asyncAddRecordsToList($listName, $listUpdateSettings, $importData);
print_r($result);

?>