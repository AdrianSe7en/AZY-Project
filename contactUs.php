<?php
include("../navBar.php");
include("../sessions.php");
include_once("staffSQL.php");

/************SESSIONS************/
$path = "../SignInPages/staffSignIn.php";

if (!isset($_SESSION['name']))
{
    session_unset();
    session_destroy();
    header("Location: ".$path);
}
checkSession($path);
/********************************/

$error = "";
$done = true;

if (isset($_POST['submit']))
{
    if ($_POST['desc'] == null)
    {
        $error = "Please fill in all fields";
        $done = false;
    }

    if ($done)
    {
        CreateRequest();
        header('Location: staffHome.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <title>AZY - Contact Us</title>

    <!-- extarnal links -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/style2.css">
</head>

<body>
    <section id="contactUs">
        <div class="container-fluid">
            <h2 class="sectionTitle text-center">Create A Request</h2>
            <div class="contactUsFormCtrl">
                <div class="row">
                    <div class="col-md-2 pe-md-0 h-100">
                        <div class="contactType d-flex align-items-center">
                            <div class="spanceCtrl w-100">
                                <div class="contactCatOne">
                                    <div class="form-check d-flex align-items-center justify-content-between">
                                        <!-- <p> -->
                                        <label class="form-check-label" for="categori1">
                                            Staff Contact
                                        </label>
                                        <!-- </p> -->
                                        <input class="form-check-input" name="customer" type="radio" id="categori1">
                                      </div>
                                </div>
                                <div class=" contactCatOne">
                                        <div class="form-check d-flex align-items-center justify-content-between">
                                            <!-- <p> -->
                                            <label class="form-check-label" for="categori2">
                                                Customer Contact
                                            </label>
                                            <!-- </p> -->
                                            <input class="form-check-input" name="customer" type="radio" id="categori2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 ps-md-0">
                            <form method="post" class="contactFormHandle handleFromSite">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="type" class="form-label">Request Type</label><br>
                                            <select id="type" name="type" style="font-size: 18px;">
                                                <option value="Password Reset">Password Reset</option>
                                                <option value="Access Control">Access Control</option>
                                                <option value="Procurement">Procurement</option>
                                                <option value="Standard Services">Standard Services</option>
                                                <option value="Non-Standard Services">Non-Standard Services</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="fname" class="form-label">Location</label><br>
                                            <select id="location" name="location" style="font-size: 18px">
                                                <option value="Building A">Building A</option>
                                                <option value="Building B">Building B</option>
                                                <option value="Building C">Building C</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <label for="help" class="form-label">Description</label>
                                            <textarea class="form-control" id="help" name="desc" rows="5"></textarea>
                                        </div>
                                        <div class="sendBtn text-end">
                                            <button type="submit" class="btn" name="submit">Submit Request</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5857fbd9b0.js" crossorigin="anonymous"></script>
    <script src="js/chart.js"></script>
    <script src="js/chart1.js"></script>
    <script src="js/chart2.js"></script>
    <script src="js/chart3.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>