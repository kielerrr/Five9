<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
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

$listName = "test web2campaign list";

$listUpdateSimpleSettings = array(
    'callAsap' => false, //bool:
    //'country_code' => '' //string: experimental
    'fieldsMapping' =>                      //required array: call getContactFields() for full list, columnNumber:int, fieldName:string, key:bool
        array(
            array ( "columnNumber" => '1', "fieldName" => "number1", "key" => true ),
            array ( "columnNumber" => '2', "fieldName" => "first_name", "key" => false ),
            array ( "columnNumber" => '3', "fieldName" => "last_name", "key" => false )
        ),
//    'timeToCall' => '', //long: when to dial epoch time
//    'updateCRM' => true, //bool: update the five9 crm
);

//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$listUpdateSimpleSettings = array_merge($listUpdateSimpleSettings);

$record =  array ( "5555776354" , "ggg" , "Draper" );

$result = $five9->addRecordToListSimple($listName, $listUpdateSimpleSettings, $record);
$variables = get_object_vars($result);
echo '<pre>';
var_dump($variables);
echo '</pre>';
echo "END";
/*
 * RETURNS
 * <pre>array(0) {
}
</pre>END
Process finished with exit code 0

 */