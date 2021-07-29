<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $send = $_GET['id'];
    $rec = $_POST['to'];
    $amount1 = $_POST['amount1'];
    $sql = "SELECT * from customers where id=$send";
    $query = mysqli_query($con,$sql);
    $row1 = mysqli_fetch_array($query); 
    $sql = "SELECT * from customers where id=$rec";
    $query = mysqli_query($con,$sql);
    $row2 = mysqli_fetch_array($query);
    if (($amount1)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }
   else if(($amount1) > $row1['current_balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Insufficient Balance")'; 
        echo '</script>';
    }
     else if($amount1 == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }
else {
        $newbalance = $row1['current_balance'] - $amount1;
        $sql = "UPDATE customers set current_balance=$newbalance where id=$send";
        mysqli_query($con,$sql);
        $newbalance = $row2['current_balance'] + $amount1;
        $sql = "UPDATE customers set current_balance=$newbalance where id=$rec";
        mysqli_query($con,$sql);
                
                $sender = $row1['name'];
                $receiver = $row2['name'];
                $sql = "INSERT INTO transfer(`sender`, `reciever`, `amount`) VALUES ('$sender','$receiver','$amount1')";
                $query=mysqli_query($con,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='success.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount1 =0;
        }
    
}
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
     <link rel="icon" href="bank.png" type="image/icon type">
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
    background-color:	#00FF7F;
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
a{
    font-size:90%;
}
.nav{
    background-image: linear-gradient(#000000,rgb(20,20,20))	;
    position:fixed;
    margin:0%;
    width:100%;
    z-index:1;
}
img{
    width: 20%;
    padding-top: 13px;
    padding-bottom: 13px;
}
h1{
    user-select: none;
    font-size: 2.5rem;
    font-weight: strong;
    line-height: 1.2;
    padding-left: 25px;
    color:#6e6e6e;
}
.button{
    text-decoration:none;
    color:#ffffff;
    background-color:#00FF7F;
    border:2px #00FF74 ;
    border-radius:5px;
    font-size:20px;
    font-family: 'Baloo Tammudu';
    padding:10px 15px;
    margin: 0px 20px;
}
.button:hover{
    text-decoration:none;
    color:#ffffff;
    background-color:#00FF7F;
    border:2px #00FF74 ;
    border-radius:5px;
    font-size:20px;
    font-family: 'Baloo Tammudu';
    padding:10px 15px;
    margin: 0px 20px;
    border:3px white solid ;
    
}
}
.size{
    color: #ffffff;
    padding : 10px ;
    margin : 10px 10px ;
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
tr{
 color: #bdb3b3;
 padding: 5px;
}
th{
    background-color:black;
}
</style>
<body>

<navbar  class="nav " > 
<div class="container-fluid">
<a href="index.php">
<img src="sparks.png"></a>
<div style ="float:right; padding:20px 0px ; color:#ffffff; " >
        <a class="size"  href="index.php"> Home</a>
        <a class="size"  href="customers.php"> Customers</li>
        <a class="size"  href="history.php"> History</a>
</div> </div>
</navbar>  
<br><br><br>
<br><div class="container"><h1>Transfer Money</h1></div><br>
<div class="container">
<?php
include 'connection.php';
$sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $row=mysqli_fetch_assoc($result);
?>
<form method="post" name="tcredit" class="tabletext" ><br>
<div class="row">
<div class="col-12 col-md-8 offset-md-2 offset-lg-2 ">
<table class="table table-responsive ml-xl-4">
<tr style="user-select: none; color:#6e6e6e">
    <th> Name </th>
    <th> Account No. </th>
    <th> Email</th>
    <th> Mobile No. </th>
    <th> Current Balance</th>
</tr>

<tr >
                    <td class="text-center" style="color:#bdb3b3;" ><?php echo $row['name'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;" ><?php echo $row['account_no'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;" ><?php echo $row['email'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;" ><?php echo $row['mobile_no'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;" ><?php echo $row['current_balance'] ?></td>
                </tr>
</table>
            </div></div></div>
<div class="container">
<div class="form-group">
    <div class="row">
    <div class="col-12 col-sm-6">
    
        <label class=" control-label col-6 col-sm-3 offset-3 offset-sm-4" style="color:#bdb3b3; font-size:17px;">Receiver</label>
        <div class="row">
        <select name="to" class="form-control col-6 offset-3 offset-sm-4" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <option class="table" value="<?php echo $row['id'];?>" >
                
                <?php echo $row['name'] ;?> (Balance:
                <?php echo $row['current_balance'] ;?> ) 
           
            </option>
        <?php 
            } 
        ?>
      
        </select>
        </div>
        </div>
        <div class="col-12 col-sm-6">
        <label class=" control-label col-6 col-sm-3 offset-3 offset-sm-2 mt-2 mt-sm-0"  style="  color:#bdb3b3; font-size:17px;">Amount</label>
            <div class="row">
        <input type="number" name="amount1" class="form-control col-6 offset-3 offset-sm-2" placeholder="Specify the Amount" >
					
        </div>
        </div></div>
    <div class="row"><button class="btn btn-success my-5 col-4 col-sm-2 offset-4 offset-sm-5 " name="submit" type="submit" id="mybtn">Transfer</button></div>
  </div>
        </div>
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