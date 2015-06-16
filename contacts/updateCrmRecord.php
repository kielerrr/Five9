<?php
include_once '../includes/Five9.php';
/**
 * ------ONLY UPDATES SINGLE RECORDS------
 * SERVICE CALLS:
 * crmUpdateSettings (extends basicImportSettings)
 * record->recordData
 *
 * RETURNS:
 * return->crmImportResult
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
$crmUpdateSettings = array(
    "crmAddMode" => "DONT_ADD",  //ADD_NEW, DONT_ADD should the record be added to the contact list
    "crmUpdateMode" => "UPDATE_FIRST", ///UPDATE_FIRST (update only the first matched record), UPDATE_ALL (update all matched records), UPDATE_SOLE_MATCHES (update only if one matched record is found), DONT_UPDATE (dont update anything)
);
//IMPORTANT: crmUpdateSettings EXTENDS basicImportSettings.. MERGE THEM
//ALL SERVICE PARAMETERS BELOW
$crmUpdateSettings = array_merge($basicImportSettings, $crmUpdateSettings);

$record = array ( "5555555555" , "hi" , "hiiii" );

$xml_data = array ('crmUpdateSettings' => $crmUpdateSettings, 'record' => $record); //request parameters
$result = $five9->updateCrmRecord($crmUpdateSettings, $record);
print_r($result);


/*
contacts/updateCrmRecord.php
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

            [crmRecordsDeleted] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 1
        )

)

Process finished with exit code 0


OTHER ERRORS

//ALL SERVICE PARAMETERS BELOW
contacts/updateCrmRecord.php
stdClass Object
(
    [return] => stdClass Object
        (
            [failureMessage] =>
            [importTroubles] => stdClass Object
                (
                    [key] => 5555773754
                    [kind] => NoMatchesInContacts
                    [rowNumber] => 1
                )

            [keyFields] => number1
            [uploadDuplicatesCount] => 0
            [uploadErrorsCount] => 0
            [warningsCount] => stdClass Object
                (
                    [entry] => stdClass Object
                        (
                            [key] => There were 0 matches found in Contacts
                            [value] => 1
                        )

                )

            [crmRecordsDeleted] => 0
            [crmRecordsInserted] => 0
            [crmRecordsUpdated] => 0
        )

)

Process finished with exit code 0


*/
?>