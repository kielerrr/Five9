<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 * SERVICE CALLS:
 * field->(displayAs,mapTo,Name,restrictions->(isEnabled,type,value),system,type)

 *
 * RETURNS:
 * modifyContactFieldResponse
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

$result = $five9->modifyContactField($field);
print_r($result);

/*
RETURNS
stdClass Object
(
)

Process finished with exit code 0

*/
