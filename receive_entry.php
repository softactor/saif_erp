<?php include 'header.php' ?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Receive Entry</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="table-responsive">          
                        <table class="table table-borderless" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Date</label>
                                            <div class="col-md-12">
                                                <input type="text" autocomplete="off" name="receive_date" id="receive_date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">RCV No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="receive_no_display" id="receive_no_display" class="form-control" readonly="readonly" value="<?php echo getDefaultCategoryCode('inv_receive', 'mrr_no', '03d', '001', 'RCV') ?>">
                                                <input type="hidden" name="receive_no" id="receive_no" value="<?php echo getDefaultCategoryCode('inv_receive', 'mrr_no', '03d', '001', 'RCV') ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Supplier</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                                    <option value="">Select</option>
                                                    <?php
                                                    $projectsData = getTableDataByTableName('suppliers');

                                                    if (isset($projectsData) && !empty($projectsData)) {
                                                        foreach ($projectsData as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Product</label>
                                            <div class="col-md-12">
                                                <select class="form-control select2" id="product_id" name="product_id" required>
                                                    <option value="">Select</option>
                                                    <?php
                                                    $projectsData = get_product_with_category();
                                                    if (isset($projectsData) && !empty($projectsData)) {
                                                        foreach ($projectsData as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['material_name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="name" class="col-md-12">Part No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="part_no" id="part_no" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 required">Project</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="project_id" name="project_id" required>
                                                    <option value="">Select</option>
                                                    <?php
                                                    $projectsData = getTableDataByTableName('suppliers');
                                                    ;
                                                    if (isset($projectsData) && !empty($projectsData)) {
                                                        foreach ($projectsData as $data) {
                                                            ?>
                                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>                    
                                    <td>
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 required">Quantity</label>
                                            <div class="col-md-12">
                                                <input type="text" name="quantity" id="quantity" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2">                        
                                        <div class="form-group">
                                            <label for="name" class="col-md-12 required">Unit Price</label>
                                            <div class="col-md-12">
                                                <input type="text" name="unit_price" id="unit_price" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id='get_product_url' value="" />
                        <input type="hidden" id='process_product_receive_url' value="" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-12" for="requisition_list">Requisition List:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="requisition_id" name="requisition_id">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="rjdata"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" style="margin-left: 2%">          
                                <table class="table table-bordered" style="width: 96%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Unit Price</th>
                                            <th style="text-align: right">Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="receiveProductBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'footer.php' ?>