<!DOCTYPE html>
<html>
<head>
<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="loginn.css" rel="stylesheet" type="text/css" media="all" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>
  <div class="login-page">
  
    <div class="login-box  p-3"> <!-- TEST GIT DATA-->
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="text-center">Please</h2>
                <h3 class="text-center">Login First</h3>
                <p class="login-box-msg p-0">Please enter your email and password below</p>
      
                <form class="my-3" action="" method="post">
                <div class="container">
                <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-user text-login11"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control"formControlName="user_name" placeholder="Email" name="email" required>
                    </div>
                  <div class="form-group input-group mb-3">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                              <span class="fa fa-lock text-login11"></span>
                          </div>
                      </div>
                      <input type="password"class="form-control" formControlName="password" placeholder="Password" name="psw" required>
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LeWadgUAAAAANC8kFYJjQduEtvQCEwwzrMdjlOI" style="margin-bottom: 10px;"></div>
                  <br>
                  <div class="text-center mb-3 form-group">
                        <button type="submit" name="login" class="btn btn-block bg-login11 text-white">>Login</button>
                    </div>
                    <div>
                      <p> <a href="register.php">Create an Account</a></p>
                    </div>
                  <?php
                  $host = "localhost";
                  $username = "root";
                  $dbname = "datauts";
                  $password = "";
                  $captcha = "";

                  $captcha;
                  if(isset($_POST['g-recaptcha-response']))
                  $captcha= $_POST['g-recaptcha-response'];

                  $str = "https://www.google.com/recaptcha/api/siteverify?secret=6LeWadgUAAAAAE2NT-1b5diXEXhafhqX4Cf9107T"."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];

                  $response = file_get_contents($str);
                  $response_arr = (array) json_decode($response);
                  if(isset($_POST['login'])){
                  $db     = new mysqli($host, $username, $password, $dbname);
                  $email  = $_POST["email"];
                  $hash   = md5($_POST['psw']);
                  $query  = "SELECT * FROM user WHERE email = '$email' AND pass = '$hash'";
                  $result = $db->query($query);
                  list($firstname,$lastname,$emel,$birthdate,$gender,$pass) = mysqli_fetch_array($result);
                  $count  = mysqli_num_rows($result);
                  if($count == 1 && $response_arr["success"]==true){
                    echo "Berhasil Login!";
                    session_start();
                    $_SESSION['firstname']  = $firstname;
                    $_SESSION['lastname']   = $lastname;
                    $_SESSION['email']      = $emel;
                    $_SESSION['pass']       = $pass;
                    echo "<script>window.location.href = 'profile.php';</script><br>";
                  } 
                  else if($count == 1 && $response_arr["success"]==false){
                    echo "Captcha anda bermasalah, apakah anda bot?";
                  } else {
                    echo "Email atau password yang dimasukkan tidak sesuai";
                  }
                }
                ?>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>