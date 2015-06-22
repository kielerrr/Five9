<?php
/**
 *  * Created By: Ryan Kiel
 *
 * Class f9
 */

class f9
{
    public $_connection;
    /**
     * @var $_connection contains the five9 connection
     */
    function __construct()
    {
        $wsdl_five9 = "https://api.five9.com/wsadmin/v4/AdminWebService?wsdl&user=YOUR_USER_NAME_HERE";
        try {
            $soap_options = array('login' => 'YOUR_LOGIN_HERE', 'password' => 'YOUR_PASSWORD_HERE', 'trace' => true);
            $this->_connection = new SoapClient($wsdl_five9, $soap_options);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            echo $error_message;
            exit;
        }
    }

    //CONTACT (CRM)
    /**
     * @param mixed[] $crmDeleteSettings Array contains crmDeleteMode
     * @param mixed[] $importData Array matches field values for fieldMapping
     */
    function deleteFromContacts($crmDeleteSettings, $importData)
    {
        $data = array(
            'crmDeleteSettings' => $crmDeleteSettings,
            'importData' => $importData
        );
        $result = $this->_connection->deleteFromContacts($data);
        $result = $this->checkImport($result, 'getCrmImportResult');
        return $result;
    }

    /**
     * @param mixed[] $crmDeleteSettings Array contains crmDeleteMode
     * @param mixed[] $csvData Array location of csv with proper fieldMapping
     */
    function deleteFromContactsCsv($crmDeleteSettings, $csvData)
    {
        $data = array(
            'crmDeleteSettings' => $crmDeleteSettings,
            'csvData' => $csvData
        );
        $result = $this->_connection->deleteFromContactsCsv($data);
        $result = $this->checkImport($result, 'getCrmImportResult');
        return $result;
    }

    /**
     * @param mixed[] $lookupCriteria field->value pairs to lookup
     */
    function getContactRecords($lookupCriteria)
    {
        $result = $this->_connection->getContactRecords(array ('lookupCriteria' => $lookupCriteria));
        $result = $this->returnVariables($result);
        return $result;
    }

    /**
     * no params.. defaults to return all records in Five9 CRM
     */
    function getContactRecords_all()
    {
        $result = $this->_connection->getContactRecords();
        $result = $this->returnVariables($result);
        return $result;
    }

    /**
     * @param mixed[] $crmUpdateSettings Array contains crmUpdateSettings
     * @param mixed[] $importData Array matches field values for fieldMapping
     */
    function updateContacts($crmUpdateSettings, $importData)
    {
        $result = $this->_connection->updateContacts(
            array(
                'crmUpdateSettings' => $crmUpdateSettings,
                'importData' => $importData,
            )
        );
        $result = $this->checkImport($result, 'getCrmImportResult');
        return $result;
    }

    /**
     * @param mixed[] $crmUpdateSettings Array contains crmUpdateSettings
     * @param mixed[] $csvData Array location of csv with proper fieldMapping
     */
    function updateContactsCsv($crmUpdateSettings, $csvData)
    {
        $data = array(
            'crmUpdateSettings' => $crmUpdateSettings,
            'csvData' => $csvData
        );
        $result = $this->_connection->updateContactsCsv($data);
        $result = $this->checkImport($result, 'getCrmImportResult');
        return $result;
    }

    /**
     * @param mixed[] $crmUpdateSettings Array contains crmUpdateSettings
     * @param mixed[] $record single record
     */
    function updateCrmRecord($crmUpdateSettings, $record)
    {
        $data = array(
            'crmUpdateSettings' => $crmUpdateSettings,
            'record' => $record
        );
        $result = $this->_connection->updateCrmRecord($data);
        return $result;

    }

    /**
     * @param $listName
     * @param $listUpdateSettings
     * @param $record
     * @return mixed
     */
    function addRecordToList($listName, $listUpdateSettings, $record)
    {
        $data = array(
            'listName' => $listName,
            'listUpdateSettings' => $listUpdateSettings,
            'record' => $record
        );
        $result = $this->_connection->addRecordToList($data);
        return $result;
    }

    /**
     * @param $listName
     * @param $listUpdateSimpleSettings columnNumber, fieldName, key
     * @param $record one record of values in an array
     * @return mixed
     */
    function addRecordToListSimple($listName, $listUpdateSimpleSettings, $record)
    {
        $data = array(
            'listName' => $listName,
            'listUpdateSimpleSettings' => $listUpdateSimpleSettings,
            'record' => $record
        );
        $result = $this->_connection->addRecordToListSimple($data);
        return $result;
    }

    /**
     * @param $listName
     * @param $listUpdateSettings
     * @param $importData
     * @return string
     */
    function addToList($listName, $listUpdateSettings, $importData)
    {
        $data = array(
            'listName' => $listName,
            'listUpdateSettings' => $listUpdateSettings,
            'importData' => $importData
        );
        $result = $this->_connection->addtoList($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $listUpdateSettings
     * @param $csvData
     * @return string
     */
    function addToListCsv($listName, $listUpdateSettings, $csvData)
    {
        $data = array(
            'listName' => $listName,
            'listUpdateSettings' => $listUpdateSettings,
            'csvData' => $csvData
        );
        $result = $this->_connection->addtoListCsv($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $listUpdateSettings
     * @param $importData
     * @return string
     */
    function asyncAddRecordsToList($listName, $listUpdateSettings, $importData)
    {
        $data = array(
            'listName' => $listName,
            'listUpdateSettings' => $listUpdateSettings,
            'importData' => $importData
        );
        $result = $this->_connection->asyncAddRecordsToList($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $reportEmail
     * @return string
     */
    function deleteAllFromList($listName, $reportEmail)
    {
        $data = array(
            'listName' => $listName,
            'reportEmail' => $reportEmail
        );
        $result = $this->_connection->deleteAllFromList($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $listDeleteSettings
     * @param $importData
     * @return string
     */
    function deleteFromList($listName, $listDeleteSettings, $importData)
    {
        $data = array(
            'listName' => $listName,
            'listDeleteSettings' => $listDeleteSettings,
            'importData' => $importData
        );
        $result = $this->_connection->deleteFromList($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $listDeleteSettings
     * @param $csvData
     * @return string
     */
    function deleteFromListCsv($listName, $listDeleteSettings, $csvData)
    {
        $data = array(
            'listName' => $listName,
            'listDeleteSettings' => $listDeleteSettings,
            'csvData' => $csvData
        );
        $result = $this->_connection->deleteFromListCsv($data);
        $result = $this->checkImport($result, 'getListImportResult');
        return $result;
    }

    /**
     * @param $listName
     * @param $listDeleteSettings
     * @param $record
     * @return mixed
     */
    function deleteRecordFromList($listName, $listDeleteSettings, $record)
    {
        $data = array(
            'listName' => $listName,
            'listDeleteSettings' => $listDeleteSettings,
            'record' => $record
        );
        $result = $this->_connection->deleteRecordFromList($data);
        return $result;
    }

    /**
     * @param $listNamePattern
     * @return mixed
     */
    function getListsInfo($listNamePattern)
    {
        $data = array(
            'listNamePattern' => $listNamePattern
        );
        $result = $this->_connection->getListsInfo($data);
        return $result;
    }

    /**
     * @param $field
     * @return mixed
     */
    function createContactField($field)
    {
        $result = $this->_connection->createContactField($field);
        return $result;
    }

    /**
     * @param $field
     * @return mixed
     */
    function modifyContactField($field)
    {
        $result = $this->_connection->modifyContactField($field);
        return $result;
    }

    /**
     * @param string $namePattern regex for contact fields.. returns all if omitted
     */
    function getContactFields($namePattern)
    {
        $result = $this->_connection->getContactFields($namePattern);
        $result = $this->returnVariables($result);
        return $result;
    }

    /**
     * @param $field
     * @return mixed
     */
    function deleteContactField($fieldName)
    {
        $result = $this->_connection->deleteContactField($fieldName);
        return $result;
    }

    /**
     * @return string
     */
    function getLastRequest()
    {
        return $this->_connection->__getLastRequest();
    }

    /**
     * @param $result
     * @param $importType
     * @return string
     */

    //for calls including identifier
    function checkImport($result, $importType)
    {
        $variables = get_object_vars($result);
        $resp = get_object_vars($variables['return']);
        $identifier = $resp['identifier']; //the ID for the import

        //-------check progress of import ()----------------------

        $import_running = true;
        $IIR_p = array('identifier' => array('identifier' => $identifier),
           // 'waitTime' => 10
        );
        while ($import_running) {
            try {
                $IIR_result = $this->_connection->isImportRunning($IIR_p);
                $variables = get_object_vars($IIR_result);
                $import_running = $variables['return'];
            } catch (Exception $e) {
                $error_message = $e->getMessage();
                echo $error_message;
            }
        }
        //------get result ()---------------------------------
        try
        {
            $GLIR_p = array('identifier'=>array('identifier'=>$identifier));
            $GLIR_result = $this->_connection->$importType($GLIR_p);
            return $GLIR_result;
        }
        catch (Exception $e)
        {
            $error_message = $e->getMessage();
            return $error_message;
        }
    }

    //for calls including only array return
    function returnVariables($result)
    {
        $variables = get_object_vars($result);
        return $variables;
    }
}
