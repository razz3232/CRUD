<?php
include('./partials/connect.php');

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobile=$_POST['mobile'];

    $password_hash=password_hash($password, PASSWORD_DEFAULT);

    //if exist condition
    $sql="Select * from `crud` where username='$username' or email='$email' ";
    $selectresult=mysqli_query($con,$sql);
    $number=mysqli_num_rows($selectresult);

    if($number>0){
        echo "<script>alert('Email or username already exist')</script>";
    } else {

        $insert_query="insert into `crud` (username,email,password,mobile) values ('$username','$email','$password_hash','$mobile') ";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "Data inserted successfully";
            echo "<script>window.open('display.php','_self')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>

    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <!-- username field -->
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="username" autocomplete="off" placeholder="enter your username" required>
            </div>

            <!-- email -->
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off" placeholder="enter your email" required>
            </div>

            <!--password-->
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" autocomplete="off" placeholder="enter your password" required>
            </div>

            <!--mobile-->
            <div class="form-group mb-3">
                <label for="">Mobile</label>
                <input type="text" class="form-control" name="mobile" autocomplete="off" placeholder="enter your mobile number" required min="11" maxlength="11">
            </div>
            <button class="btn btn-dark" type="submit" name="submit">Add Details</button>
        </form>
    </div>

    
</body>
</html>
