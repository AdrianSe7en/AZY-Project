<?php
include("../navBar.php");
include("../sessions.php");

/************SESSIONS************/
$path = "../SignInPages/adminSignIn.php";

if (!isset($_SESSION['name']))
{
    session_unset();
    session_destroy();
    header("Location: ".$path);
}
checkSession($path);
/********************************/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AZY - Admin Homepage</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <div class="col-8">
            <h1 style="display: flex; justify-content: start; color: white; margin: 0px 30px;">Dashboard</h1>
            <a style="display: flex; justify-content: start; color: white; font-size: 18px; margin: 0px 30px;">Welcome back <?php echo $_SESSION['name'] ?></a>
        </div>
    </body>
</html>

<?php
include("../footer.php");
?>