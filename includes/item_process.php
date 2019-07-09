<?php 
if(isset($_GET['process_type']) && $_GET['process_type'] == 'parent'){
    include '../connection/connect.php';
    $name           =   mysqli_real_escape_string($conn, $_POST['name']);
    $parent_code    =   mysqli_real_escape_string($conn, $_POST['category_id']);
    $sql = "INSERT INTO inv_materialcategorysub (category_description, category_id) VALUES ('".$name."', '".$parent_code."')";

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
                    Action
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
    $sql = "INSERT INTO inv_materialcategory (category_id, material_sub_description, material_sub_id) VALUES ('".$parent_id."','".$name."', '".$sub_code."')";

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
                    Action
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
    $sql = "INSERT INTO inv_material (material_id,material_sub_id,material_id_code,material_description,material_min_stock,qty_unit) VALUES ('".$parent_id."','".$sub_item_id."', '".$item_code."','".$name."', '".$material_min_stock."','".$qty_unit."')";

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
                    Action
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

?>