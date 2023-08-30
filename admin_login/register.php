<?php
session_start();

$db=mysqli_connect("localhost","root","","green");
if(isset($_POST['register_btn']))
{
    $firstname=mysqli_real_escape_string($db, $_POST["firstname"]);
    $lastname=mysqli_real_escape_string($db, $_POST["lastname"]);
    $email=mysqli_real_escape_string($db, $_POST["email"]);
    $password=mysqli_real_escape_string($db, $_POST["password"]);
    $password2=mysqli_real_escape_string($db, $_POST["password2"]);
     $q=mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
     if(mysqli_num_rows($q)>0){
         ?> <a class=""><h2><b><?php echo 'email already exists'; ?></b></h2></a><?php
     }
     elseif($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(firstname,lastname,email,password) VALUES('$firstname','$lastname','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['email']=$email;
            header("location:index.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";
     }
}
?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
      <?php
      if(isset($_SESSION['message']))
      {
           echo "<div id='error_msg'>".$_SESSION['message']."</div>";
           unset($_SESSION['message']);
      } ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="register.php">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="small mb-1" for="inputFirstName">First Name</label>
                                                      <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" name="firstname" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="small mb-1" for="inputLastName">Last Name</label>
                                                      <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" name="lastname" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="small mb-1" for="inputEmailAddress">Email</label>
                                              <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email"/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="small mb-1" for="inputPassword">Password</label>
                                                      <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                      <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="password2"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                              <div class="form-group mt-4 mb-0">

                                                 <button type="submit" class="btn btn-primary" name="register_btn">Create Account</button>
                                              </div>

                                            </center>
                                                                                    </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                          <a href="login.php">Have an account? Go to login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
