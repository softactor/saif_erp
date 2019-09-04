<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-info" aria-hidden="true" style="color: red;"></i>
            <span>Master Setup</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="nav-link sub_menu_text_nav_link" href="material.php">
                <i class="fa fa-bullseye" aria-hidden="true" style="color: red;"></i>
                <span class="sub_menu_text_design">Material</span>
            </a>
            <a class="nav-link sub_menu_text_nav_link" href="warehouse_entry.php">
                <i class="fa fa-building" aria-hidden="true" style="color: red;"></i>
                <span class="sub_menu_text_design">Warehouse</span>
            </a>
            <a class="nav-link sub_menu_text_nav_link" href="unit_entry.php">
                <i class="fa fa-circle" aria-hidden="true" style="color: red;"></i>
                <span class="sub_menu_text_design">Unit</span>
            </a>
            <a class="nav-link sub_menu_text_nav_link" href="supplier_entry.php">
                <i class="fa fa-retweet" aria-hidden="true" style="color: red;"></i>
                <span class="sub_menu_text_design">Supplier</span>
            </a>
            <a class="nav-link sub_menu_text_nav_link" href="lc_entry.php">
                <i class="fa fa-server" aria-hidden="true" style="color: red;"></i>
                <span class="sub_menu_text_design">LC</span>
            </a>
        </div>
    </li>
<!--    <li class="nav-item">
        <a class="nav-link" href="material.php">
            <i class="fa fa-bullseye" aria-hidden="true" style="color: red;"></i>
            <span>Material Information</span></a>
    </li>	
    <li class="nav-item">
        <a class="nav-link" href="warehouse_entry.php">
            <i class="fa fa-building" aria-hidden="true" style="color: red;"></i>
            <span>Warehouse Information</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="unit_entry.php">
            <i class="fa fa-circle" aria-hidden="true" style="color: red;"></i>
            <span>Unit Information</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="supplier_entry.php">
            <i class="fa fa-retweet" aria-hidden="true" style="color: red;"></i>
            <span>Supplier Information</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="lc_entry.php">
            <i class="fa fa-server" aria-hidden="true" style="color: red;"></i>
            <span>LC Information</span></a>
    </li>-->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-bag" aria-hidden="true" style="color: red;"></i>
            <span>Material Requisition</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="Purchase_entry.php"><i class="fa fa-plus" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Purchase Entry</span></a>
            <a class="dropdown-item" href="Purchase_list.php"><i class="fa fa-list" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Purchase  List</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-bag" aria-hidden="true" style="color: red;"></i>
            <span>Material Purchase</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="Purchase_entry.php"><i class="fa fa-plus" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Purchase Entry</span></a>
            <a class="dropdown-item" href="Purchase_list.php"><i class="fa fa-list" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Purchase  List</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-truck" aria-hidden="true" style="color: red;"></i>
            <span>Material Receive</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="receive_entry.php"><i class="fa fa-plus" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Receive Entry</span></a>
            <a class="dropdown-item" href="receive_list.php"><i class="fa fa-list" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Receive List</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-server" aria-hidden="true" style="color: red;"></i>
            <span>Material issue</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="issue_entry.php"><i class="fa fa-plus" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Material issue</span></a>
            <a class="dropdown-item" href="issue_list.php"><i class="fa fa-list" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Issue List</span></a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-car" aria-hidden="true" style="color: red;"></i>
            <span>Warehouse Transfer</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="warehousetransfer_entry.php"><i class="fa fa-plus" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">Warehouse Transfer</span></a>
            <a class="dropdown-item" href="issue_list.php"><i class="fa fa-list" aria-hidden="true" style="color: red;"></i><span class="sub_menu_text_design">W.Transfer List</span></a>
        </div>
    </li>
<!--    <li class="nav-item">
        <a class="nav-link" href="returntovendor_entry.php">
            <i class="fa fa-history" aria-hidden="true" style="color: red;"></i>
            <span>Return To Vendor</span></a>
    </li>-->
    <li class="nav-item">
        <a class="nav-link" href="openingstock_entry.php">
            <i class="fa fa-database" aria-hidden="true" style="color: red;"></i>
            <span>Opening Stock Entry</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="openingstock_entry.php">
            <i class="fa fa-list" aria-hidden="true" style="color: red;"></i>
            <span>Reports</span></a>
    </li>
</ul>