//Ajax related all method reside their

/*
 * Following method is reponsible for 
 * adding parent category (1st layer category)
 */
function openModal(modalId){
    if(modalId == 'sub_item_added_form'){
        $.ajax({
            url: baseUrl + "includes/item_process.php?process_type=get_parent_category",
            type: 'POST',
            dataType: 'html',
            success: function (response) {
                $('#'+modalId).modal('show');
                $('#parent_item_id').html(response);
            }
        });
    }else if(modalId == 'item_added_form'){
        $.ajax({
            url: baseUrl + "includes/item_process.php?process_type=get_parent_category",
            type: 'POST',
            dataType: 'html',
            success: function (response) {
                $('#'+modalId).modal('show');
                $('#main_item_id').html(response);
            }
        });
    }else{
        $('#'+modalId).modal('show');
    }
}
function closeModal(modalId){
    $('#'+modalId).modal('hide');
}

function processParentItems(form_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=parent",
        type:'POST',
        dataType:'html',
        data: $("#"+form_id).serialize(),
        success: function(response) {
            $('#main_item_id').val('');
            $('#main_sub_item_id').val('');
            $('#item_code').val('');
            $('#item_name').val('');
            $('#qty_unit').val('');
            $('#material_min_stock').val('');
            $('#category_id').val('');
            $('#parent_name').val('');
            if(form_id == 'item_added_form_value'){
                $('#item_added_form').modal('hide');
            }else if(form_id == 'sub_item_added_form_value'){
                $('#sub_item_added_form').modal('hide');
            }else if(form_id == 'parent_item_added_form_value'){
                $('#parent_item_added_form').modal('hide');
            }else if(form_id == 'item_updated_form_value'){
                $('#item_edit_form').modal('hide');
            }else if(form_id == 'sub_item_update_form_value'){
                $('#sub_item_edit_form').modal('hide');
            }else if(form_id == 'parent_item_edit_form_value'){
                $('#parent_item_edit_form').modal('hide');
            }
            $('#parent_category_body').html(response);
            $("#item_information").accordion({ active: 0 });
        }
    });
}
function processSubItems(form_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=sub_cat",
        type:'POST',
        dataType:'html',
        data: $("#"+form_id).serialize(),
        success: function(response) {
            $('#parent_item_id').val('');
            $('#sub_code').val('');
            $('#sub_name').val('');
            $('#sub_description').val('');
            $('#sub_item_added_form').modal('hide');
            $('#sub_category_body').html(response);
            $("#item_information").accordion({ active: 1 });
        }
    });
}

function processItems(form_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=item",
        type:'POST',
        dataType:'html',
        data: $("#"+form_id).serialize(),
        success: function(response) {
            $('#main_item_id').val('');
            $('#main_sub_item_id').val('');
            $('#item_code').val('');
            $('#item_name').val('');
            $('#item_description').val('');
            $('#item_added_form').modal('hide');
            $('#item_category_body').html(response);
            $("#item_information").accordion({ active: 2 });
        }
    });
}

function getSubCategoryByParent(parent_id, selector=false) {
    if (parent_id) {
        $.ajax({
            url: baseUrl + "includes/item_process.php?process_type=get_sub_by_parent",
            type: 'POST',
            dataType: 'html',
            data: 'parent_id=' + parent_id,
            success: function (response) {
                if(selector){     
                    $('#'+selector).html(response);
                }else{
                    $('#main_sub_item_id').html(response);
                }
            }
        });
    }else{
        $('#main_sub_item_id').html('');
    }
}

function openMaterialEditForm(edit_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=material_edit",
        type:'POST',
        dataType:'html',
        data: 'edit_id='+edit_id,
        success: function(response) {
            $('#item_edit_form').modal('show');
            $('#material_edit_data_section').html(response);
        }
    });
}
function openSubMaterialEditForm(edit_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=sub_material_edit",
        type:'POST',
        dataType:'html',
        data: 'edit_id='+edit_id,
        success: function(response) {
            $('#sub_item_edit_form').modal('show');
            $('#sub_material_edit_data_section').html(response);
        }
    });
}
function openParentEditForm(edit_id){
    $.ajax({
        url:baseUrl+"includes/item_process.php?process_type=parent_material_edit",
        type:'POST',
        dataType:'html',
        data: 'edit_id='+edit_id,
        success: function(response) {
            $('#parent_item_edit_form').modal('show');
            $('#parent_material_edit_data_section').html(response);
        }
    });
}