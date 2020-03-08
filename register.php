<!DOCTYPE html>
<html>
    <head>
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="regis.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-5">
                                        <div class="input-group-desc">
                                            <label for="firstname"><b>Firstname</b></label>
                                            <input type="text" placeholder="Firstname" name="firstname" required><br>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group-desc">
                                            <label for="lastname"><b>Lastname</b></label>
                                             <input type="text" placeholder="Lastname" name="lastname" required><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" placeholder="Enter Email" name="email" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" placeholder="Enter Password" name="psw" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Repeat Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" placeholder="Repeat Password" name="psw-repeat" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Birthday</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" id="birthday" name="birthday"><br>
                               </div>
                            </div>
                        </div>  
                        
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option id="male" name="gender" value="male">Male</option>
                                            <option id="female" name="gender" value="female">Female</option>       
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">You are agree to our term & police</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="regis" class="btn btn--radius-2 btn--red">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <?php
    $host = "localhost";
    $username = "root";
    $dbname = "datauts";
    $password = "";
    if(isset($_POST['regis'])){
    $db = new mysqli($host, $username, $password, $dbname);

    $firstname  = $_POST["firstname"];
    $lastname   = $_POST["lastname"];
    $email      = $_POST["email"];
    $checker    = "SELECT * FROM user WHERE email = '$email'";
    $emailcheck = $db->query($checker);
    $count      = mysqli_num_rows($emailcheck);
    $gender     = $_POST["gender"];
    $birthdate  = $_POST["birthday"];
    $hash       = md5($_POST["psw"]);
    $repeat     = md5($_POST["psw-repeat"]);
        if($count == 0 && $repeat == $hash){
            $query  = "INSERT INTO user VALUES('".$firstname."','".$lastname."','".$email."','".$birthdate."','".$gender."','".$hash."')";
            $db->query($query);
            echo "<p style='font-size: 32px;font-color: green'>Akun berhasil dibuat!</p>";
        } 
        else if($count == 1 && $repeat == $hash) {
            echo "<p>Email yang dimasukkan sudah terdaftar! Silahkan gunakan email yang lain.</p>";
        } else {
          echo "<p style='font-size: 32px;font-color: 'red'>Password yang dimasukkan tidak sama dengan repeat password</p>";
        }
    }
  ?>
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>