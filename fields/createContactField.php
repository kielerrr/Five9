<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * SERVICE CALLS:
 * field->(displayAs,mapTo,Name,restrictions->(isEnabled,type,value),system,type)

 *
 * RETURNS:
 * createContactFieldResponse
 */
$five9 = new f9();

$contactFieldRestriction = array(
    'isEnabled' => false, //bool
    'type' => '', //MinValue, MaxValue, Regexp, Required, Set, Multiset, Precision, Scale, TimeFormat, DateFormat, TimePeriodFormat, CurrencyType
    'value' => ''
);

$field = array(
    'field' => array(
        'displayAs' => 'Short', //Short, Long, Invisible
        'mapTo' => 'None', //LastAgent, LastDisposition, LastSystemDisposition, LastAgentDisposition, LastDispositionDateTime, LastSystemDispositionDateTime, LastAgentDispositionDateTime, LastAttemptedNumber, LastAttemptedNumberN1N2N3, LastCampaign, AttemptsForLastCampaign, LastList, CreatedDateTime, LastModifiedDateTime
        'name' => 'other',
//    'restrictions' => $contactFieldRestriction,
        'system' => false, //bool
        'type' => 'STRING' //STRING, NUMBER, DATE, TIME, DATE_TIME, CURRENCY, BOOLEAN, PERCENT, EMAIL, URL, PHONE, TIME_PERIOD
    ),
);

$result = $five9->createContactField($field);
print_r($result);

/*
RETURNS
Begin<br/><br/>601fhjhhhh58-45d5-86e8-43b720beaf76stdClass Object
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
