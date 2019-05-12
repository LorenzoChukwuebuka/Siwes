<?php include("Server/config.php");
include('Server/processreg.php');

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> SIWES || Registration </title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</head>

 <body>

    <div class="container">
   
    <header>
     <p> <h3> Register </h3> </p>
     </header>
     <div class="error">
     <?=$error;?> </div>
     <br>
     <br>


 <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 

  <div class="form-group col-md-8">
    <label for="fname"> First Name </label>
    <input type="text" class="form-control" name="fname"> 
  </div>
  <div class="form-group col-md-8">
    <label for="Mname">Middle Name</label>
    <input type="text" class="form-control" name="mname">
  </div>

  <div class="form-group col-md-8">
    <label for="Lname">Last Name</label>
    <input type="" class="form-control" name="lname">
  </div>
   
  <div class="form-group col-md-8">
    <label for="regNum">Registration Number</label>
    <input type="number" class="form-control" name="regNum">
  </div>
    
     <div class="form-group col-md-8">
      <label for="school"> School </label>
      <select class="form-control" name="school">
       <option value="-">Select school</option>
        <?php
				$result = $con->query('SELECT * FROM faculty'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['school'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
         </select>
         </div>

         <div class="form-group col-md-8">
       <label for="dept"> Department </label>
         <select class="form-control" name="dept">
           <option value="-">Select department </option>
            <?php
				$result = $con->query('SELECT * FROM department'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['dept'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
          </select>
          </div>

          <div class="form-group col-md-8">
       <label for="sel1"> Level </label>
         <select class="form-control" name="level">
           <option value="-">Select level </option>
            <?php
				$result = $con->query('SELECT * FROM YOS'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['level'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
          </select>
          </div>

          <div class="form-group col-md-8">
       <label for="sel1"> Duration of IT </label>
         <select class="form-control" name="duration">
           <option value="-">Select duration </option>
            <?php
				$result = $con->query('SELECT * FROM duration'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['time_duration'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
          </select>
          </div>

          <div class="form-group col-md-8">
       <label for="sel1"> Location </label>
         <select class="form-control" name="location">
           <option value="-">Select Location </option>
            <?php
				$result = $con->query('SELECT * FROM location'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['place'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
          </select>
          </div>
          <br>

       <button type="submit" name="reg" class="btn btn-primary"> Register </button>
       <a href="Server/login.php" type="submit" name="reg" class="btn btn-primary"> Already signed in? </a>
       
      </form>

 </div>

 	</body>
 	</html>
