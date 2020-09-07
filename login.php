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
  <label for="email">email</label>
    <input type="text" name="email" id="email" value="" placeholder="Insert email" required>
    <span class="error"> <?php //echo $email_err; ?></span>

</div>

<div class="form-group">
  <label for="pasword">pasword</label>
    <input type="text" name="password" id="password" value="" placeholder="Insert password" required>
    <span class="error"> <?php //echo $password_err; ?></span>

</div>

<div class="form-group">

<button type="submit" class="btn btn-info" name="submit">Sign Up</button>

<p> You are not registred? <a href="regjistrimi.php"> Create account</a> </p>

  </form>
</div>


</div>
  </body>
</html>
