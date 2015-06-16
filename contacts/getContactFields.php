<?php
include_once '../includes/Five9.php';
/**
 * SERVICE CALLS:
 * namePattern (regular expression, returns all if null)
 *
 * RETURNS:
 * return->contactField
 */
$five9 = new f9();

$namePattern = array ('namePattern' => ''); //request parameters
$result = $five9->getContactFields($namePattern);
echo '<pre>';
var_dump($result);
echo '</pre>';
echo "END";

/*
contacts/getContactFields.php
Begin<br/><br/>REQUEST:
<?xml version="1.0" encoding="UTF-8"*/?><!--
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://service.admin.ws.five9.com/"><SOAP-ENV:Body><ns1:getContactFields/></SOAP-ENV:Body></SOAP-ENV:Envelope>

<pre>array(1) {
  'return' =>
  array(18) {
    [0] =>
    class stdClass#3 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(7) "number1"
      public $system =>
      bool(true)
      public $type =>
      string(5) "PHONE"
    }
    [1] =>
    class stdClass#4 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(7) "number2"
      public $system =>
      bool(true)
      public $type =>
      string(5) "PHONE"
    }
    [2] =>
    class stdClass#5 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(7) "number3"
      public $system =>
      bool(true)
      public $type =>
      string(5) "PHONE"
    }
    [3] =>
    class stdClass#6 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(10) "first_name"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [4] =>
    class stdClass#7 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(9) "last_name"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [5] =>
    class stdClass#8 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(7) "company"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [6] =>
    class stdClass#9 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(6) "street"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [7] =>
    class stdClass#10 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(4) "city"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [8] =>
    class stdClass#11 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(5) "state"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [9] =>
    class stdClass#12 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(3) "zip"
      public $system =>
      bool(true)
      public $type =>
      string(6) "STRING"
    }
    [10] =>
    class stdClass#13 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(15) "LastDisposition"
      public $name =>
      string(16) "Last Disposition"
      public $system =>
      bool(false)
      public $type =>
      string(6) "STRING"
    }
    [11] =>
    class stdClass#14 (6) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(23) "LastDispositionDateTime"
      public $name =>
      string(21) "Last Disposition Time"
      public $restrictions =>
      array(2) {
        [0] =>
        class stdClass#15 (2) {
          public $type =>
          string(10) "DateFormat"
          public $value =>
          string(10) "yyyy-MM-dd"
        }
        [1] =>
        class stdClass#16 (2) {
          public $type =>
          string(10) "TimeFormat"
          public $value =>
          string(12) "HH:mm:ss.SSS"
        }
      }
      public $system =>
      bool(false)
      public $type =>
      string(9) "DATE_TIME"
    }
    [12] =>
    class stdClass#17 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(12) "LastCampaign"
      public $name =>
      string(13) "Last Campaign"
      public $system =>
      bool(false)
      public $type =>
      string(6) "STRING"
    }
    [13] =>
    class stdClass#18 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(23) "AttemptsForLastCampaign"
      public $name =>
      string(13) "Call Attempts"
      public $system =>
      bool(false)
      public $type =>
      string(6) "STRING"
    }
    [14] =>
    class stdClass#19 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(9) "LastAgent"
      public $name =>
      string(10) "Last Agent"
      public $system =>
      bool(false)
      public $type =>
      string(6) "STRING"
    }
    [15] =>
    class stdClass#20 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(19) "LastAttemptedNumber"
      public $name =>
      string(21) "Last Attempted Number"
      public $system =>
      bool(false)
      public $type =>
      string(5) "PHONE"
    }
    [16] =>
    class stdClass#21 (5) {
      public $displayAs =>
      string(4) "Long"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(5) "email"
      public $system =>
      bool(false)
      public $type =>
      string(5) "EMAIL"
    }
    [17] =>
    class stdClass#22 (5) {
      public $displayAs =>
      string(5) "Short"
      public $mapTo =>
      string(4) "None"
      public $name =>
      string(8) "Order ID"
      public $system =>
      bool(false)
      public $type =>
      string(6) "STRING"
    }
  }
}
</pre>END
Process finished with exit code 0

-->

?>