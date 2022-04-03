<?php
include("../sessions.php");
include_once("adminSQL.php");
session_start();

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

$request = GetRequest();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AZY - Admin Homepage</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <title>Dashboard</title>

    <!-- external links -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

    <section id="dashBoardNavAndSideBarWithContents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 navSideBar">
                    <h3 class="menuTitle text-center">Menu</h3>
                    <hr>
                    <div class="sideNavLinks mt-5">
                        <div class="list-group">
                            <a href="adminHome.php" class="list-group-item"> <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                            <a href="allRequests.php" class="list-group-item activeLink"> <i class="far fa-copy"></i>
                                <p>Requests</p>
                            </a>
                            <a href="allReports.php" class="list-group-item"> <i class="far fa-copy"></i>
                                <p>Reports</p>
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
                        <h2 class="sectionTitle ps-5">Request <?php echo $_GET['id']; ?></h2>
                        <div class="toatlReports">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="normalReports" style="font-size: 20px;">
                                        <pre>Submitted by: <?php echo $request[0][2]; ?>           ID: <?php echo $request[0][1]; ?></pre>
                                        <pre>Request type: <?php echo $request[0][3]; ?>           Location: <?php echo $request[0][4]; ?></pre>
                                        <br>
                                        <label for="desc">Description:</label><br>
                                        <textarea id="desc" style="resize: none;" disabled cols=30 rows=5><?php echo $request[0][5]; ?></textarea>
                                        <p>Time submitted: <?php echo $request[0][6]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5857fbd9b0.js" crossorigin="anonymous"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/chart1.js"></script>
    <script src="../js/chart2.js"></script>
    <script src="../js/chart3.js"></script>
    <script>
        var dt = new Date();
        document.getElementById("time").innerHTML = (("0"+dt.getHours()).slice(-2)) + ":" + (("0"+dt.getMinutes()).slice(-2));
    </script>
</body>

</html>