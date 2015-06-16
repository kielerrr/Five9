<?php
include_once '../includes/Five9.php';
/**
 * ------ONLY UPDATES SINGLE RECORDS------
 * SERVICE CALLS:
 * listName string
 * listUpdateSimpleSettings->listUpdateSimpleSettings (extends basicImportSettings)
 * record->recordData->fields
 *
 * RETURNS:
 * nothing
 */
$five9 = new f9();

$listName = "test list";

$listUpdateSimpleSettings = array(
    'callAsap' => false, //bool:
    //'country_code' => '' //string: experimental
    'fieldsMapping' =>                      //required array: call getContactFields() for full list, columnNumber:int, fieldName:string, key:bool
        array(
            array ( "columnNumber" => '0', "fieldName" => "number1", "key" => true ),
            array ( "columnNumber" => '1', "fieldName" => "first_name", "key" => false ),
            array ( "columnNumber" => '2', "fieldName" => "last_name", "key" => false )
        ),
//    'timeToCall' => '', //long: when to dial epoch time
//    'updateCRM' => true, //bool: update the five9 crm
);

//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$listUpdateSimpleSettings = array_merge($listUpdateSimpleSettings);

$record =  array ( "5555776754" , "ggg" , "Draper" );

$result = $five9->addRecordToListSimple($listName, $listUpdateSimpleSettings, $record);
$variables = get_object_vars($result);
echo '<pre>';
var_dump($variables);
echo '</pre>';
echo "END";
?>