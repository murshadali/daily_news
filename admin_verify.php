<?php
include 'config.php';
session_start();
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query="select *from admin where username ='$username' and password = '$password';";
    $result = mysqli_query($conn,$query);
    if(!$result)
    {
        die('query is wrong');
    }
    $rows = mysqli_num_rows($result);
    if($rows>0)
    {
        $_SESSION['username']=$username;
        $_SESSION['password']= $password;
     header('location: admin_panel.php');
    }
    else{
        echo "<script>alert('does not exist')</script>";
    
    }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin verify</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background:linear-gradient(35deg, palevioletred, powderblue)
        }
    .container{
        display: flex;
        width: 50vh;
        height: 60vh;
        border: 2px solid black;
        flex-direction: column;
        align-content: space-around;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }
    #password{
        border-radius: 3px;
    }
    #username{
        border-radius: 3px;
    }
    .sub-container3{
        display:flex;
        width:100% ;
        justify-content:space-around;
       
    }
   #password {
        align-self: flex-end;
    }
    </style>
</head>
<body>
    <form action="admin_verify.php" method="post">
        <div class="container">
            <h2>Login as Admin</h2>
            <div class ="sub-container1">
              username:
        <input type="text" name="username" id="username" required>
        </div>
        <div class ="sub-container2">
        <label for="password">password:</label>
        <input type="password" name ="password" id = "password" required>
        </div>
        <div class="sub-container3">
            <input type="reset" nam="reset" value="Reset">
            <input type="submit" name="submit">
            
        </div>
        </div>
    </form>
</body>
</html>