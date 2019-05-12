<?php require_once('../server/config.php'); 
include('../server/Isloggedin.php');
session_start();

if (!isLoggedIn()) {
    header('location:adminlog.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title> Admin-page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/all.css">
		<script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
<ul class="nav nav-pills nav-stacked  " style="background-color:rgb(27, 86, 110)">
	<li class="nav-item">
		<a href="#" class="nav-link text-light"> <i class="fas fa-home"></i>Home</a>
	</li>
	<li class="nav-item">
		<a href="logouta.php" class="nav-link text-light"><i class="fas fa-user-edit"></i>logout</a>
	</li>
    <li class="nav-item">
		<a href="#" class="nav-link text-light"><i class="fas fa-user"></i> Admin </a>
	</li>
</ul>

  <div class='container-fluid'>
  <h4> Students Data </h4>
     <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> Name </th>
      <th scope="col"> School</th>
      <th scope="col"> Department </th>
      <th scope="col">Year of Study</th>
      <th scope="col">location</th>
    </tr>
  </thead>
  <tbody>
  <?php 

  // variable declaration 
   $name="";
   $faculty="";
   $dept="";
   $yos="";
   $location="";

  
  	$res = "SELECT user.*,duration.*,faculty.*,location.*,department.*,yos.* FROM duration
      JOIN user ON duration.id = user.duration_id JOIN faculty ON faculty.id = user.faculty_id
      JOIN location  ON location.id = user.location_id JOIN department ON department.id = user.dept_id
      JOIN yos ON yos.id = user.yos_id WHERE user.id";
$result = $con->query($res);
while($row = $result->fetch_assoc())
{ 
    $name = $row['Fname']." ".$row['Mname']." ".$row['Lname'];
    $faculty = $row['school'];
    $dept = $row['dept'];
    $yos = $row['level'];
    $location = $row['place'];
  
 ?>

 <tr>
   <td> <?=$name;?> </td>
   <td> <?=$faculty;?> </td>
   <td><?=$dept;?> </td>
   <td><?=$yos;?> </td>
   <td> <?=$location;?></td>
     
   </tr>
 <?php } ?>
 
   
    </tbody>
</table>

</div>

</body>
<html>

