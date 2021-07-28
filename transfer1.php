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
   else if(($amount1) > $row1['Current_Balance']) 
    {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
     else if($amount1 == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }
else {
        $newbalance = $row1['Current_Balance'] - $amount1;
        $sql = "UPDATE customers set Current_Balance=$newbalance where id=$send";
        mysqli_query($con,$sql);
        $newbalance = $row2['Current_Balance'] + $amount1;
        $sql = "UPDATE customers set Current_Balance=$newbalance where id=$rec";
        mysqli_query($con,$sql);
                
                $sender = $row1['Name'];
                $receiver = $row2['Name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount1')";
                $query=mysqli_query($con,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount1 =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Home</title>
</head>
<style>
body{
    background-color:#008080;
}
.size{
    padding : 10px ;
    margin : 10px 10px ; 
}
.color{
    background-color:	#5F9EA0;
    border-radius:15px;   
    width:100%;
}
.title{
    padding-left: 35px ;
    font-family: 'Baloo Tammudu 2', cursive;
    padding-top:15px ;
    color:	#FFFF00; 
    font-size:35px ; 
    font-weight:bold;
}
.button{
    text-decoration:none;
    color:#5F9EA0;
    background-color:#FFFF00;
    border:2px solid #5F9EA0;
    border-radius:5px;
    font-size:20px;
    font-family: 'Baloo Tammudu';
    padding: 15px;
}
.button:hover{
    background-color:#5F9EA0;
    border:4px solid #FFFF00 ;
}
.containersss{
    margin:0% 5%;
}
</style>
<body>

<navbar  class="navbar navbar-inverse navbar-fixed-bottom " > 
<div class="color"> <p class="title" >The Bank of Spark </p> 
<div style ="float:right; padding:20px 0px ; color:#ffffff; " >
        <a class="size" style="color:#ffffff;" href="index.php"> Home</a>
        <a class="size" style="color:#ffffff;" href="customers.php"> Customers</li>
        <a class="size" style="color:#ffffff;" href="history.php"> History</a>
</div> </div>
</navbar>
<center><h1 style="color:#ffffff;"> Personal Details </h1></center> <br> <br>
<div class="containersss">

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
<table class="table ">
<tr>
    <th class="text-center"> Name </th>
    <th class="text-center"> Account No. </th>
    <th class="text-center"> Email</th>
    <th class="text-center"> Mobile No. </th>
    <th class="text-center"> Current Balance</th>
</tr>

<tr>
                    <td class="text-center" style="color:#bdb3b3;"><?php echo $row['Name'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;"><?php echo $row['Account_No'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;"><?php echo $row['Email'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;"><?php echo $row['Mobile_No'] ?></td>
                    <td class="text-center" style="color:#bdb3b3;"><?php echo $row['Current_Balance'] ?></td>
                </tr>

</table>
</div> 
<br><br><br>
                <div class="form-group">
        <label class="col-sm-2 control-label" style="color:#bdb3b3; font-size:17px; width:13%; padding-top:5px;">Recepient</label>
        <div class="col-sm-4">
        <select name="to" class="form-control" required>
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
                
                <?php echo $row['Name'] ;?> (Balance: 
                <?php echo $row['Current_Balance'] ;?> ) 
           
            </option>
        <?php 
            } 
        ?>
      
        </select>
        </div>
        </div>
        <label class="col-sm-2 control-label"  style=" margin-bottom:20px; margin-top:-15px; color:#bdb3b3; font-size:17px; width:13%; padding-top:5px;">Amount</label>
					<div class="col-sm-4" style=" margin-top:-15px;">
						<input type="number" name="amount1" class="form-control" placeholder="Enter the Amount" >
					</div>
                    <div id="buttons" class="container">
  
    <button class="btn btn-2" name="submit" type="submit" id="mybtn">Transfer</button></a>
  </div>
  </div>

</body>
</html>