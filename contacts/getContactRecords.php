<?php
include_once '../includes/Five9.php';
/**
 * SERVICE CALLS:
 * lookupCriteria type: crmLookupCriteria
 *
 * RETURNS:
 * return->contactLookupResult
 */
$five9 = new f9();

$lookupCriteria = array(
    'contactIdField' => '123',  //optional int: pretty useless
    'criteria' =>array(         //add the field and values you want to lookup (no wildcards :(
        array(
            'field' => 'first_name',
            'value' => 'bb44oy'),
        array(
            'field' => 'last_name',
            'value' => 'Draper'))

);
$result = $five9->getContactRecords($lookupCriteria);

echo "returned start\n";
print_r($five9->getLastRequest($five9));
echo "returned end\n";
echo '<pre>';
var_dump($result);
echo '</pre>';
echo "END";
/*
contacts/getContactRecords.php
Begin<br/><br/>asdfasdfstring(583) "<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://service.admin.ws.five9.com/">
  <SOAP-ENV:Body>
    <ns1:getContactRecords>
      <lookupCriteria>
        <contactIdField>123</contactIdField>
        <criteria>
          <field>first_name</field>
          <value>Don1</value>
        </criteria>
        <criteria>
          <field>last_name</field>
          <value>Draper</value>
        </criteria>
      </lookupCriteria>
    </ns1:getContactRecords>
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
"
asdfasdf<pre lang="xml">
    <?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://service.admin.ws.five9.com/"><SOAP-ENV:Body><ns1:getContactRecords><lookupCriteria><contactIdField>123</contactIdField><criteria><field>first_name</field><value>Don1</value></criteria><criteria><field>last_name</field><value>Draper</value></criteria></lookupCriteria></ns1:getContactRecords></SOAP-ENV:Body></SOAP-ENV:Envelope>

</pre>
<pre>array(1) {
  'return' =>
  class stdClass#3 (2) {
    public $fields =>
    array(19) {
      [0] =>
      string(3) "123"
      [1] =>
      string(7) "number1"
      [2] =>
      string(7) "number2"
      [3] =>
      string(7) "number3"
      [4] =>
      string(10) "first_name"
      [5] =>
      string(9) "last_name"
      [6] =>
      string(7) "company"
      [7] =>
      string(6) "street"
      [8] =>
      string(4) "city"
      [9] =>
      string(5) "state"
      [10] =>
      string(3) "zip"
      [11] =>
      string(10) "Last Agent"
      [12] =>
      string(13) "Last Campaign"
      [13] =>
      string(5) "email"
      [14] =>
      string(21) "Last Attempted Number"
      [15] =>
      string(8) "Order ID"
      [16] =>
      string(21) "Last Disposition Time"
      [17] =>
      string(16) "Last Disposition"
      [18] =>
      string(13) "Call Attempts"
    }
    public $records =>
    class stdClass#4 (1) {
      public $values =>
      class stdClass#5 (1) {
        public $data =>
        array(19) {
          [0] =>
          string(3) "394"
          [1] =>
          string(10) "5555776754"
          [2] =>
          string(0) ""
          [3] =>
          string(0) ""
          [4] =>
          string(4) "Don1"
          [5] =>
          string(6) "Draper"
          [6] =>
          string(0) ""
          [7] =>
          string(0) ""
          [8] =>
          string(0) ""
          [9] =>
          string(0) ""
          [10] =>
          string(0) ""
          [11] =>
          string(0) ""
          [12] =>
          string(0) ""
          [13] =>
          string(0) ""
          [14] =>
          string(0) ""
          [15] =>
          string(0) ""
          [16] =>
          string(0) ""
          [17] =>
          string(0) ""
          [18] =>
          string(0) ""
        }
      }
    }
  }
}
</pre>END
Process finished with exit code 0


*/

?>