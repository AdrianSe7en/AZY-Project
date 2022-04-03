<?php
session_start();
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

$requests = GetRequests();
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AZY - Staff Homepage</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet">

        <!-- external links -->
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/style2.css">
    </head>

    <body>
    <section id="dashBoardNavAndSideBarWithContents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 navSideBar" style="background-color: white;">
                    <h3 class="menuTitle text-center">Menu</h3>
                    <hr>
                    <div class="sideNavLinks mt-5">
                        <div class="list-group">
                            <a href="#" class="list-group-item activeLink"> <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                            <a href="#" class="list-group-item"> <i class="fas fa-heart"></i>
                                <p>Saved</p>
                            </a>
                            <a href="#" class="list-group-item"> <i class="far fa-copy"></i>
                                <p>Reports</p>
                            </a>
                            <a href="#" class="list-group-item"> <i class="fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </div>
                    </div>
                    <p class="logOut">
                        <a href="../logout.php"><i class="fas fa-user"></i> Log out</a>
                    </p>

                </div>
                <div class="col-md-10 ContentsWithNavbar">
                    <div class="dashboardNavBar">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 notificationOrderInMobile">
                                <div class="timeAndNotification d-flex align-items-center justify-content-end">
                                    <div class="timeCtrl me-5">
                                        <h3 class="time" id="time"></h3>
                                        <p class="date"><?php echo strftime("%a, %d %B %Y") ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboardMain">
                        <p class="welcomeTxt ps-5">Welcome back, <span><?php echo $_SESSION['name']; ?></span> </p>
                        <div class="toatlReports">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="normalReports">
                                        <p class="reportsTitle">
                                            Your requests <span class="reportCount"><?php echo count($requests); ?></span>
                                        </p>
                                        <ul class="list-unstyled problemList">
                                            <?php for ($i = 0; $i < count($requests); $i++): ?>
                                                <li>
                                                    <p><span class="subject">Subject:</span> <span class="problem"><?php echo substr($requests[$i][5], 0, 70); ?></span></p>
                                                </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 technicalSupport ps-md-0">
                                    <div class="normalReports h-100">
                                        <p class="reportsTitle text-center">
                                            Having an issue?
                                        </p>
                                        <div class="emptyTxt">Contact Support</div>
                                        <ul class="list-unstyled problemList text-center">
                                            <li>
                                                <p><span class="subject"><a href="contactUs.php">Create a request</a></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
        <script>
            var dt = new Date();
            document.getElementById("time").innerHTML = (("0"+dt.getHours()).slice(-2)) + ":" + (("0"+dt.getMinutes()).slice(-2));
        </script>
    </body>
</html>