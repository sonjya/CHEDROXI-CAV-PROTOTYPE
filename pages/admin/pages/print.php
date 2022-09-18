<?php

require_once '../../../modules/dbconnection.php';

$id = $_GET['id'];

$sql = "select * from tbl_process a inner join tbl_schools b inner join tbl_courses c inner join tbl_payments d inner join tbl_commissioners e where a.schoolid=b.schoolid and a.courseid=c.courseid and a.paymentid=d.paymentid and a.commissionerid=e.commissionerid and a.id=$id";
$result = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_assoc($result);

?>