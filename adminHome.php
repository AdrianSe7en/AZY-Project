<?php
include "../sessions.php";
include_once "adminSQL.php";
session_start();

/************SESSIONS************/
$path = "../SignInPages/adminSignIn.php";

if (!isset($_SESSION['name'])) {
    session_unset();
    session_destroy();
    header("Location: " . $path);
}
checkSession($path);
/********************************/

$requests = GetRequests();
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


<!-- success modal after submit form -->

  <!-- Modal -->
  <div class="modal fade succssModal" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body">
         <h3 class="modalWarningTitle">
            Report has been logged successfully, <br>
            You will be contact by an Admin within 24 hours.
         </h3>

         <div class="checkImgCtrl text-center py-5">
             <img src="../images/check.png" alt="check" class="img-fluid">
         </div>
         <div class="homeBtnOnMOdal text-center pt-5">
            <a href="#" class="homeBtn btn btn-light">Home</a>
         </div>
        </div>

      </div>
    </div>
  </div>

    <section id="dashBoardNavAndSideBarWithContents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 navSideBar">
                    <h3 class="menuTitle text-center">Menu</h3>
                    <hr>
                    <div class="sideNavLinks mt-5">
                        <div class="list-group">
                            <a href="adminHome.php" class="list-group-item activeLink"> <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                            <a href="allRequests.php" class="list-group-item"> <i class="far fa-copy"></i>
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


                    <div class="contactModalController">

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-body">
            <h2 class="sectionTitle text-center ">Contact Us</h2>
            <div class="contactUsFormCtrl">
                <div class="row">
                    <div class="col-md-4 pe-md-0 h-100">
                        <div class="contactType d-flex align-items-center">
                            <div class="spanceCtrl w-100">
                                <div class="contactCatOne">
                                    <div class="form-check d-flex align-items-center justify-content-between">
                                        <!-- <p> -->
                                        <label class="form-check-label" for="categori1">
                                            Staff Contact
                                        </label>
                                        <!-- </p> -->
                                        <input class="form-check-input" name="customer" type="radio" id="categori1"">
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
                        <div class="col-md-8 ps-md-0">
                            <form action="#" class="contactFormHandle handleFromSite">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-5">
                                            <label for="fname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname">
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
                                            <label for="help" class="form-label">How can we help?</label>
                                            <textarea class="form-control" id="help" rows="5"></textarea>
                                        </div>
                                        <div class="sendBtn text-end">
                                        <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#successModal">Send
                                                                                Form</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
                        </div>



                        <h2 class="sectionTitle ps-5">Dashboard</h2>
                        <p class="welcomeTxt ps-5">Welcome back, <span><?php echo $_SESSION['name']; ?></span> </p>
                        <p class="creatNewReport text-end">
                            <a href="#" class="btn creatNewReportBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Report</a>
                        </p>
                        <div class="toatlReports">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="normalReports">
                                        <p class="reportsTitle">
                                            Requests <span class="reportCount"><?php echo count($requests); ?></span>
                                        </p>
                                        <ul class="list-unstyled problemList">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <li>
                                                    <p><span class="subject">Type:</span> <span class="problem"><?php echo $requests[$i][3]; ?>
                                                    <br>
                                                    <span class="subject">Time Submitted:</span> <span class="problem"><?php echo $requests[$i][6]; ?></span></p>
                                                </li>
                                            <?php endfor;?>
                                        </ul>
                                        <p class="viewMoreReports text-center"><a href="allRequests.php">View more</a></p>
                                    </div>
                                </div>

                                <div class="col-md-6 technicalSupport ps-md-0">
                                    <div class="normalReports h-100">
                                        <p class="reportsTitle">
                                            Incident Reports <span class="reportCount"><?php echo count($requests); ?></span>
                                        </p>
                                        <ul class="list-unstyled problemList text-center">
                                            <li>
                                                <p><span class="subject">Request a technician.</p>
                                            </li>
                                            <li>
                                                <p><span class="subject">Report a problem with hardware.</p>
                                            </li>
                                        </ul>
                                        <p class="viewMoreReports text-center"><a href="allReports.php">View more</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grapController">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="singleGrap">
                                        <div class="grapTextCtrling p-4">
                                            <div class="parcentageCtrl d-flex">
                                                <h2 class="currentPersentage">65%</h2>
                                                <p class="Efficiency">Efficiency</p>
                                            </div>
                                            <p class="warningTxt efWarning">Increase in Average</p>
                                        </div>
                                        <div class="liveGrapView">
                                            <canvas class="myChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="singleGrap">
                                        <div class="grapTextCtrling p-4">
                                            <div class="parcentageCtrl d-flex">
                                                <h2 class="currentPersentage">14%</h2>
                                                <p class="Efficiency">Repeat incidents</p>
                                            </div>
                                            <p class="warningTxt efWarning repeatWarning">Increase in Average</p>
                                        </div>
                                        <div class="liveGrapView">
                                            <canvas class="myChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="singleGrap">
                                        <div class="grapTextCtrling p-4">
                                            <div class="parcentageCtrl d-flex">
                                                <h2 class="currentPersentage">50%</h2>
                                                <p class="Efficiency">Costs</p>
                                            </div>
                                            <p class="warningTxt costWarning">Increase in Average</p>
                                        </div>
                                        <div class="liveGrapView">
                                            <canvas class="myChart3"></canvas>
                                        </div>
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

        let contactFormHandle = document.querySelector('.contactFormHandle');
        contactFormHandle.addEventListener('click', (event)=>{
            event.preventDefault();
       })
    </script>
</body>

</html>