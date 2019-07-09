<?php 
if(isset($_GET['process_type']) && $_GET['process_type'] == 'parent'){
    include '../connection/connect.php';
    $name           =   mysqli_real_escape_string($conn, $_POST['name']);
    $parent_code    =   mysqli_real_escape_string($conn, $_POST['parent_code']);
    $description    =   mysqli_real_escape_string($conn, $_POST['description']);
    $user_id        =   1;
    $sql = "INSERT INTO parent_category (name, parent_code, description,user_id) VALUES ('".$name."', '".$parent_code."', '".$description."','".$user_id."')";

    if ($conn->query($sql) === TRUE) {
        parent_category_table_json_response('parent_category');
    } 
}

function parent_category_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName('parent_category');
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $data) {
 ?>
            <tr>
                <td><?php echo $data['parent_code']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['description']; ?></td>
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
    $sub_description    =   mysqli_real_escape_string($conn, $_POST['sub_description']);
    $user_id            =   1;
    $sql = "INSERT INTO sub_category (parent_id, name, sub_code, description,user_id) VALUES ('".$parent_id."','".$name."', '".$sub_code."', '".$sub_description."','".$user_id."')";

    if ($conn->query($sql) === TRUE) {
        sub_category_table_json_response('sub_category');
    } 
}

function sub_category_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName('sub_category');
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $data) {
 ?>
            <tr>
                <td><?php echo getDataRowByTableAndId('parent_category', $data['parent_id'])->name; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['sub_code']; ?></td>
                <td><?php echo $data['description']; ?></td>
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
    $sub_description    =   mysqli_real_escape_string($conn, $_POST['description']);
    $user_id            =   1;
    $sql = "INSERT INTO item_details (parent_item_id,sub_item_id,name,item_code,description,user_id) VALUES ('".$parent_id."','".$sub_item_id."','".$name."', '".$item_code."', '".$sub_description."','".$user_id."')";

    if ($conn->query($sql) === TRUE) {
        item_table_json_response('item_details');
    } 
}

function item_table_json_response($tableName) {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $tableData = getTableDataByTableName($tableName);
    if (isset($tableData) && !empty($tableData)) {
        foreach ($tableData as $item) {
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
}

if(isset($_GET['process_type']) && $_GET['process_type'] == 'get_sub_by_parent'){
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $parent_id      =    $_POST['parent_id'];
    $tableName      =    'sub_category where parent_id='.$parent_id;
    $tableData      = getTableDataByTableName($tableName);
    if (isset($tableData) && !empty($tableData)) {
        echo "<option value=''>Please Select</option>";
        foreach ($tableData as $data) {
 ?>
            <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
            <?php
        }
    }
}

?>