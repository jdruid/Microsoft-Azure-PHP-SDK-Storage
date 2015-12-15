<?php 
//Code provided as is
require_once "vendor/autoload.php";

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\BatchOperations;
use WindowsAzure\Common\Internal\Utilities;

$connectionString 		= 'DefaultEndpointsProtocol=https;AccountName=[INSERT_STORAGE_ACCOUNT_NAME];AccountKey=[INSERT_STORAGE_ACCOUNT_PRIMARY_KEY]'; 
//Within portal.azure.com you can find the Name and Keys within your storage account and settings page. AccountKey should be your primary key. There is also an option to copy your primary connection string.

/*
The Table service contains the following components:

URL format: Code addresses tables in an account using this address format:
http://<storage account>.table.core.windows.net/<table>

You can address Azure tables directly using this address with the OData protocol. For more information, see OData.org

Storage Account: All access to Azure Storage is done through a storage account. See Azure Storage Scalability and Performance Targets for details about storage account capacity.

Table: A table is a collection of entities. Tables don't enforce a schema on entities, which means a single table can contain entities that have different sets of properties. The number of tables that a storage account can contain is limited only by the storage account capacity limit.

Entity: An entity is a set of properties, similar to a database row. An entity can be up to 1MB in size.

Properties: A property is a name-value pair. Each entity can include up to 252 properties to store data. Each entity also has 3 system properties that specify a partition key, a row key, and a timestamp. Entities with the same partition key can be queried more quickly, and inserted/updated in atomic operations. An entity's row key is its unique identifier within a partition.
*/

$storageServiceName  	= 'MY_STORAGE_ACCOUNT-NAME'; 	// Storage account may change if it already exists in another subscription.
$tableName      		= 'MY_TABLE_NAME'; 				//Since we ae using table storage as an example
$defaultParitionKey		= 'KEY';  						//The partition key that you would use to define your data

// Initialize
try 
{
	$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString); 
} 
catch(ServiceException $e)
{
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.': '.$error_message.'<br />';
}

$filter = "PartitionKey eq '"+ $defaultParitionKey +"'";	//see https://msdn.microsoft.com/library/azure/dd894031.aspx

try 
{
    $result = $tableRestProxy->queryEntities($tableName, $filter);
}
catch(ServiceException $e)
{
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

$entities = $result->getEntities();

foreach($entities as $entity){
    echo $entity->getPartitionKey().":".$entity->getRowKey()."<br />";
	//or
	//$entity->getProperty('name')->getValue()
	//if your entities have properties	
}
