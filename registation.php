<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            background-image: url(./imgs/img8.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container {

            width: 600px;
            height: 500px;
            margin:0 auto;
            padding: 100px;
            background-color: #a7d7f2;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type='passward']
        {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        input[type="submit"] {
            background-color:#5cbcf2;
            color: black;
            padding: 10px 20px; 
            border: black 2px solid;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #8eecf5;
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
     if ($con->connect_error)
     {
         die("Connection failed: " . $con->connect_error);
     }

     if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        if (isset($_POST['name'],$_POST['mobilenum'], $_POST['email'],$_POST['passward'], $_POST['city/village'], $_POST['pincode']))
        {
            $name_n= $_POST['name'];
            $mobilenum_m= $_POST['mobilenum'];
            $email_e= $_POST['email'];
            $passward_p=$_POST['passward'];
            $c_v= $_POST['city/village'];
            $pincode_p= $_POST['pincode'];
        }
     if(isset($_POST['buyre11']))
     {
        $buyer_in="INSERT INTO buyers (sname,mobilenum,email,password,city,pincode) VALUES ('$name_n','$mobilenum_m','$email_e','$passward_p','$c_v','$pincode_p');";
        $buyers_res=$con->query($buyer_in);
        echo '<script>alert("Registered as buyer Succesfully");</script>';
     }
     if(isset($_POST['seller11']))
     {
        $seller_in="INSERT INTO sellers (sname,mobilenum,email, password,village,pincode) VALUES ('$name_n','$mobilenum_m','$email_e','$passward_p','$c_v','$pincode_p');";
        $seller_res=$con->query($seller_in);
        echo '<script>alert("Registered as seller Succesfully")</script>';
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
    <div class="container">
        <center><h2>Registration Form</h2></center>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input style="background-color:#72d7e0;" type="text" name="name" autocapitalize="off" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="mobilenum">Mobile:</label>
                <input style="background-color:#72d7e0;" type="number" name="mobilenum" autocapitalize="off" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input style="background-color:#72d7e0;" type="email" name="email" autocapitalize="off" placeholder="Enter your email id" required>
            </div>
            <div class="form-group">
                <label for="passward">passward:</label>
                <input style="background-color:#72d7e0;" type="passward" name="passward" autocapitalize="off" placeholder="Enter your passward" required>
            </div>
            <div class="form-group">
                <label for="city/village">City/Village:</label>
                <input style="background-color:#72d7e0;" type="text"  name="city/village" autocapitalize="off" placeholder="Enter your city/villahe" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input style="background-color:#72d7e0;" type="number" name="pincode" autocapitalize="off" placeholder="Enter your pincode" required>
            </div>
            <div class="form-group">
                <input style="position: fixed; left:600px;" type="submit" name="buyre11" value="Register as buyer">
                <input style="position: fixed; left:800px;" type="submit" name="seller11" value="Register as seller">
            </div>
        </form>
    </div>
    <div class="mg">
<button style="width:160px; background: none;"><a href="logs.php" style="color:black; text-decoration:none; font-size:larger">Logout</a></button>
</div>
</body>
</html>
