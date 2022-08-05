<?php
  include "connection.php";
  include "navbar.php";

      

  
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style> 
  

</head>
<body>
  <?php
  $fname_error = $lname_error = $email_error = $password_error = $mobile_error  = "";
   


       if(isset($_POST['submit']))
      {
        $firstname = mysqli_real_escape_string($db, $_POST['first']);
         $lastname = mysqli_real_escape_string($db, $_POST['last']); 
         $username = mysqli_real_escape_string($db, $_POST['username']);
          $password = mysqli_real_escape_string($db, $_POST['password']);
           $roll = mysqli_real_escape_string($db, $_POST['roll']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
             $contact = mysqli_real_escape_string($db, $_POST['contact']);
                if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
$fname_error = "Name must contain only alphabets and space";
}
if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
$fname_error = "Name must contain only alphabets and space";
}
if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
$lname_error = "Name must contain only alphabets and space";
}
               if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                 $email_error = "Please Enter Valid Email ID";
               }
               if(strlen($password) < 6) {
$password_error = "Password must be minimum of 6 characters";
}     

if(strlen($roll)) {
$roll_error = "Roll  number must be minimum of  3 characters";
}
if(strlen($contact) < 10) {
$mobile_error = "Mobile number must be minimum of 10 characters";
}

        
      if( $fname_error =="" && $lname_error =="" && $email_error =="" && $password_error =="" && $mobile_error  == ""  ) {
          if(mysqli_query($db,"INSERT INTO Student(first, last, username, password, roll, email, contact) VALUES('$firstname', '$lastname', '$username', '$password', '$roll', '$email', '$contact');"))
          {header("location:login.php");
          ?>
          <script type="text/javascript"> 
           alert("Registration successful"); 
        </script>

     <?php
exit();
} else {
echo "Error: " . $sql . "" . mysqli_error($db);
}
}
mysqli_close($db);
}
echo "LOG ERROR";
 
         
  ?>

<section>
  <div class="reg_img">

    <div  class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>

      <form name="Registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        
        <div class="login">
        <div>  <input class="form-control" type="text" name="first" placeholder="First Name" required="" value="">
        <span id="span" class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span> </div>
          <br>
         <div>  <input class="form-control" type="text" name="last" placeholder="Last Name" required="" value=""> 
         <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span></div> <br> 
         <div> <input class="form-control" type="text" name="username" placeholder="Username" required="" value="">  </div> <br>
         <div> <input class="form-control" type="password" name="password" placeholder="Password" required="" value=""> 
         <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span></div> <br>
         <div> <input class="form-control" type="text" name="roll" placeholder="Roll No" required="" value=""> 
          <span class="text-danger"><?php if (isset($roll_error)) echo $roll_error; ?></span>
          </div>
          <br>
           
       
          <div><input class="form-control" type="text" name="email" placeholder="Email" required="" value=""> 
            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
          </div><br>
        <div>  <input class="form-control" type="text" name="contact" placeholder="Phone No" required="" value=""> 
        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span></div><br>
       
         <div> <input class="btn btn-default" type="submit" name="submit" value="signup" style="color: black; width: 70px; height: 30px">  
         </div> </div>
      </form>
     
    </div>
  </div>
</section>

    
 

</body>
</html>