<?php

$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    //pass query insert
    // $sql= "insert into `registration` (username,password)
    // values('$username','$password')";
    // $result= mysqli_query($con,$sql);

    // if($result){
    //     echo "Data inserted successfully";
    // }else{
    //     die(mysqli_error($con));
    // }

    $sql="select * from `registration` where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo 'USer already exist';
            $user=1;
        }else{
           $sql= "insert into `registration` (username,password)
    values('$username','$password')";
    $result= mysqli_query($con,$sql);
    if($result){
        // echo "Signup successfull";
        $success=1;
        header('location:login.php');
    }else{
        die(mysqli_error($con));
    } 
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh no Sorry </strong> User Already Exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    <?php
if($success){
    echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
  <strong>Sucess </strong> You have successfully Sign Up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    <h1 class="text-center">SignUp Page</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="form-group">
                <label for="eampleInputEmailID">Name</label>
                <input type="text" class="form-control" Placeholder="Enter Your username" name="username">
            </div>
            <div class="form-group">
                <label for="eampleInputEmailID">Password</label>
                <input type="password" class="form-control" Placeholder="Enter Your password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-5">Sign Up</button>
        </form>
    </div>
</body>

</html>