<?php
session_start();
$db=mysqli_connect("localhost","root","","green");
if(isset($_POST['login_btn']))
{
    $email=mysqli_real_escape_string($db, $_POST["email"]);
    $password=mysqli_real_escape_string($db, $_POST["password"]);
    $password=md5($password);
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($db,$sql);
    $_SESSION['email']="$email";
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['email']=$email;
        header("location:index.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combiation incorrect";

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
        <title>Page Title - Admin</title>
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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><i class="fas fa-user"></i> Administrator Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="login.php">
                                            <div class="form-group">
                                              <label class="small mb-1" for="inputEmailAddress">Email</label>
                                              <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address"  name="email"required/>
                                            </div>
                                            <div class="form-group">
                                              <label class="small mb-1" for="inputPassword">Password</label>
                                              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password"name="password" required/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                  <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              <a class="small" href="password.php">Forgot Password?</a>

                                              <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
                            <div class="text-muted">Copyright &copy; Green the Map</div>
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
