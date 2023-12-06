<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../naistam/imgs/logo.png">
    <style>
        *,
    *:before,
    *:after{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        background-color:bisque;
        background-image: url(../naistam/imgs/img8.jpg);
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
        width: 1500px;
    }
    .mg{
        text-align: center;
    }
    </style>
<?php
     
       
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "SBAV";
        $con = mysqli_connect($host, $username, $password, $dbname);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "SELECT * FROM sales WHERE 1";
    $result_sales = $con->query($sql);
   

$con->close();?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href);
}
</script>
</head>


<body>
<div class="pos1"><img src="../naistam/imgs/logo.png"></div>
<h1 class='pos2'>TOTAL STOCK BOOKED</h1></div> <br><br><br>

<div class="container" id="container">
        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th style="background: none;font-size: 25px;">Serial number</th>
                    <th style="background: none;font-size: 25px;">Customer name</th>
                    <th style="background: none;font-size: 25px;">Customer Mobile Number</th>
                    <th style="background: none;font-size: 25px;">Item Purchased</th>
                    <th style="background: none;font-size: 25px;">Quantity</th>
                    <th style="background: none;font-size: 25px;">Cost</th>
                    <th style="background: none;font-size: 25px;">Date and Time</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                while($rows=$result_sales->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["sno"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["name"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["mobilenum"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["itemPurchased"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["qty"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["cost"];?></td>
                                <td style="background: none;font-size: 25px;"><?php echo $rows["tdate"];?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tr>
            </tbody>

        </table>
</div>
<div class="mg">
<button style="width:160px; background: none;"><a href="logs.php" style="color:black; text-decoration:none; font-size:larger">Logout</a></button>
</div>
</body>
</html>