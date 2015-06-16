<?php
include_once '../includes/Five9.php';
/**
 * ------GETS GENERAL INFO ABOUT A LIST------
 * SERVICE CALLS:
 * listNamePattern string
 *
 * RETURNS:
 * return->listInfo
 */
$five9 = new f9();

$listNamePattern = null;            //Returns all lists
//$listNamePattern = "test list";   //Returns specified list

$result = $five9->getListsInfo($listNamePattern);
print_r($result);
/*
RETURNS

/llists/getListsInfo.php
stdClass Object
(
    [return] => Array
        (
            [0] => stdClass Object
                (
                    [name] => test list
                    [size] => 2
                )

            [1] => stdClass Object
                (
                    [name] =>test list
                    [size] => 1
                )

            [2] => stdClass Object
                (
                    [name] =>  Live Declined
                    [size] => 0
                )

            [3] => stdClass Object
                (
                    [name] =>  Period Declined
                    [size] => 0
                )

            [4] => stdClass Object
                (
                    [name] => Live Decline 
                    [size] => 0
                )

        )

)

Process finished with exit code 0


*/
?>