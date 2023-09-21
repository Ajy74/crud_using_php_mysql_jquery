<!DOCTYPE html>

<html>
<head>

<title>PHP/MySQLi CRUD Operation using jquery</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css"></style>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js"> </script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
<script>

$(document).ready(function(){
$('#empTable').dataTable();
$('.file-upload').file_upload();
});

</script>
</head>

<body style="margin:20px auto">
<center>
<h2><span style="font-size:25px; color:blue">
Simple CRUD Operation using PHP, MySQL and JQUERY</span>
</h2></center>

<div class="container">
<br/><br/>
<div class="row header col-sm-12" style="text-align:center;color:green">
<span class="pull-left">
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-plus"></span> Add New
</a></span>

<div style="height:50px;"></div>
<table class="table table-striped table-bordered table-responsive table-hover" 
id="empTable" >
<thead>
<th><center>Picture</center></th>
<th><center>Name</center></th>
<th><center>Address</center></th>
<th><center>Phone</center></th>
<th><center>Post</center></th>
<th><center>Action</center></th>
</thead>
<tbody>
<?php
include('database.php');
$result=$mysqli->query("select * from employee_basics");
while($row=$result->fetch_assoc()){
$img = "profileimages/".$row['image'];  //here i have changed
?>
<tr>
<td> <img src='<?php echo $img ?>' height="70px" width="90px" /></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['post']; ?></td>
<td>
<a href="#detail<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-success btn-sm">
<span class="glyphicon glyphicon-floppy-open">
</span>Detail</a>&nbsp;

<a href="#edit<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-edit">
</span> Edit</a>&nbsp;

<a href="#del<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-danger btn-sm">
<span class="glyphicon glyphicon-trash">
</span> Delete</a>

<!-- include edit modal -->
<?php include('show_detail_modal.php'); ?>
<!-- End -->
<!-- include edit modal -->
<?php include('show_edit_modal.php'); ?>
<!-- End -->
<!-- include delete modal -->
<?php include('show_delete_modal.php'); ?>
<!-- End -->
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- include insert modal -->
<?php include('show_add_modal.php'); ?>
<!-- End -->
</div>
</body>
</html>