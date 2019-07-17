<?php

if (isset($_GET['search_data']) && $_GET['search_data'] == 'material_receive_search_form') {
    print '<pre>';
    print_r($_POST);
    print '</pre>';
    exit;
    
}
