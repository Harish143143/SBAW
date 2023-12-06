<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Hub</title>
    <link rel="icon" type="image/png" href="../naistam/imgs/output-onlinegiftools.gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    *,
    *:before,
    *:after{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        background-color: whitesmoke;
        background-image: url(../naistam/imgs/img4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .pos2 {
        text-align: center;
        font-size: 60px;
    }
    .pos1 {
        width: 500px;
        height: 50px;
        display:flexbox;
        align-items: center;
    }
    .container {
        text-align: center;
        
        width: 1300px;
    }
    .pss{
        width: 800px;
        text-align: right;
    }
    .mg {
        position: fixed;
       left: 720px;
       bottom: 2px;
    }
    .mgm {
        position: fixed;
       left: 528px;
       bottom: 2px;
    }
    .money {
        text-align: center;
        color: black;
    }
    .mg:hover{
        background-color: green;
    }
    .mgm:hover{
        background-color: green;
    }

    </style>
<?php
     
       
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sbav";

        // creating a connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
 $sql = "SELECT * FROM stock WHERE 1";
 $result = $con->query($sql);
 $Tcost=0;
 $lim=0;

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['itemtype'])) 
        {
            $itemtype = $_POST['itemtype'];
            $sql = "SELECT qty from stock where item='$itemtype'";
            $rs1 = mysqli_query($con,$sql);
            while($rows=$rs1->fetch_assoc())
            {   $qty= $rows['qty'];}
            $value=$_POST['updatevalue'];
            if($value<=$qty)
            {
                $new=$qty-$value;
                $sql = "UPDATE stock SET qty=$new WHERE item='$itemtype'";
                $rs = mysqli_query($con,$sql);
                $sql2 = "SELECT cost FROM stock WHERE item='$itemtype'";
                $result2 = mysqli_query($con,$sql2);
                while($rows=$result2->fetch_assoc())
                {
                $Tcost=intval($rows['cost'])*$value;
                }
            }
            if($value==0)
            {
                echo '<script>alert("Enter more than 1 Qty");</script>';
            }
            if($value > $qty)
            {
                echo '<script>alert("Stock limit execeeded");</script>';
                $lim=1;
            }
            if($value < $qty && $value!=0)
            {
                echo '<script>alert("Stock Booked Successfully");</script>';
            }
        }
    }
    


    $sql = "SELECT * FROM stock WHERE 1";
    $result = $con->query($sql);

    if (isset($_POST['submitupdate'])) 
    {
        $mn=$_POST['mobilenum'];
        $name=$_POST['cname'];
        if($lim!=1 && $value!=0)
        {
        $sin="INSERT into sales (name,mobilenum,itemPurchased,qty,cost) values('$name','$mn','$itemtype','$value','$Tcost');";
        $st = $con->query($sin);
        }

    }
$con->close();?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
 
</head>
<body>

<div class="pos1"><img src="../naistam/imgs/logo.png"></div>
<h1 class='pos2'>WELCOME BACK CUSTOMER</h1></div> <br><br><br>


<div class="container" id="container">
        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th style="background: none;font-size: 25px;">Serial Number</th>
                    <th style="background: none;font-size: 25px;">Item Type</th>
                    <th style="background: none;font-size: 25px;">Quantity in KG</th>
                    <th style="background: none;font-size: 25px;">Cost in KG</th>

                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["sno"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["item"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["qty"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["cost"];?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tr>
            </tbody>

        </table>
</div>
<div class='pss'>
<form method="post" action="buyer.php">
<select name='itemtype'>
    <option value="plastic">Plastic</option>
    <option value="iron">Iron</option>
    <option value="Husk">Husk</option>
</select>
    <input type="number" name="updatevalue" autocomplete="off" placeholder="Enter Quantity" required>
    <input type="text" name="cname" autocomplete="off" placeholder="Enter your name" required>
    <input type="number" name="mobilenum" autocomplete="off" placeholder="Enter your mobile num" required>
    <input type="submit" value="Book" name="submitupdate">
</form></div>
<h1 class='money'><?php
if($Tcost>0)
echo "Total cost = ".$Tcost;
?></h1>
<div class="mg">
<button style="width:160px; background: none;"><a href="logs.php" style="color:black; text-decoration:none; font-size:larger;">Logout</a></button>
</div>
<div class="mgm">
<button style="width:160px; background: none;"><a href="about.html" style="color:black; text-decoration:none; font-size:larger;">About us</a></button>
</div>
</body>
</html>