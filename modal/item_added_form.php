<!-- Modal -->
<div class="modal fade" id="item_added_form" role="dialog">
    <form id="item_added_form_value">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal_header_custom_background">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Material add</h4>
                </div>
                <div class="modal-body modal_body_custom_background">
                    <div class="modal_body_centerize">                    
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="parent_code">Parent Category:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="main_item_id" name="parent_item_id" onchange="getSubCategoryByParent(this.value);">
                                    <option value="">Select</option>
                                    <?php
                                    $parentCats = getTableDataByTableName('parent_category');
                                    if (isset($parentCats) && !empty($parentCats)) {
                                        foreach ($parentCats as $pcat) {
                                            ?>
                                            <option value="<?php echo $pcat['id'] ?>"><?php echo $pcat['name'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="parent_code">Sub Category:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="main_sub_item_id" name="sub_item_id">
                                    <option value="">Select</option>
                                    <?php
                                    $parentCats = getTableDataByTableName('sub_category');
                                    if (isset($parentCats) && !empty($parentCats)) {
                                        foreach ($parentCats as $pcat) {
                                            ?>
                                            <option value="<?php echo $pcat['id'] ?>"><?php echo $pcat['name'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="parent_code">Item Code:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="item_code" placeholder="Enter item code" name="item_code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="name">Name:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="item_name" placeholder="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="description">Description:</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" id="item_description" name="description" placeholder="Enter description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer modal_footer_custom_background">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" onclick="processItems('item_added_form_value')">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>