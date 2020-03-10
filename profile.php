<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.title {
  color: grey;
  font-size: 20px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.dia{
    font-family: arial;
}

.aa{
    padding : 50px;
    border-radius : 100%;

}

button:hover, a:hover {
  opacity: 0.7;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1000px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: white;
  
  
}

.cardd
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1000px;
  margin: auto;
  text-align: center;
  font-family: arial;
  
  
}
.aaa{
    background-image : url("contohbg.jpg"), url("contohbg.jpg");
}
  
</style>
</head>
<body class="aaa">

<h1 style="text-align:center" class = "dia">Profile</h1>

<div class="card">
  <div class="cardd">
     <img src="orang1.jpg" width="150" height="150" class="aa">
  </div>
  <h1>
  <?php
  session_start();
  echo $_SESSION['firstname']." ".$_SESSION['lastname'];
  ?>
  </h1>
  <p class="title"></p>
  <p>Email : 
  <?php
  echo $_SESSION['email'];
  ?>
  </p>
  <p><button>Edit Profile</button></p>
</div>

</body>
</html>
