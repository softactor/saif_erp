//Ajax related all method reside their

/*
 * Following method is reponsible for 
 * adding parent category (1st layer category)
 */
function openModal(modalId){
    $('#'+modalId).modal('show');
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
            $('#category_id').val('');
            $('#parent_name').val('');
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
            $('#item_category_body').html(response);
            $("#item_information").accordion({ active: 2 });
        }
    });
}

function getSubCategoryByParent(parent_id) {
    if (parent_id) {
        $.ajax({
            url: baseUrl + "includes/item_process.php?process_type=get_sub_by_parent",
            type: 'POST',
            dataType: 'html',
            data: 'parent_id=' + parent_id,
            success: function (response) {
                $('#main_sub_item_id').html(response);
            }
        });
    }else{
        $('#main_sub_item_id').html('');
    }
}