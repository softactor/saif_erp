<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-search"></i>
        Receive Search</div>
    <div class="card-body">
        <form class="form-horizontal" action="" id="material_receive_search_form">
            <div class="table-responsive">          
                <table class="table table-borderless search-table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="fromdate">From Date:</label>
                                    <input type="text" class="form-control" id="from_date" name="from_date">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="todate">To Date:</label>
                                    <input type="text" class="form-control" id="todate" name="todate">
                                </div>
                            </td>                    
                            <td>
                                <div class="form-group">
                                    <label for="todate">MRR:</label>
                                    <input type="text" class="form-control" id="mrr_no" name="mrr_no">
                                </div>
                            </td>     
                            <td>
                                <div class="form-group">
                                    <label for="supplyer">Supplyer:</label>
                                    <select class="form-control" id="supplyer_id" name="supplyer_id">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>                    
                            <td>
                                <div class="form-group">
                                    <label for="supplyer">Requisition:</label>
                                    <select class="form-control" id="requisition_id" name="requisition_id">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="todate">Requisition Date:</label>
                                    <input type="text" class="form-control" id="requisition_date" name="requisition_date">
                                </div>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>


