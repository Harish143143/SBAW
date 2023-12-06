<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBAV</title>
    <link rel="icon" type="image/png" href="../naistam/imgs/output-onlinegiftools.gif">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "sbav"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $table = "";

    if (isset($_POST["radio"])) {
        $table = $_POST["radio"];

        
       

        
            $stmt = "SELECT * FROM `$table` WHERE `sname` = '$username';";
            
            $result = mysqli_query($conn, $stmt);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($password == $row["password"]) {
                    echo '<script>alert("Login successful")</script>';
                    if ($table == "buyers") {
                        echo '<script>window.location.href = "buyer.php"</script>';
                    } elseif ($table == "sellers") {
                        echo '<script>window.location.href = "seller.php"</script>';
                    }
                } else {
                    echo '<script>alert("Login failed. Invalid password")</script>';
                }
            } else {
                echo '<script>alert("Login failed. User not found.")</script>';
            }

            
        
    }

    $conn->close();
}
?>

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
    background-image: url(../naistam/imgs/img2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Bebas Neue', sans-serif;
}

form{
    height: 440px;
    width: 500px;
    border-radius: 50px;
    backdrop-filter: blur(0px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 20px 35px;
    top: 30px;
}
form *{
    font-family: 'poppins', sans-serif;
    
    
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    color: #8B0000;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 24px;
    font-weight: 300;
}
::placeholder{
    color: black;
    opacity: 1;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #8B0000;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
  background-color:  lightgray;
  color: #e5e5e5;
  
}
.column-left{flex: 75%;
    padding: 16px;
  
   
    
}
.column-left img{
    width: 80%;

}
    .column-right{
        flex:25%;
        padding: 100px 50px;
    }
    .forms{
        flex: 50%;
    }
    .mainpage{
    display: flex;
    height: 80vh;
    
}
.container-fluid img {
  width: 180px;
  margin-left: 35%;
}
.navbar{
  
  background-color: #f7a923;
  height: 100px;
}
.border1{
    background-color: #8B0000;
    height: 8px;
}
.container-fluid  .krishna{
    width: 250px;
    margin-left: 0%;
}
.container thead th {
  position: sticky;
  top: 0px;
}
table {
  border-collapse: collapse;
  top: 0;
  
}
th,
td {
  padding: 5px 10px;
  
 }
th {
        background:#eee;
        
}
.title1 {
    
    color: black;
    padding: 20px;
    
    left: 30px;
    
    font-size: 20px;
}
a {
    size: 20px;
}
.maincontainer{
display: flex;
margin-top: 100px;
}
h1{
    font-family: 'Bebas Neue', sans-serif;
    font-size: 70px;

}
.gg{
    position: fixed;
    top:-30px;
    right:15px;
}

input[type=radio]{
    
    border: 0px;
    width: 100%;
    height: 1rem;
}

</style>

</head>
<body>

<center><h1 style="color:green; text-shadow: 0 0 3px #e3bf0b, 0 0 5px #e3bf0b; letter-spacing:3.5px;">SUSTAINABLE BIO MASS AND WASTAGE</h1>
    <h2 style="color:lightred; text-shadow: 0 0 3px #e3bf0b, 0 0 5px #e3bf0b; letter-spacing:3.5px;">Plastic-Iron-Husk</h2></center></div>
    <center> 
    <div class="rightcontainer">
            <form method="post" id="loginForm">

                <img src="./imgs/output-onlinegiftools.gif" style="height:100px; width: 120px; top:0px;">
                <div style="display: inline-block;">
                <input type="radio" name="radio" value="buyers" checked>Buyer
                <input type="radio" name="radio" value="sellers">Seller</div>
                <input style="border: 2px solid black;" type="text" name="username" autocomplete="off" placeholder="Username" required> <br>
                <input style="border: 2px solid black; margin-top:0px;"  type="password" name="password" autocomplete="off" placeholder="Password" required><br>
                <button style="border: 2px solid black; margin-top:0px; width: 160px;" type="submit" value="Login"  >Login</button><br>
                <h3 style="font-size: 18px; color:black">Didn't have acount Signin now!</h3>
            </form>
            </center>
        </div>
        <a href=registation.php><button style="border:2px solid black;width:160px;position:fixed;left:690px;bottom:190px;" type="submit" value="Signin">Signin</button></a>

            
        
<div class="gg">
<button style="width:160px; background: none;"><a href="about.html" style="color:black; text-decoration:none; font-size:larger;">About us</a></button>
</div>
</body>
</html>