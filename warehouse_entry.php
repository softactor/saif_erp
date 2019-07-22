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
			<div class="row">
            <div class="col-md-3">
                <form id="sidebar">
                    <div class="form-group">
                        <label for="nm"><b style="color:red;">WAREHOUSE ID</b></label>
                        <input type="text" id="id" name="id" class="form-control" placeholder="Identity" value="WID-"/>
                    </div>
                    <div class="form-group">
                        <label for="nm"><b style="color:red;">WAREHOUSE NAME</b></label>
                        <input type="text" id="nm" name="nm" class="form-control" placeholder="Full Name"/>
                    </div>
                    <button type="button" id="save" class="btn btn-primary" onclick="saveData()">Save</button>
                    <button type="button" id="update" class="btn btn-warning" onclick="updateData()">Update</button>
                </form>
            </div>
            <div class="col-md-9">
                <table id="dataTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="40">Warehouse ID</th>
                            <th>Warehouse Name</th>
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