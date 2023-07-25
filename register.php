<?php
include './config.php';


if(isset($_POST['submit'])){


    //  $username = mysqli_real_escape_string($conn,$_POST['username']);

    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $passw=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type=$_POST['user_type'];


    $select = "SELECT * FROM user WHERE email='$email' && password='$passw' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){
        $error[]='user already exit';
    }else{
        if($passw != $cpass){
            $error[]='Password not match';   
        }else{
            $insert = "INSERT INTO user(name, email,password,user_type)VALUES('$name','$email','$passw',' $user_type')";
            mysqli_query($conn,$insert);
            header('location:login.php');
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
   <form action="" method="POST">
    <h3>Register Now</h3>
    <?php
if(isset($error))
{
foreach ($error as $error) {
    # code...
    echo '<span class="error-msg">.$error.</span>';
};

};
    ?>
    <input type="text" name="name" required placeholder="enter your name">
    <input type="email" name="email" required placeholder="enter your email">
    <input type="password" name="password" required placeholder="enter your password">
    <input type="password" name="cpassword" required placeholder="confirm your password">
    <select name="user_type">
        <option value="user">user</option>
        <option value="admin">admin</option>
    </select>

    <input type="submit" name="submit" value ="Register Now" class="form-btn">
    <P>Already have  account? <a href="login.php">LOGIN </a></P>
   </form>
</div>
</body>
</html>