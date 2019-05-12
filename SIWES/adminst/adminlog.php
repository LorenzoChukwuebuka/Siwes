<?php include('../server/config.php');
    session_start();
    
     // declare variables
           $error = '';
           $username ='';
           $password = "";
           $msg = "";
        
    
          // check user inputs and validate
       if(isset($_POST['login'])){
    
         // collect input data
         $username = $_POST['username'];
         $password = $_POST['pwd'];
        
         
         if(!$username){
    
             $error .='<div class="alert alert-danger col-md-6 error">
            <li>  Username is required. </li>
           </div>';
    
            }
            if(!$password){
    
                $error .='<div class="alert alert-danger col-md-6 error">
               <li>  Password is required. </li>
              </div>';
       
               }

                 // check database for user 
         if(!empty($username)){
            $res = $con->query( "SELECT * FROM admin WHERE username='$username' AND password='$password'");
            
            //create a cookie with the session where the user is logged in


            /*while($rw = $res->fetch_assoc()){
              echo $rw['count'];
            }*/
            $numRows = $res->num_rows;
            if($numRows > 0){
              $rw = $res->fetch_assoc();              
             $_SESSION['id'] = $rw['id'];
             $_SESSION['username']=$fname;

              header('location:monitor.php');
            }else{
              
              $msg ='<div class="alert alert-danger alert-dismissible col-md-6">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
               Invalid details.
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
     <p> <h3> Official Admin LOGIN </h3> </p>
     </header>

     <ul> <?=$error ?> </ul>
    <div class="msg"> <?=$msg?> </div>
     <br>
     <br>

 <form method = "POST">
  <div class="form-group col-md-6">
    <label for="username"> Username </label>
    <input type="text" class="form-control" name="username"> 
  </div>

  <div class="form-group col-md-6">
    <label for="password"> Password </label>
    <input type="password" class="form-control" name="pwd"> 
  </div>
   
    <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>

 </div>

 	</body>
 	</html>