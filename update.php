<?php 
include('./partials/connect.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    $select_query="Select * from `crud` where id='$uid'";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $userdisplay=$row['username'];
    $emaildisplay=$row['email'];
    $mobiledisplay=$row['mobile'];
    
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        $update_query="update `crud` set username='$username', email='$email', mobile='$mobile'
        where id='$uid'";
        $result_query=mysqli_query($con,$update_query);
        if($result_query){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('display.php','_self')</script>";
        } else{
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
    <title>PHP CRUD updating data</title>

    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <!-- username field -->
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="username" value="<?php echo $userdisplay?>" autocomplete="off" placeholder="enter your username" required>
            </div>

            <!-- email -->
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $emaildisplay?>" autocomplete="off" placeholder="enter your email" required>
            </div>

            <!--mobile-->
            <div class="form-group mb-3">
                <label for="">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobiledisplay?>" autocomplete="off" placeholder="enter your mobile number" required min="11" maxlength="11">
            </div>
            <button class="btn btn-dark" type="submit" name="update">Update</button>
        </form>
    </div>

    
</body>
</html>