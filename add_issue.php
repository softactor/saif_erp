<?php
$DB = new PDO("mysql:host=localhost;dbname=saif_erp", "root", "");

for($count = 0; $count<count($_POST['quantity']); $count++)
{  
$mrr_date 			= $_POST['mrr_date'];
$mrr_no 			= $_POST['mrr_no'];
$purchase_id 		= $_POST['purchase_id'];
$Purchase_date 		= $_POST['Purchase_date'];
$challan_no 		= $_POST['challan_no'];
$challan_date 		= $_POST['challan_date'];
$requisition_no 	= $_POST['requisition_no'];
$requisition_date 	= $_POST['requisition_date'];
$supplier_name 		= $_POST['supplier_name'];
$supplier_id 		= $_POST['supplier_id'];


$material_name 		= $_POST['material_name'][$count];
$material_id 		= $_POST['material_id'][$count];
$unit 				= $_POST['unit'][$count];
$part_no 			= $_POST['part_no'][$count];
$quantity 			= $_POST['quantity'][$count];
$unit_price 		= $_POST['unit_price'][$count];
$totalamount 		= $_POST['totalamount'][$count];

$project_id 		= $_POST['project_id'];
$remarks			= $_POST['remarks'];

$query = "INSERT INTO `inv_receivedetail` (`mrr_no`,`material_id`,`receive_qty`) VALUES ('$mrr_no','$material_id','$quantity')";
 
$result = $DB->exec($query);
}

$query2 = "INSERT INTO `inv_receive` (`mrr_no`,`mrr_date`) VALUES ('$mrr_no','$mrr_date')";
 
$result2 = $DB->exec($query2);


header("location: receive_entry.php");

?>