<?php

if (isset($_GET['search_data']) && $_GET['search_data'] == 'material_receive_search_form') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $requisition_from_date  =   (isset($_REQUEST['from_date']) && !empty($_REQUEST['from_date']) ? $_REQUEST['from_date'] : '');
    $requisition_from_date  =   (isset($_REQUEST['from_date']) && !empty($_REQUEST['from_date']) ? $_REQUEST['from_date'] : '');
    $requisition_todate     =   (isset($_REQUEST['todate']) && !empty($_REQUEST['todate']) ? $_REQUEST['todate'] : '');
    $mrr_no                 =   (isset($_REQUEST['mrr_no']) && !empty($_REQUEST['mrr_no']) ? $_REQUEST['mrr_no'] : '');
    $supplyer_id            =   (isset($_REQUEST['supplyer_id']) && !empty($_REQUEST['supplyer_id']) ? $_REQUEST['supplyer_id'] : '');
    $requisition_id         =   (isset($_REQUEST['requisition_id']) && !empty($_REQUEST['requisition_id']) ? $_REQUEST['requisition_id'] : '');
    $sql                    =   '';
    $where                  =   [];
    $where_sql_status       =   false;
    $receiveDataList          =   [];
    $sql.="SELECT * FROM inv_receive";
    $status     =   'error';
    $message    =   'No data found';
    $data       =   '';
    
    if(isset($requisition_from_date) && !empty($requisition_from_date)){
        $where_sql_status   =   true;
        $where[]=" mrr_date >='$requisition_from_date' ";
    }
    if(isset($requisition_todate) && !empty($requisition_todate)){
        $where_sql_status   =   true;
        $where[]=" mrr_date <='$requisition_todate' ";
    }
    if(isset($mrr_no) && !empty($mrr_no)){
        $where_sql_status   =   true;
        $where[]=" mrr_no ='$mrr_no' ";
    }
    if(isset($supplyer_id) && !empty($supplyer_id)){
        $where_sql_status   =   true;
        $where[]=" supplier_id ='$supplyer_id' ";
    }
    
    if($where_sql_status){
        $sql.=" WHERE".implode("AND",$where);
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $receiveDataList[] = $row;
        }        
    ?>
        <table class="table table-striped table-bordered data-list-table" id="material_receive_list">            
            <?php
            if (isset($receiveDataList) && !empty($receiveDataList)) {
                ?>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>MRR</th>
                        <th>Supplier</th>
                        <th>Total Quantity</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="material_receive_list_body">
                    <?php
                    $sl = 1;
                    foreach ($receiveDataList as $listData) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo date("jS F, Y", strtotime($listData->mrr_date)); ?></td>
                            <td><?php echo $listData->mrr_no; ?></td>
                            <td><?php echo $listData->supplier_id; ?></td>
                            <td><?php echo $listData->no_of_material; ?></td>
                            <td><?php echo $listData->receive_total; ?></td>
                            <td style="text-align: right;">
                                <a href="receive_edit.php?edit_id=<?php echo $listData->id; ?>">Edit</a> | Details
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th>Sorry, Database have no information!</th>
                    </tr>
                </thead>
            <?php } ?>
        </table>
    <?php }else{ ?>
        <div class="alert alert-info">
            <strong>Sorry</strong> Database have no information!
        </div>
    <?php }
}
if (isset($_GET['search_data']) && $_GET['search_data'] == 'material_issue_search_form') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $issue_id               =   (isset($_REQUEST['issue_id']) && !empty($_REQUEST['issue_id']) ? $_REQUEST['issue_id'] : '');
    $sql                    =   '';
    $where                  =   [];
    $where_sql_status       =   false;
    $receiveDataList          =   [];
    $sql.="SELECT * FROM inv_issue";
    $status     =   'error';
    $message    =   'No data found';
    $data       =   '';
    
    if(isset($issue_id) && !empty($issue_id)){
        $where_sql_status   =   true;
        $where[]=" issue_id >='$issue_id' ";
    }
    
    if($where_sql_status){
        $sql.=" WHERE".implode("AND",$where);
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $receiveDataList[] = $row;
        }        
    ?>
        <table class="table table-striped table-bordered data-list-table" id="material_receive_list">            
            <?php
            if (isset($receiveDataList) && !empty($receiveDataList)) {
                ?>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Issue ID</th>
                        <th>Total Quantity</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="material_receive_list_body">
                    <?php
                    $sl = 1;
                    foreach ($receiveDataList as $listData) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo date("jS F, Y", strtotime($listData->issue_date)); ?></td>
                            <td><?php echo $listData->issue_id; ?></td>
                            <td><?php echo $listData->no_of_material; ?></td>
                            <td><?php echo $listData->issue_total; ?></td>
                            <td style="text-align: right;">
                                <a href="issue_edit.php?edit_id=<?php echo $listData->id; ?>">Edit</a> | Details
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th>Sorry, Database have no information!</th>
                    </tr>
                </thead>
            <?php } ?>
        </table>
    <?php }else{ ?>
        <div class="alert alert-info">
            <strong>Sorry</strong> Database have no information!
        </div>
    <?php }
}
