<?php 
if(isset($_GET['process_type']) && $_GET['process_type'] == 'parent'){
    include '../connection/connect.php';
    $name           =   mysqli_real_escape_string($conn, $_POST['name']);
    $parent_code    =   mysqli_real_escape_string($conn, $_POST['category_id']);
    
    if(isset($_POST['parent_material_update_id']) && !empty($_POST['parent_material_update_id'])){
        $edit_id    =   $_POST['parent_material_update_id'];
        $sql = "UPDATE inv_materialcategorysub SET category_id='$parent_code',category_description='$name' WHERE id=$edit_id";
    }else{
        $sql = "INSERT INTO inv_materialcategorysub (category_description, category_id) VALUES ('".$name."', '".$parent_code."')";
    } 
    if ($conn->query($sql) === TRUE) {
        parent_category_table_json_response('parent_category');
    } 
}

function parent_category_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName('inv_materialcategorysub', '' , 'category_description');
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $data) {
 ?>
            <tr>
                <td><?php echo $data['category_id']; ?></td>
                <td><?php echo $data['category_description']; ?></td>
                <td>
                    <button type="button" class="btn btn-sm" onclick="openParentEditForm('<?php echo $data['id']; ?>');">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
        }
    }
}

if(isset($_GET['process_type']) && $_GET['process_type'] == 'sub_cat'){
    include '../connection/connect.php';
    $parent_id          =   mysqli_real_escape_string($conn, $_POST['parent_id']);
    $sub_code           =   mysqli_real_escape_string($conn, $_POST['sub_code']);
    $name               =   mysqli_real_escape_string($conn, $_POST['name']);
    $user_id            =   1;
    if(isset($_POST['sub_material_update_id']) && !empty($_POST['sub_material_update_id'])){
        $edit_id    =   $_POST['sub_material_update_id'];
        $sql = "UPDATE inv_materialcategory SET material_sub_id='$sub_code',category_id='$parent_id',material_sub_description='$name' WHERE id=$edit_id";
    }else{
        $sql = "INSERT INTO inv_materialcategory (category_id, material_sub_description, material_sub_id) VALUES ('".$parent_id."','".$name."', '".$sub_code."')";
    }    

    if ($conn->query($sql) === TRUE) {
        sub_category_table_json_response('inv_materialcategory');
    } 
}

function sub_category_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName('inv_materialcategory','','material_sub_description');
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $data) {
 ?>
            <tr>
                <td><?php echo getDataRowByTableAndId('inv_materialcategorysub', $data['category_id'])->category_description; ?></td>
                <td><?php echo $data['material_sub_id']; ?></td>
                <td><?php echo $data['material_sub_description']; ?></td>
                <td>
                    <button type="button" class="btn btn-sm" onclick="openSubMaterialEditForm('<?php echo $data['id']; ?>');">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
        }
    }
}

if(isset($_GET['process_type']) && $_GET['process_type'] == 'item'){
    include '../connection/connect.php';
    $parent_id          =   mysqli_real_escape_string($conn, $_POST['parent_item_id']);
    $sub_item_id        =   mysqli_real_escape_string($conn, $_POST['sub_item_id']);
    $item_code          =   mysqli_real_escape_string($conn, $_POST['item_code']);
    $name               =   mysqli_real_escape_string($conn, $_POST['name']);
    $qty_unit           =   mysqli_real_escape_string($conn, $_POST['qty_unit']);
    $material_min_stock =   mysqli_real_escape_string($conn, $_POST['material_min_stock']);
    $user_id            =   1;
    if(isset($_POST['material_update_id']) && !empty($_POST['material_update_id'])){
        $edit_id    =   $_POST['material_update_id'];
        $sql = "UPDATE inv_material SET material_id_code='$item_code',material_id='$parent_id',material_sub_id='$sub_item_id',material_description='$name',material_min_stock='$material_min_stock',qty_unit='$qty_unit' WHERE id=$edit_id";
    }else{
        $sql = "INSERT INTO inv_material (material_id,material_sub_id,material_id_code,material_description,material_min_stock,qty_unit) VALUES ('".$parent_id."','".$sub_item_id."', '".$item_code."','".$name."', '".$material_min_stock."','".$qty_unit."')";
    }
    if ($conn->query($sql) === TRUE) {
        item_table_json_response('inv_material');
    } 
}

function item_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName($tableName, '', 'material_description');
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $item) {
 ?>
            <tr>
                <td><?php echo getDataRowByTableAndId('inv_materialcategorysub', $item['material_id'])->category_description; ?></td>
                <td><?php echo getDataRowByTableAndId('inv_materialcategory', $item['material_sub_id'])->material_sub_description; ?></td>
                <td><?php echo $item['material_id_code']; ?></td>
                <td><?php echo $item['material_description']; ?></td>
                <td><?php echo $item['material_min_stock']; ?></td>
                <td><?php echo getDataRowByTableAndId('inv_item_unit', $item['qty_unit'])->unit_name; ?></td>
                <td>
                    <button type="button" class="btn btn-sm" onclick="openMaterialEditForm('<?php echo $item['id']; ?>');">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
        }
    }
}

if(isset($_GET['process_type']) && $_GET['process_type'] == 'get_sub_by_parent'){
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $parent_id      =    $_POST['parent_id'];
    $tableName      =    'inv_materialcategory where category_id='.$parent_id;
    $tableData      = getTableDataByTableName($tableName, '', 'material_sub_description');
    if (isset($tableData) && !empty($tableData)) {
        echo "<option value=''>Please Select</option>";
        foreach ($tableData as $data) { ?>
            <option value="<?php echo $data['id']; ?>"><?php echo $data['material_sub_description']; ?></option>
            <?php
        }
    }
}

/*
 *   Category, Sub category and material
 */
if(isset($_GET['process_type']) && $_GET['process_type'] == 'material_edit'){
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $edit_id    =   $_POST['edit_id'];
    $editData   =   getDataRowByTableAndId('inv_material',$edit_id);
?> 
        <div class="modal_body_centerize"> 
            <input type="hidden" name="material_update_id" value="<?php echo $editData->id; ?>">
            <div class="form-group">
                <label class="control-label col-sm-5" for="parent_code">Parent Category:</label>
                <div class="col-sm-7">
                    <select class="form-control" id="main_item_id" name="parent_item_id" onchange="getSubCategoryByParent(this.value, 'edit_sub_item_id');">
                        <option value="">Select</option>
                        <?php
                        $parentCats = getTableDataByTableName('inv_materialcategorysub', '', 'category_description');
                        if (isset($parentCats) && !empty($parentCats)) {
                            foreach ($parentCats as $pcat) {
                                ?>
                                <option value="<?php echo $pcat['id'] ?>" <?php if(isset($editData->material_id) && $editData->material_id == $pcat['id']){ echo 'selected'; } ?>><?php echo $pcat['category_description'] ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="parent_code">Sub Category:</label>
                <div class="col-sm-7">
                    <select class="form-control" id="edit_sub_item_id" name="sub_item_id">
                        <option value="">Select</option>
                        <?php
                        $parentCats = getTableDataByTableName('inv_materialcategory', '', 'material_sub_description');
                        if (isset($parentCats) && !empty($parentCats)) {
                            foreach ($parentCats as $pcat) {
                                ?>
                                <option value="<?php echo $pcat['id'] ?>"<?php if(isset($editData->material_sub_id) && $editData->material_sub_id == $pcat['id']){ echo 'selected'; } ?>><?php echo $pcat['material_sub_description'] ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="parent_code">Material Code:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="item_code" placeholder="Enter item code" name="item_code" value="<?php if(isset($editData->material_id_code)){ echo $editData->material_id_code; } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="name">Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="item_name" placeholder="name" name="name" value="<?php if(isset($editData->material_description)){ echo $editData->material_description; } ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="parent_code">Unit:</label>
                <div class="col-sm-7">
                    <select class="form-control" id="qty_unit" name="qty_unit">
                        <option value="">Select</option>
                        <?php
                        $parentCats = getTableDataByTableName('inv_item_unit', '', 'unit_name');
                        if (isset($parentCats) && !empty($parentCats)) {
                            foreach ($parentCats as $pcat) {
                                ?>
                                <option value="<?php echo $pcat['id'] ?>" <?php if(isset($editData->material_sub_id) && $editData->material_sub_id == $pcat['id']){ echo 'selected'; } ?>><?php echo $pcat['unit_name'] ?></option>
<?php }
}
?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" for="name">Material min stock:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="material_min_stock" placeholder="Material min stock" name="material_min_stock" value="<?php if(isset($editData->material_min_stock)){ echo $editData->material_min_stock; } ?>">
                </div>
            </div>
        </div>
<?php }
if(isset($_GET['process_type']) && $_GET['process_type'] == 'sub_material_edit'){
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $edit_id    =   $_POST['edit_id'];
    $editData   =   getDataRowByTableAndId('inv_materialcategory',$edit_id);
?>
        <div class="form-group">
            <input type="hidden" name="sub_material_update_id" value="<?php echo $editData->id; ?>">
            <label class="control-label col-sm-5" for="parent_id">Parent Category:</label>
            <div class="col-sm-7">
                <select class="form-control" id="parent_item_id" name="parent_id">
                    <option value="">Select</option>
                    <?php
                    $parentCats = getTableDataByTableName('inv_materialcategorysub', '', 'category_description');
                    if (isset($parentCats) && !empty($parentCats)) {
                        foreach ($parentCats as $pcat) {
                            ?>
                            <option value="<?php echo $pcat['id'] ?>"<?php if(isset($editData->category_id) && $editData->category_id == $pcat['id']){ echo 'selected'; } ?>><?php echo $pcat['category_description'] ?></option>
                        <?php }
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="sub_code">Sub Code:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="sub_code" placeholder="Enter sub code" name="sub_code" value="<?php if(isset($editData->material_sub_id)){ echo $editData->material_sub_id; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="name">Name:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="sub_name" placeholder="name" name="name" value="<?php if(isset($editData->material_sub_description)){ echo $editData->material_sub_description; } ?>">
            </div>
        </div>
<?php }

if(isset($_GET['process_type']) && $_GET['process_type'] == 'parent_material_edit'){
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $edit_id    =   $_POST['edit_id'];
    $editData   =   getDataRowByTableAndId('inv_materialcategorysub',$edit_id);
?>
        <div class="form-group">
            <input type="hidden" name="parent_material_update_id" value="<?php echo $editData->id; ?>">
            <label class="control-label col-sm-5" for="category_id">Category Id:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="category_id" placeholder="Enter Category Id" name="category_id" value="<?php if(isset($editData->category_id)){ echo $editData->category_id; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="name">Name:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="parent_name" placeholder="name" name="name" value="<?php if(isset($editData->category_description)){ echo $editData->category_description; } ?>">
            </div>
        </div>
<?php } ?>