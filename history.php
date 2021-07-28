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
    background-image: linear-gradient(#000000,rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),#000000);
}
.size{
    color: #ffffff;
    padding : 10px ;
    margin : 10px 10px ; 
}
.color{
    background-color:	transparent;
    box-shadow: 0px 0px 10px #00ff80 ;
    border-radius:0px;   
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
.nav{
    background-image: linear-gradient(#000000,rgb(20,20,20))	;
    position:fixed;
    margin:0%;
    width:100%;
    z-index:1;
}
h1{
    user-select: none;
    font-size: 2.5rem;
    font-weight: strong;
    line-height: 1.2;
    padding-left: 25px;
    color:#6e6e6e;
}
img{
    width: 20%;
    padding-top: 13px;
    padding-bottom: 13px;
}
.size1{
color: #fff;
}
.size1:hover{
    color:#bdb3b3;
    text-decoration:none;
    transition-duration: 0.5s;
}
a{
    font-size:90%;
}
.size:hover{
    text-decoration:none;
    color:#bdb3b3;
    transition-duration: 0.5s;
}
tr{
 color: #bdb3b3;
 padding: 5px;
}
tr:nth-child(odd) {
  background-color: #0d0d0d;
}
th{
    background-color:black;
}
</style>
<body>

<navbar  class="nav" > 
<div class="container-fluid">
<a href="index.php">
<img src="sparks.png"></a>
<div style ="float:right; padding:20px 0px ; color:#ffffff; " >
        <a class="size" href="index.php"> Home</a>
        <a class="size" href="customers.php"> Customers</a>
        <a class="size" style="font-weight: bold; user-select: none"> History</a>
</div> </div>
</navbar>  
<br><br><br>
<br><div class="container"><h1>Transfer History</h1><br>
<div class="row">
<div class="col-12 col-md-10 offset-md-2">
<table class="table table-responsive ">
<tr style="user-select: none; color:#6e6e6e">
    <th> S.No </th>
    <th> Sender Name </th>
    <th> Recepient Name </th>
    <th> Amount transferred </th>
    <th> Date and Time </th>
</tr>
<?php 
    include 'connection.php';

    $sql ="SELECT * from transfer  ORDER BY timestamp DESC ";

    $query =mysqli_query($con, $sql);
    if($query === FALSE) { 
    die(mysqli_error());
}

    $no = 1;
    while($row=mysqli_fetch_assoc($query)){
        echo '
            <tr>
                <td class="text-center" style="color:#bdb3b3;">'.$no.'</td>
                <td class="text-center" style="color:#bdb3b3;">'.$row['sender'].'</td>	
                <td class="text-center" style="color:#bdb3b3;">'.$row['reciever'].'</td>
                <td class="text-center" style="color:#bdb3b3;">'.$row['amount'].'</td>
                <td class="text-center" style="color:#bdb3b3;">'.$row['timestamp'].'</td>
                </tr>' ;
                $no++;
    }

?></table></div></div></div>
<footer><center>
<br><br>
<div class="container">
<div class="footer">
    
    <br>
<a class="size1 align-self-center" href="https://www.linkedin.com/in/akshat-saravanan-2124ba215/">© Designed by Akshat Maheshwar</a> <br><br>
</div></div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>