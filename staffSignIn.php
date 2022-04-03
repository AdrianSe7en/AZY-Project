<?php
include("../navBar.php");
include_once("signInSQL.php");

$staff = getStaff();
$error = "";

if (isset($_POST['submit']))
{
    for ($i = 0; $i < count($staff); $i++)
    {
        if ($_POST['username'] == $staff[$i]['Username'])
        {
            if ($_POST['password'] == $staff[$i]['Password'])
            {
                $_SESSION['userID'] = $staff[$i]['StaffID'];
                $_SESSION['name'] = $staff[$i]['FirstName']." ".$staff[$i]['LastName'];

                header('Location: ../StaffPages/staffHome.php');
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
        <title>AZY - Staff Sign In</title>
        <link rel="stylesheet" href="/CSS/style2.css">
    </head>

    <body>
        <div>
            <h1 style="display: flex; justify-content: center; color: white;">Staff Sign In</h1>
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