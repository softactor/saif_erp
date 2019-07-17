<?php
if (isset($_POST['receive_submit']) && !empty($_POST['receive_submit'])) {
    $receive_total      =   0;
    $no_of_material     =   0;
    for ($count = 0; $count < count($_POST['quantity']); $count++) {
        $mrr_date           = $_POST['mrr_date'];
        $mrr_no             = getDefaultCategoryCode('inv_receive', 'mrr_no', '03d', '001', 'RCV');
        $purchase_id        = $_POST['purchase_id'];
        $Purchase_date      = $_POST['Purchase_date'];
        $challan_no         = $_POST['challan_no'];
        $challan_date       = $_POST['challan_date'];
        $requisition_no     = $_POST['requisition_no'];
        $requisition_date   = $_POST['requisition_date'];
        $supplier_name      = $_POST['supplier_name'];
        $supplier_id        = $_POST['supplier_id'];


        $material_name      = $_POST['material_name'][$count];
        $material_id        = $_POST['material_id'][$count];
        $unit               = $_POST['unit'][$count];
        $part_no            = $_POST['part_no'][$count];
        $quantity           = $_POST['quantity'][$count];
        $no_of_material     = $no_of_material+$quantity;
        $unit_price         = $_POST['unit_price'][$count];
        $totalamount        = $_POST['totalamount'][$count];
        $receive_total      = $receive_total+$totalamount;
        $project_id         = $_POST['project_id'];
        $remarks            = $_POST['remarks'];

        $query = "INSERT INTO `inv_receivedetail` (`mrr_no`,`material_id`,`receive_qty`,`unit_price`,`sl_no`,`total_receive`,`part_no`) VALUES ('$mrr_no','$material_id','$quantity','$unit_price','1','$totalamount','$part_no')";


//$query = "INSERT INTO `inv_receivedetail` (`mrr_no`,`material_id`,`receive_qty`,`unit_price`) VALUES ('$mrr_no','$material_id','$quantity','$unit_price')";

        $conn->query($query);
    }

    $query2 = "INSERT INTO `inv_receive` (`mrr_no`,`mrr_date`,`purchase_id`,`receive_acct_id`,`supplier_id`,`postedtogl`,`remarks`,`receive_type`,`receive_ware_hosue_id`,`receive_unit_id`,`receive_total`,`no_of_material`,`challanno`,`requisitionno`) VALUES ('$mrr_no','$mrr_date','$purchase_id','6-14-010','$supplier_id','0','$remarks','Credit','001','1','$receive_total','$no_of_material','$challan_no','$requisition_no')";
//$query2 = "INSERT INTO `inv_receive` (`mrr_no`,`mrr_date`,`purchase_id`) VALUES ('$mrr_no','$mrr_date','$purchase_id')";
    $result2 = $conn->query($query2);
    $_SESSION['success']    =   "Receive process have been successfully completed.";
    header("location: receive_entry.php");
    exit();
}

function getReceiveDataDetailsById($id){
    global $conn;
    $receieves      =   "";
    $receiveDetails =   "";
    
    // get receive data
    $sql1           = "SELECT * FROM inv_receive where id=".$id;
    $result1        = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $receieves = $result1->fetch_object();
    }
    
    // get receive details data
    $table                  =   'inv_receivedetail where mrr_no='."'$receieves->mrr_no'";
    $order                  =   'DESC';
    $column                 =   'receive_qty';
    $dataType               =   'obj';
    $receiveDetailsData     = getTableDataByTableName($table, $order, $column, $dataType);
    if(isset($receiveDetailsData) && !empty($receiveDetailsData)){
        $receiveDetails     =   $receiveDetailsData;
    }
    
    $feedbackData   =   [
        'receiveData'           =>  $receieves,
        'receiveDetailsData'    =>  $receiveDetails
    ];
    
    return $feedbackData;
}

?>