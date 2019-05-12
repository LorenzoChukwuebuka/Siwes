<?php 
// variable declaration
$fname = "";
$Mname = "";
$lname = "";
$faculty= "";
$dept  = "";
$duration = "";
$location = "";
$YOS="";
$regNum = "";
$error="";
$level=""; 
  
if(isset($_POST["reg"])){
    $fname = $_POST['fname'];
    $Mname =  $_POST['mname'];
    $lname = $_POST['lname'];
    $faculty=  $_POST['school'];
    $dept  =  $_POST['dept'];
    $duration =  $_POST['duration'];
    $location =  $_POST['location'];
    $YOS=  $_POST['level'];
    $regNum =  $_POST['regNum'];

   /* $sql_u = "SELECT * FROM users WHERE regNumber='$regNum'";
    $sql_u2 =  $con->query($sql_u);
    $numRows = $sql_u2->num_rows;
    if($numRows > 0){
      $error .='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Last name  is required.
    </div>';
    }  */


    // check if variables are empty 

    if(!$fname){

        $error .='<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Firstname is required.
      </div>';
    
        }

        if(!$Mname){

            $error .='<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Middlename is required.
          </div>';
        
            }
            if(!$lname){

                $error .='<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Last name  is required.
              </div>';
            
                }
                if(!$location){

                    $error .='<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    location is required.
                  </div>';
                
                    }
                    if(!$YOS){

                        $error .='<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                         level is required.
                      </div>';
                    
                        }
                        if(!$regNum || strlen($regNum) !== 11){

                            $error .='<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Reg number is required.
                            Check your registration Number
                            

                          </div>';
                        
                            }
 

                              if(!$dept){

                                $error .='<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                department  is required.
                              </div>';
                            
                                }

                                if(!$duration){

                                  $error .='<div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  Duration is required.
                                </div>';
                              
                                  }
  
     if($error != "")
     {
  
      $error = '<p> <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Please recheck your form there are errors.
    </div> </p>'.$error;
     } 
     
     
     if(!empty($fname) && !empty($Mname) && !empty($lname) && !empty($dept)&& !empty($duration)&& !empty($YOS) && !empty($location) && !empty($faculty)){
        $res = " INSERT INTO `user`(`Fname`, `Mname`, `Lname`, `dept_id`, `faculty_id`, `duration_id`, `yos_id`, `regNumber`, `location_id`) VALUES ('$fname','$Mname','$lname',$dept,$faculty,$duration,$YOS,$regNum,$location)";
       $res1 = $con->query($res);
    
        if($res1){
            header('location:Server/login.php');
        }
    

     }
} 

?>