<?php include('config.php');
    session_start();
    
     // declare variables
           $error = '';
           $username ='';
           $msg = "";
        
    
          // check user inputs and validate
       if(isset($_POST['login'])){
    
         // collect input data
         $username = $_POST['pwd'];
        
         
         if(!$username){
    
             $error .='<div class="alert alert-danger alert-dismissible col-md-6">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
              Please Enter reg number. 
           </div>';
    
            }

                 // check database for user 
         if(!empty($username)){
            $res = $con->query( "SELECT * FROM user WHERE regNumber='$username'");
            
            //create a cookie with the session where the user is logged in


            /*while($rw = $res->fetch_assoc()){
              echo $rw['count'];
            }*/
            $numRows = $res->num_rows;
            if($numRows > 0){
              $rw = $res->fetch_assoc();              
             $_SESSION['id'] = $rw['id'];
             $_SESSION['Fname']=$fname;

              header('location:admin.php');
            }else{
              
              $msg ='<div class="alert alert-danger alert-dismissible col-md-6">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                Invalid Reg Number. 
            </div>';
     
            }
        }
        }
 ?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> LOGIN </title>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
 
  

</head>

 <body>

    <div class="container">
    
    <br>
    <header>
     <p> <h3> LOGIN </h3> </p>
     </header>

     <div class="error"> <?=$error ?> </div>
    <div class="msg"> <?=$msg?> </div>
     <br>
     <br>

 <form method = "POST">
  <div class="form-group col-md-6">
    <label for="username"> Registration Number </label>
    <input type="password" class="form-control" name="pwd"> 
  </div>
   
    <button type="submit" name="login" class="btn btn-primary">Login</button>
    <a href="../index.php" type="submit" name="reg" class="btn btn-primary">Not signed in? </a>
</form>

 </div>

 	</body>
 	</html>