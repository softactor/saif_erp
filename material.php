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
            Material</div>
        <div class="card-body">
            <div class="div-center">
                <div id="item_information">
                    <h3>Category</h3>
                    <div class='row'>
                        <div class='col-md-10'>
                            <div class="table-responsive data-table-wrapper">
                                <table id="blogs-table" class="table table-condensed table-hover table-bordered site_custome_table">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="parent_category_body">
                                        <?php
                                        $parentCats = getTableDataByTableName('parent_category');
                                        if (isset($parentCats) && !empty($parentCats)) {
                                            foreach ($parentCats as $pcat) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $pcat['parent_code']; ?></td>
                                                    <td><?php echo $pcat['name']; ?></td>
                                                    <td><?php echo $pcat['description']; ?></td>
                                                    <td>
                                                        Action
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                        <div class='col-md-2'>
                            <button class="btn btn-flat btn-default pull-left" onclick="openModal('parent_item_added_form');"><i class="fa fa-plus"></i> Category</button>
                        </div>
                    </div>
                    <h3>Sub Material</h3>
                    <div class='row'>
                        <div class='col-md-10'>
                            <div class="table-responsive data-table-wrapper">
                                <table id="blogs-table" class="table table-condensed table-hover table-bordered site_custome_table">
                                    <thead>
                                        <tr>
                                            <th>Parent</th>
                                            <th>Code</th>
                                            <th>Sub Category</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sub_category_body">
                                        <?php
                                        $childInfo = getTableDataByTableName('sub_category');
                                        if (isset($childInfo) && !empty($childInfo)) {
                                            foreach ($childInfo as $sub) {
                                                ?>
                                                <tr>
                                                    <td><?php echo getDataRowByTableAndId('parent_category', $sub['parent_id'])->name; ?></td>
                                                    <td><?php echo $sub['sub_code']; ?></td>
                                                    <td><?php echo $sub['name']; ?></td>
                                                    <td><?php echo $sub['description']; ?></td>
                                                    <td>
                                                        Action
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                        <div class='col-md-2'>
                            <button class="btn btn-flat btn-default pull-left" onclick="openModal('sub_item_added_form');"><i class="fa fa-plus"></i> Sub Material</button>
                        </div>
                    </div>
                    <h3>Material</h3>
                    <div class="row">
                        <div class='col-md-10'>
                            <div class="table-responsive data-table-wrapper">
                                <table id="blogs-table" class="table table-condensed table-hover table-bordered site_custome_table">
                                    <thead>
                                        <tr>
                                            <th>Parent</th>
                                            <th>Sub Material</th>
                                            <th>Code</th>
                                            <th>Material</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item_category_body">
                                        <?php
                                        $item_details = getTableDataByTableName('item_details');
                                        if (isset($item_details) && !empty($item_details)) {
                                            foreach ($item_details as $item) {
                                                ?>
                                                <tr>
                                                    <td><?php echo getDataRowByTableAndId('parent_category', $item['parent_item_id'])->name; ?></td>
                                                    <td><?php echo getDataRowByTableAndId('sub_category', $item['sub_item_id'])->name; ?></td>
                                                    <td><?php echo $item['item_code']; ?></td>
                                                    <td><?php echo $item['name']; ?></td>
                                                    <td><?php echo $item['description']; ?></td>
                                                    <td>
                                                        Action
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!--table-responsive-->
                        </div>
                        <div class='col-md-2'>
                            <button class="btn btn-flat btn-default pull-left" onclick="openModal('item_added_form');"><i class="fa fa-plus"></i> Material</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'footer.php' ?>