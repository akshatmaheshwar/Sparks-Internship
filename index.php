<!doctype html>
<html lang="en">
  <head>
      <title>Sparks Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
<style>
body{
    background-color:rgb(20,20,20);
}
.size{
    padding : 10px ;
    margin : 10px 10px ; 
}
}
.color{
    background-color:	#00FF7F;
    box-shadow: 0px 0px 10px #00ff80 ;
    border radius: 0px;   
    width:100%;
}
.title{
    padding-left: 35px ;
    padding-right: 0px;
    font-family: 'helvetica';
    padding-top:15px ;
    color:	#ffffff; 
    font-size:35px ; 
    font-weight:bold;
}
/* .button{
    text-decoration:none;
    color:#ffffff;
    background-color:#00FF7F;
    border:2px #00FF74 ;
    border-radius:5px;
    font-size:20px;
    font-family: 'Baloo Tammudu';
    padding: 15px;
    margin: 0px 20px;
} */
.button:hover{
    /* color:#ffffff; */
    text-decoration:none;
    /* background-color:#00FF7F; */
    border:1px white solid ;
    box-shadow: 0px 0px 3px white;
    
}
.nav{
    background-image: linear-gradient(#000000,rgb(20,20,20))	;
    position:fixed;
    margin:0%;
    width:100%;
}
a{
    text-decoration:none;
    user-select:none;
    color:#ffffff
}
a:hover{
    text-decoration:none;
    user-select:none;
    color:#ffffff
}
h1{
    color:#ffffff;
    user-select:none;
}
img{
    width: 20%;
    padding-top: 13px;
}
.row div{
    padding: 15px;
}
p{
    color:#ffffff;
    user-select:none; 
    font-size: 2.5rem;
    font-weight: strong;
    line-height: 1.2;
}
</style>
<body>

<navbar  class="nav " > 
<div class="container-fluid">
<a href="index.php">
<img src="sparks.png"></a>
</div>
</navbar> 
<br><br><br><br><br><br><br><br>
<center><p> Welcome to The Bank Of Sparks! </p></center><br><br><br>
<div class="container">
<div class="row">

<a href="customers.php" class="btn btn-success col-4 col-xl-2 offset-xl-3 btn-inline offset-1 col-md-3 offset-md-2 button"> Customers </a>
<a href="history.php" class="btn btn-success col-4 col-xl-2 offset-xl-2 btn-inline offset-2 col-md-3 button">Tansfer History</a>
</div></div>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
