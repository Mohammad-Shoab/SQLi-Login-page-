<?php
ob_start();
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            require_once "database.php";
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
              $_SESSION["user"] = "yes";
              header("Location: index.php");
              exit();
            } 
            echo "<div class='alert alert-danger'>Username or Password does not match</div>";
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="username" placeholder="Enter Username:" name="username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
<?php ob_end_flush(); ?>
