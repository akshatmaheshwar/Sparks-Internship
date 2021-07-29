<?php
  include 'connection.php';
  $query = "SELECT * from customers";
  $result = mysqli_query($con,$query);
?>
<!doctype html>
<html lang="en">
  <head>
      <title>Sparks Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <link rel="icon" href="bank.png" type="image/icon type">
</head>
<style>
body{
    background-image: linear-gradient(rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),rgb(20,20,20),#000000);
}
.size{
    color: #ffffff;
    padding : 10px ;
    margin : 10px 10px ;
}
.color{
   
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
      padding-left: 25px;
  
}
img{
    width: 20%;
    padding-top: 13px;
    padding-bottom: 13px;
}
.size:hover{
    text-decoration:none;
    color:#bdb3b3;
    transition-duration: 0.5s;
    
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
h1{
    user-select: none;
    font-size: 2.5rem;
    font-weight: strong;
    line-height: 1.2;
    color:#6e6e6e;
}
/* .btn:hover{
    border: 1px white solid ;

} */

tr{
 color: #bdb3b3;
 padding: 5px;
}
tr:nth-child(odd) {
  background-color: #0d0d0d;
}
th{
    background-color:white;
}
</style>
<body>

<navbar  class="nav " > 
<div class="container-fluid">
<a href="index.php">
<img src="sparks.png"></a>
<div style ="float:right; padding:20px 0px 20px 0px ; color:#ffffff; " >
<a class="size"  href="index.php"> Home</a>
        <a class="size" style="font-weight: bold; user-select: none"> Customers</a>
        <a class="size"  href="history.php"> History</a>
</div> </div>
</navbar>  
<br><br><br>
<br><div class="container"><h1>Customers</h1><br>
<div class="row">
<div class="col-12 col-md-10 offset-md-1">
<table class="table table-responsive ">
<tr style="user-select: none">
    <th style="color:#6e6e6e; background-color:black"> S.No </th>
    <th style="color:#6e6e6e; background-color:black"> Name </th>
    <th style="color:#6e6e6e; background-color:black"> Account No. </th>
    <th style="color:#6e6e6e; background-color:black">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Email</th>
    <th style="color:#6e6e6e; background-color:black"> Mobile No. </th>
    <th style="color:#6e6e6e; background-color:black"> Current Balance</th>
    <th style="color:#6e6e6e; background-color:black"> Transfer </th>
</tr>
<?php 
    $no = 1;
    while($row=mysqli_fetch_assoc($result)){
        echo '
            <tr>
                <td class="text-center">'.$no.'</td>
                <td class="text-center">'.$row['name'].'</td>	
                <td class="text-center">'.$row['account_no'] .'</td>
                <td class="text-center">'.$row['email'].'</td>
                <td class="text-center">'.$row['mobile_no'].'</td>
                <td class="text-center">'.$row['current_balance'].'</td>
            
                <td class="text-center" style="color:#bdb3b3;"><a class="btn btn-success" href="transfer.php?id= '.$row['id'].' "> Transfer</a></td> 
                
                </tr>' ;
                 $no++;
    }

?>
</table></div></div></div>
<br><br>
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