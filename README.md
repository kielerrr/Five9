#Five9 CRUD Class
Class *with examples* for CRUD'ing Five9 config-web services API

Set credentials in ```includes/Five9.php```
```php
//set your admin account name
define('USER', '');
//set API login
define('LOGIN', '');
define('PASSWORD', '');
```

####Expamples found in
* ``contacts`` 
* ``lists``

##Methods Supported:
---

###Contact Records

* deleteFromContacts
* deleteFromContactsCsv
* getContactFields
* getContactRecords
* getContactRecords_all
* updateContacts
* updateContactsCsv
* updateCrmRecord

###List Records

* addRecordToList
* addRecordToListSimple
* addToList
* addToListCsv
* asyncAddRecordsToList
* deleteAllFromList
* deleteFromList
* deleteFromListCsv
* deleteRecordFromList
* getListsInfo