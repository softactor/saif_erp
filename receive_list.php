<?php include 'header.php' ?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="receive_entry.php">Receive</a>
        </li>
        <li class="breadcrumb-item active">List</li>
    </ol>
    <!-- receive search start here -->
    <?php include 'search/material_receive_search.php'; ?>
    <!-- end receive search -->
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Receive List
        </div>
        <div class="card-body">
            <!--here your code will go-->
            <?php
            $table              = 'inv_receive';
            $order              = 'DESC';
            $column             = 'mrr_date';
            $dataType           = 'obj';
            $receiveDataList    = getTableDataByTableName($table, $order, $column, $dataType);
            ?>
            <table class="table table-striped table-bordered data-list-table">            
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
                    <tbody>
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
                                <td style="text-align: right;">Edit | Details | Delete</td>
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include 'footer.php' ?>