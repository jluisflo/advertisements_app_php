<?php
include_once 'class.AutoPagination.php';
$obj = new AutoPagination(50, $_GET['page']); // 50 is the total record count
echo $obj->_paginateDetails();
?>