<?php include 'header.php' ?>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
            Data Table Example</div>
        <div class="card-body">
            <!--here your code will go-->
			<div class="container">
			
                <form id="sidebar">
                <div class="row">
				
				
				
					<div class="col-md-4">
                        <label for="id">Supplier ID</label>
                        <input type="text" id="supplier_id" name="supplier_id" class="form-control" placeholder="Identity" value="WID-"/>
                    </div>
					
                    <div class="col-md-4">
                        <label for="nm"><b style="color:red;">Supplier Name</b></label>
                        <input type="text" id="supplier_company" name="supplier_company" class="form-control" placeholder="Full Name"/>
                    </div>
					
					<div class="col-md-4">
                        <label for="nm">Address</label>
                        <input type="text" id="supplier_address" name="supplier_address" class="form-control" placeholder="Address"/>
                    </div>
					
					
				
					
					
					<div class="col-md-4">
                        <label for="nm">Contact Person</label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person"/>
                    </div>
					
					
				
					
					<div class="col-md-4">
                        <label for="nm">Phone</label>
                        <input type="text" id="supplier_phone" name="supplier_phone" class="form-control" placeholder="Phone"/>
                    </div>
					
					
					<div class="col-md-4">
                        <label for="nm">Balance</label>
                        <input type="text" id="supplier_op_balance" name="supplier_op_balance" class="form-control" placeholder="balance"/>
                    </div>
					
					
					<div class="col-md-4">
                        <label for="nm">Type</label>
                        <input type="text" id="cc" name="cc" class="form-control" placeholder="Type"/>
                    </div>
					
					
				</div><br>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<button type="button" id="save" class="btn btn-primary" onclick="saveData()">Save</button>
						<button type="button" id="update" class="btn btn-warning" onclick="updateData()">Update</button></div>
					</div>
					<div class="col-md-4"></div>
                </form>
			<div class="row">
            <div class="col-md-12">
                <table id="dataTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="40">S.ID</th>
                            <th>Supplier Name</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
						
					</tbody>
                </table>
            </div>
        </div>
        </div>
            <!--here your code will go-->
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include 'footer.php' ?>
<script src="script_com.js"></script>