<?php

require_once "db.php";


$name = $lname = $email = $password = '';
$name_err = $lname_err = $email_err = $password_err = '';

 if($_SERVER['REQUEST_METHOD'] == 'POST') {

 if(empty(trim($_POST['name']))){

  $name_err = "Please enter name";
}else{

$name = trim($_POST['name']);

}



 if(empty(trim($_POST['lastname']))){

  $lname_err = "Please enter last name";
}else{

$name = trim($_POST['lastname']);
}



 if(empty(trim($_POST['email']))){

  $email_err = "Please enter email";
}else

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

$email_err = "*Please enter email in the correct format.";


}else {

$sql = "SELECT id From user where email = ?";

if($stmt = $conn->prepare($sql)){

  $stmt->bind_param("s",$email);

  if($stmt->execute()){

    $stmt->store_result();
     if($stmt->num_rows > 0){
      $email_err = "this email is taken.";

    }
    else{
      $email = trim($_POST['email']);
    }
  }else{die("ka ndodhur nje error"); }

    }else{die("ka ndodhur nje error"); }

    $stmt->close();




    }


     if(empty(trim($_POST['password']))){

      $password_err = "Please enter password";
    } elseif (strlen(trim($_POST['password'])) <5) {
$password_err = "*Pasword must have at least 6 characters!";
}
else{

    $password = trim($_POST['password']);

     }

 if(empty($name_err) && empty($lname_err) && empty($email_err) && empty($password_err)){

 $sql = "INSERT INTO users (name,last_name,email,password) VALUES (?,?,?,?)";
 if($stmt = $conn->prepare($sql)){

 $stmt->bind_param("ssss",$param_name,$param_lname,$param_email,$param_password);

 $param_name = $name;
 $param_lname = $lname;
 $param_email = $email;
 $param_password = password_hash($password, PASSWORD_DEAFULT);

 if($stmt->execute()){

header('location: login.php');
}else {
  echo "Could not create a new user";
}
$stmt->close();
 }
}

$conn->close();
}





 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

       <meta charset="utf-8">
       <title>Sign Up</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </head>
  <body>

<div class="container">

  <h2>Sign Up</h2>
  <p>Please fill this form to create an account.</p>

<form class="border p-3" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

  <div class="form-group">
    <label for="name">Name</label>
      <input type="text" name="name" id="name" value="" placeholder="Insert name" required>
      <span class="error"> <?php echo $name_err; ?></span>

  </div>

<div class="form-group">
  <label for="name">Last Name</label>
    <input type="text" name="lastname" id="lastname" value="" placeholder="Insert lastname" required>
    <span class="error"> <?php echo $lname_err; ?> </span>

</div>


<div class="form-group">
  <label for="email">email</label>
    <input type="text" name="email" id="email" value="" placeholder="Insert email" required>
    <span class="error"> <?php echo $email_err; ?></span>

</div>

<div class="form-group">
  <label for="pasword">pasword</label>
    <input type="password" name="password" id="password" value="" placeholder="Insert password" required>
    <span class="error"> <?php echo $password_err; ?></span>

</div>

<div class="form-group">

<button type="submit" class="btn btn-info" name="submit">Sign Up</button>

<p> Already have an account? <a href="login.php"> Login here</a> </p>

  </form>
</div>


</div>
  </body>
</html>
