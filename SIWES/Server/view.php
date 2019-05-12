<?php 
 session_start();
  include('config.php');
  include('Isloggedin.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}
		
		if(isset($_GET['view'])){
			 $id = $_GET['view'];
      // display all the students data and activity... 
		
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
		<a href="admin.php" class="nav-link text-light"> <i class="fas fa-home"></i>Home</a>
	</li>
	<li class="nav-item">
		<a href="logout.php" class="nav-link text-light"><i class="fas fa-user-edit"></i>logout</a>
	</li>
</ul>

  <br> <br>

  

	   <div class="container">
		 <h3> Activity Place </h3> 

		 <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> Comment  </th>
      <th scope="col"> Remark </th>
      <th scope="col"> Time </th>
      
    </tr>
  </thead> 
		 <?php 
		      
		  $res = $con->query("SELECT comments.*, user.*, remarks.* FROM comments
			JOIN user on user.id = comments.user_id JOIN remarks ON remarks.id = comments.remarks_id WHERE user.id ='$id'");

		 while($row = $res->fetch_assoc()){
			 $comment = $row['comment'];
			 $remarks = $row['remark'];
			 $time = $row['day'];
		?>
		     <tbody>
				 <tr>
				 <td> <?=$comment;?> </td>
				 <td> <?=$remarks;?> </td>
				 <td> <?=$time;?></td>
				 
				  </tr>

			</tbody>
		
		<?php	}	?>
	   
		 
		   
		 </div>


</body>
</html>