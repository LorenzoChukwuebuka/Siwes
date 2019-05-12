<?php 
 session_start();
  include('config.php');
  include('Isloggedin.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
  }



  $comment = "";
  $error= "";
  $msg = "";
  $res = "";

   if(isset($_GET['add'])){
       $id = $_GET['add'];

    if(isset($_POST['submit'])){
       $comment = $_POST['comment'];
       $remarks = $_POST['remarks'];

       $time = date("Y/m/d");

       if(!$comment){

        $error .='<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Comment is required.
      </div>';
    
        }

        if(!$remarks){

          $error .='<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Remarks is required.
        </div>';
      
          }

          if($error != "")
     {
  
      $error = '<p> <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Please recheck your form there are errors.
    </div> </p>'.$error;
     } 

     if(!empty($comment) && !empty($remarks)){
       $res = $con->query("INSERT INTO `comments`(`comment`, `user_id`, `remarks_id`,`day`) VALUES ('$comment',$id,$remarks,'$time')");
     }

      if($res){
        $msg = '<p> <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Activity uploaded successfully!.
      </div> </p>';
      }
       
    }
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

   <style> 
   .container{
       margin-left:100px;
   }

   h3{
       margin-left:100px;
   }
   button{
       margin-left:10px;
   }
   
   </style>
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
   
    <h3> <p> Add Remarks about todays Activity </p> </h3>
     <div class="msg col-md-6"> <?=$msg; ?> </div>
     <div class="error col-md-6" > <?=$error; ?> </div>


    <br> <br>

    <form method="POST">

       <div class="form-group col-md-8" >
           <label for="comment"> Activity:</label>
           <textarea class="form-control" rows="8" name="comment"></textarea>
        </div>

      <div class="form-group col-md-8">
      <label for="school"> Remarks </label>
      <select class="form-control" name="remarks">
       <option value="-">Select Remarks</option>
       <?php 
				$result = $con->query('SELECT * FROM Remarks'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['remark'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
		?>
         </select>
         </div> 

           <br>
           <button type="submit" name="submit" class="btn btn-primary"> Submit </button>
         


         </form>

         </div>

</body>
</html>