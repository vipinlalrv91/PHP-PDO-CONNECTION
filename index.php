<?php

function __autoload($class){
  include_once($class.".php");
  
}

$database = new DbConfig();
$db = $database->getConnection();

/**
 * CompareData - Managing Data items listing
 * @author Bridge 
 * @copyright Bridge India
*/

class CompareData
{

    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }
	
	
/**
* Listing of Camparison Data
* @param   Array  $data
* @param Int $id
* @return  Array 
*/
public function getComparisonItems(){
	

    $tSQL = "SELECT * FROM items";
    $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : '';


    if ( ($category_id==1 || $category_id==2)) {
    		  $tSQL = $tSQL . "WHERE category_id = " . $_REQUEST['category_id'];
    }else{
		 $tSQL = $tSQL . " WHERE category_id = " . 1;
	}
	
	
	$pdo_statement = $this->conn->prepare($tSQL);
	$pdo_statement->execute();
	$results = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

	
	$aItems = array();
	foreach($results as $aRow) {
		 $aItems[$aRow['id']] = $aRow['iteam_name'];
	}

	return $aItems;
	
}
}

$b = new CompareData($db);
$aItems = $b->getComparisonItems();
print_r($aItems);
?>
