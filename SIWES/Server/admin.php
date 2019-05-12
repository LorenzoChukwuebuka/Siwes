<?php include("config.php");
session_start();
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
		<a href="logout.php" class="nav-link text-light"><i class="fas fa-user-edit"></i>logout</a>
	</li>
</ul>




<div class="d-flex p-3" style="margin-top:20px; margin-left:200px;">

	<div class="card" style="width:300px;height:400px;">
	<!--	<img class="card-img-top mx-auto d-block" src="download.png" alt="" style="width:180px; height:180px;"> -->
		<div class="card-body">
				<h4 class="card-title">Profile</h4>

				<?php
				$fname = "";
				$Lname = "";
				$regnum = "";
				$faculty ="";
				$location = "";

				//

				if(isset($_SESSION['id'])){
				$loggedIn = $_SESSION['id'];

				// echo $loggedIn;


				//	$res = "SELECT `id` FROM user WHERE `Fname` = $loggedIn ";
				$res = "SELECT user.*,duration.*,faculty.*,location.*,department.*,yos.* FROM duration
					 JOIN user ON duration.id = user.duration_id JOIN faculty ON faculty.id = user.faculty_id
				     JOIN location  ON location.id = user.location_id JOIN department ON department.id = user.dept_id
				     JOIN yos ON yos.id = user.yos_id WHERE user.id='$loggedIn'"; 
				$res1 = $con->query($res);
				
			    $row =  $res1->fetch_assoc();

				 // print_r($row);  
				 
				 $id = $row['id'];
				 $fname = $row['Fname'];
				 $Lname = $row['Lname'];
				 $regnum = $row['regNumber'];
				 $dept = $row['dept'];
				 $faculty = $row['school'];
				 $location = $row['place'];
				 $level = $row['level'];
				 $duration = $row['time_duration'];
				 
				
				}



			/*	$res = "SELECT user.*,duration.*,faculty.*,location.*,department.*,yos.* FROM duration JOIN user ON duration.id = user.duration_id JOIN faculty ON faculty.id = user.faculty_id
				 JOIN location  ON location.id = user.location_id JOIN department ON department.id = user.dept_id JOIN yos ON yos.id = user.yos_id WHERE user.id = 1"; 
				$res1 = $con->query($res);
				
			    $row =  $res1->fetch_assoc();

				 // print_r($row);
				 
				 $id = $row['id'];
				 $fname = $row['Fname'];
				 $Lname = $row['Lname'];
				 $regnum = $row['regNumber']; */
			   ?>

				
				
				<p><i class="fa fa-user" aria-hidden="true"> <?=$fname." ".$Lname;?> </i> </p>
				<p><i class="fas fa-user"> <?=$regnum;?> </i> </p>
				<p><i class="fas fa-school" aria-hidden="true"> <?=$dept;?> </i></p>
				<p> <i class="fas fa-school"> <?=$faculty;?> </i> </p>
				<p><i class="fas fa-user"> <?=$location;?> </i> </p>
				<p><i class="fas fa-clock"> <?=$level;?> </i> </p>
				<p><i class="fas fa-clock"> <?=$duration;?> </i> </p>

			</div>

				
		</div>
	


	


		<div class="card" style="width:620px;height:400px; margin-left: 20px;">
			
			<div class="card-body bg-light">
				<h4 class="card-title">Welcome, <?=$fname;?></h4>
				<p class="card-text">Have a gooday</p>
			</div>
		</div>
	
</div>






<div class="d-flex p-3" style="margin-top:0px; margin-left:200px;">

		<div class="card" style="width:300px;height:150px;">
			
			<div class="card-body">
					<h4 class="card-title">Add Remarks</h4>
				<p class="card-text"> Add remarks or students work </p>
					<a href="post.php?add=<?php echo $loggedIn?>" type="button" id="" class="btn btn-success btn-sm btn-block"><i class="fas fa-plus-circle    "> Add</i></a>	
			</div>
		</div>
	
	
		
	
	
			<div class="card" style="width:300px;height:150px; margin-left: 20px;">
				
				<div class="card-body">
						<h4 class="card-title">View students Data </h4>
						<p class="card-text">View all data</p>
						 <a href="view.php?view=<?php echo $loggedIn?>" type="button" name="" id="" class="btn btn-primary btn-sm btn-block"><i class="fas fa-plus-circle"> View</i></a>
				</div>
			</div>
		
			<div class="card" style="width:300px;height:150px; margin-left: 20px;">
				
					<div class="card-body">
							<h4 class="card-title">Change records</h4>
				<p class="card-text">delete records </p>
							 <a href="view.php?view=<?php echo $loggedIn?>" type="button" name="" id="" title="disabled" class="btn btn-danger btn-sm btn-block disabled"><i class="fas fa-spinner"> Change</i></a>
					</div>
				</div>
			
	</div>

</body>



</html>