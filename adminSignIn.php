<?php
include("../navBar.php");
include_once("signInSQL.php");

$admins = getAdmins();
$error = "";

if (isset($_POST['submit']))
{
    for ($i = 0; $i < count($admins); $i++)
    {
        if ($_POST['username'] == $admins[$i]['Username'])
        {
            if ($_POST['password'] == $admins[$i]['Password'])
            {
                $_SESSION['userID'] = $admins[$i]['AdminID'];
                $_SESSION['name'] = $admins[$i]['FirstName']." ".$admins[$i]['LastName'];

                header('Location: ../adminPages/adminHome.php');
            }
            else
            {
                $error = "Email or password is incorrect.";
            }
        }
        else
        {
            $error = "Email or password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AZY - Admin Sign In</title>
        <link rel="stylesheet" href="/CSS/style2.css">
    </head>

    <body>
        <div>
            <h1 style="display: flex; justify-content: center; color: white;">Admin Sign In</h1>
        </div>
        <br><br><br><br>
        <div>
            <form method="post">
                <div class="form-group" style="display: flex; justify-content: center;">
                    <div>
                        <input class="form-control col-12" type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group" style="display: flex; justify-content: center;">
                    <div>
                        <input class="form-control col-12" type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <br><span class="text-danger" style="display: flex; justify-content: center;"><?php echo $error; ?></span><br>
                <div class="form-group" style="display: flex; justify-content: center;">
                    <input class="btn btn-primary" type="submit" value="Sign In" name="submit">
                </div>
            </form>
        </div>
    </body>
</html>

<?php
include("../footer.php");
?>