<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from `registration` where username='$username' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        }else{
            $invalid=1;
        }
    }
           
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success </strong> You are Successfully Login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

    <?php
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error </strong> Invalid Credientials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

    <h1 class="text-center">Login to our Website page</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="eampleInputEmailID">Name</label>
                <input type="text" class="form-control" Placeholder="Enter Your username" name="username">
            </div>
            <div class="form-group">
                <label for="eampleInputEmailID">Password</label>
                <input type="password" class="form-control" Placeholder="Enter Your password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-5">Login</button>
        </form>
    </div>
</body>

</html>