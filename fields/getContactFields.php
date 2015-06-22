<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * SERVICE CALLS:
 * namePattern (regular expression, returns all if null)
 *
 * RETURNS:
 * return->contactField
 */
$five9 = new f9();

$namePattern = array ('namePattern' => null); //request parameters
$result = $five9->getContactFields($namePattern);
echo '<pre>';
var_dump($result);
echo '</pre>';
echo "END";

foreach ($result['return'] as $result_ea) {
    echo $result_ea->name."\n";
}

/*
Begin<br/><br/>REQUEST:
<?xml version="1.0" encoding="UTF-8"
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
  }
}
</pre>END
Process finished with exit code 0


*/