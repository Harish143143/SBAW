<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Hub</title>
    <link rel="icon" type="image/png" href="../naistam/imgs/output-onlinegiftools.gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
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
        background-image: url(../naistam/imgs/img1.png);
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
    .npag {
       position: fixed;
       right: 670px;
       bottom: 2px;
    }
  
    .mg {
        position: fixed;
       left: 500px;
       bottom: 2px;
    }
    .mgmg {
        position: fixed;
       right: 460px;
       bottom: 2px;
    }
    .npag:hover{
        background-color: green;
    }
    .mg:hover{
        background-color: green;
    }
    .mgmg:hover{
        background-color: green;
    }
    </style>
<?php
     
       
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "SBAV";

        // creating a connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
 $sql = "SELECT * FROM stock WHERE 1";
 $result = $con->query($sql);



    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value=$_POST['updatevalue'];
        if (isset($_POST['itemtype'])) {
            $itemtype = $_POST['itemtype'];
            if (isset($_POST['updateattr'])) {
                $updateattr = $_POST['updateattr'];
                $sql = "UPDATE stock SET $updateattr=$value WHERE item='$itemtype'";
                
                $rs = mysqli_query($con,$sql);
                if($rs){
                    echo '<script>alert("Updated successfully");</script>';
                }
            
            }
            
        } 
    }
    


    $sql = "SELECT * FROM stock WHERE 1";
    $result = $con->query($sql);
   

$con->close();?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href);
}
</script>
 
</head>
<body>
<div class="pos1"><img src="../naistam/imgs/logo.png"></div>
<h1 class='pos2' style="font-family: 'Bebas Neue', sans-serif;">WELCOME BACK SELLER</h1></div> <br><br><br>
<div class="container" id="container">
        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th style="background: none;font-size: 25px;">Serial Number</th>
                    <th style="background: none;font-size: 25px;">Item Type</th>
                    <th style="background: none;font-size: 25px;">Quantity in KG</th>
                    <th style="background: none; font-size: 25px;">Cost in Kg</th>

                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr >
                                    <td style="background: none;font-size: 20px;"><?php echo $rows["sno"];?></td>
                                <td style="background: none;font-size: 20px;"><?php echo $rows["item"];?></td>
                                <td style="background: none;font-size: 20px;"><?php echo $rows["qty"];?></td>
                                <td style="background: none;font-size: 20px;"><?php echo $rows["cost"];?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tr>
            </tbody>

        </table>
</div>
<div class='pss'>
<form method="POST" action="seller.php">
<select name='itemtype'>
    <option value="plastic">Plastic</option>
    <option value="iron">Iron</option>
    <option value="Husk">Husk</option>
</select>
<select name='updateattr'>
    <option value="qty">Quantity</option>
    <option value="cost">Cost</option>
</select>
    <input type="number" name="updatevalue" autocomplete="off" placeholder="Enter new Data" required>
    <input type="submit" value="update" name="submitupdate1" required>
</form>
</div>
<br><br>

<div class="npag">
<button style="width:160px; background: none;"><a href="mysales.php" style="color:black; text-decoration:none; font-size:larger;">My Sales</a></button>
</div>
<div class="mg">
<button style="width:160px; background: none;"><a href="about.html" style="color:black; text-decoration:none; font-size:larger;">About us</a></button>
</div>
<div class="mgmg">
<button style="width:160px; background: none;"><a href="logs.php" style="color:black; text-decoration:none; font-size:larger;">Logout</a></button>
</div>
</body>
</html>