<?php
require 'utilities/common.php';

# blocking unauthorized access
if (!isset($_SESSION['role'])) {
    header("location: play.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi | Home Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    
    <script>
        function checkRole() {
            if(<?php echo($_SESSION['role']=="Patient"?"1":"0") ?>) {
                alert("Patient logged in");
            } else  if(<?php echo($_SESSION['role']=="Hospital"?"1":"0") ?>){
                alert("Hospital logged in");
            } else if(<?php echo($_SESSION['role']=="Doctor"?"1":"0") ?>) {
                alert("Doctor logged in");
            }
        }
    </script>
</head>

<body id="page-top" style="user-select: none">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
                    <div class="sidebar-brand-icon">
                        <img src="https://img.icons8.com/color-glass/48/000000/hospital-2.png" class="bg-white"/>
                    </div>
                    <div class="sidebar-brand-text mx-2"><span>ReferMedi</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php?action=hospital" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-table"></i><span>Table</span></a></li>
                    <?php 
                        if($_SESSION['role'] == "Hospital") {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="doc.php?h_id=<?php echo $_SESSION['id'] ?>" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-user-md"></i><span>Doctors</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="schedule.php
                        " style="font-size: 16px"><i style="font-size: 20px" class="fas fa-list"></i><span>Schedule</span></a></li>
                    <?php  
                        }
                    ?>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <h3 class="text-dark mb-0" style="font-weight: bold">Dashboard</h3>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo($_SESSION['name']) ?></span><img class="border rounded-circle img-profile" src="https://img.icons8.com/ios-glyphs/30/000000/test-account.png"/></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer"><i class="fas fa-microphone fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Generic Voice Commands</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-lg mb-1"><span>Beds Count</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['beds']) ?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-linector-flat-linector/48/000000/external-beds-hotel-service-linector-flat-linector.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-lg mb-1"><span>Doctors</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['doctors']) ?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-flatart-icons-lineal-color-flatarticons/48/000000/external-doctors-biochemistry-and-medicine-healthcare-flatart-icons-lineal-color-flatarticons.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-lg mb-1"><span>ICU</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo($_SESSION['icu']) ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-microdots-premium-microdot-graphic/48/000000/external-icu-medical-healthcare-vol1-microdots-premium-microdot-graphic.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-lg mb-1"><span>O<sub>2</sub> Cylinders</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo($_SESSION['oxygen']) ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/48/000000/external-oxygen-medical-kiranshastry-lineal-color-kiranshastry.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-lg mb-1"><span>ID</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['id']) ?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/color/48/000000/id-verified.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!--Modal for voice commands-->
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="font-family:Open Sans,Helvetica Neue,Arial,sans-serif;">
                <div class="modal-dialog modal-dialog-centered" style="color: black">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="margin:auto; color:#0DCAF0"><strong>What can you say?</strong></h5>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body" style="text-align:justify">
                        1. Log me out<br>    
                        2. Show me patients<br>
                        3. What does this app do<br>
                        4. Show me table records <br>
                        5. I want to add new patient <br>
                        6. Take me to the dashboard <br>
                        7. Take me to the referral page <br>
                        8. How Alan AI elevates this project <br>
                        9. What concepts of Alan has been used in the app<br><br>

                        <span style="color:#0DCAF0">NOTE:</span> The above-listed commands can be used from any page
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="bg-white sticky-footer" style="height:5px">
                <div class="container my-auto">
                    <div class="text-center copyright my-auto"><span>Copyright © ReferMedi 2022</span></div>
                </div>
            </footer>
        </div>
        <!--<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>-->
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <div class="alan-btn"></div>
    <script type="text/javascript" src="https://studio.alan.app/web/lib/alan_lib.min.js"></script>
    <script>
    var alanBtnInstance = alanBtn({
        key: "ffd76d92a00cd23e5e7e5d5734a8c8012e956eca572e1d8b807a3e2338fdd0dc/stage",
        onCommand: function (commandData) {
        if (commandData.command === "createPatient") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "referral") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "table") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "addName") {
            alanBtnInstance.callProjectApi("checkPatientPage", {value:window.location.href}, function (error, result){
                console.log(error);
            });
        } else if (commandData.command === "changeBeds") {
            alanBtnInstance.callProjectApi("checkHospitalPage", {value:window.location.href}, function (error, result){
                console.log(error);
            });
        } else if (commandData.command === "endSession") {
            window.location.replace('logout.php');
        }
        },
        rootEl: document.getElementById("alan-btn"),
    });
    </script>
    
</body>

</html>