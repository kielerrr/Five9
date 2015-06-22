<?php
include_once '../includes/Five9.php';
/**
 *  * Created By: Ryan Kiel
 *
 * SERVICE CALLS:
 * lookupCriteria type: crmLookupCriteria
 *
 * RETURNS:
 * return->contactLookupResult
 */
$five9 = new f9();

$result = $five9->getContactRecords_all();

echo "returned start\n";
print_r($five9->getLastRequest($five9));
echo "returned end\n";
echo '<pre>';
var_dump($result);
echo '</pre>';
echo "END";

/*
 * RETURNS
 array (size=1)
  'return' =>
    object(stdClass)[3]
      public 'fields' =>
        array (size=18)
          0 => string 'number1' (length=7)
          1 => string 'number2' (length=7)
          2 => string 'number3' (length=7)
          3 => string 'first_name' (length=10)
          4 => string 'last_name' (length=9)
          5 => string 'company' (length=7)
          6 => string 'street' (length=6)
          7 => string 'city' (length=4)
          8 => string 'state' (length=5)
          9 => string 'zip' (length=3)
          10 => string 'Last Agent' (length=10)
          11 => string 'Last Campaign' (length=13)
          12 => string 'email' (length=5)
          13 => string 'Last Attempted Number' (length=21)
          14 => string 'Order ID' (length=8)
          15 => string 'Last Disposition Time' (length=21)
          16 => string 'Last Disposition' (length=16)
          17 => string 'Call Attempts' (length=13)
      public 'records' =>
        array (size=395)
          0 =>
            object(stdClass)[4]
              public 'values' =>
                object(stdClass)[5]
                  public 'data' =>
                    array (size=18)
                      0 => string '' (length=10)
                      1 => string '' (length=0)
                      2 => string '' (length=0)
                      3 => string '' (length=0)
                      4 => string '' (length=0)
                      5 => string '' (length=0)
                      6 => string '' (length=0)
                      7 => string '' (length=0)
                      8 => string '' (length=0)
                      9 => string '' (length=0)
                      10 => string ' ' (length=19)
                      11 => string ' ' (length=15)
                      12 => string '' (length=0)
                      13 => string '' (length=10)
                      14 => string '111111111111111' (length=15)
                      15 => string '2015-06-07 21:59:35.331' (length=23)
                      16 => string 'TEST' (length=4)
                      17 => string '0' (length=1)
          1 =>
            object(stdClass)[6]
              public 'values' =>
                object(stdClass)[7]
                  public 'data' =>
                    array (size=18)
                      0 => string '' (length=10)
                      1 => string '' (length=0)
                      2 => string '' (length=0)
                      3 => string '' (length=0)
                      4 => string '' (length=0)
                      5 => string '' (length=0)
                      6 => string '' (length=0)
                      7 => string '' (length=0)
                      8 => string '' (length=0)
                      9 => string '' (length=0)
                      10 => string '' (length=19)
                      11 => string 'test ' (length=13)
                      12 => string '' (length=0)
                      13 => string '' (length=10)
                      14 => string '' (length=0)
                      15 => string '2015-06-04 21:34:08.080' (length=23)
                      16 => string 'Do Not Call' (length=11)
                      17 => string '0' (length=1)
          2 =>
            object(stdClass)[8]
              public 'values' =>
                object(stdClass)[9]
                  public 'data' =>
                    array (size=18)
                      0 => string '' (length=10)
                      1 => string '' (length=0)
                      2 => string '' (length=0)
                      3 => string '' (length=0)
                      4 => string '' (length=0)
                      5 => string '' (length=0)
                      6 => string '' (length=0)
                      7 => string '' (length=0)
                      8 => string '' (length=0)
                      9 => string '' (length=0)
                      10 => string '@.com' (length=30)
                      11 => string ' ' (length=16)
                      12 => string '' (length=0)
                      13 => string '' (length=10)
                      14 => string '' (length=0)
                      15 => string '2015-06-04 20:22:13.080' (length=23)
                      16 => string 'Do Not Call' (length=11)
                      17 => string '0' (length=1)
**/

?>