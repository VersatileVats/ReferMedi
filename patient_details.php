<?php
require 'utilities/common.php';
if (!isset($_SESSION['role'])) {
    header("location: play.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi | Profile</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top" style="user-select: none">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon">
                        <img src="https://img.icons8.com/color-glass/48/000000/hospital-2.png" class="bg-white"/>
                    </div>
                    <div class="sidebar-brand-text mx-2"><span>ReferMedi</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="patient.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="patient_details.php" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>-->
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    
                        <h3 class="text-dark mb-0" style="font-weight: bold">Profile</h3>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown"><span class="d-none d-lg-inline me-2 text-gray-600"><?php echo($_SESSION['name']) ?></span><img class="border rounded-circle img-profile" src="https://img.icons8.com/ios-glyphs/30/000000/test-account.png"/></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer"><i class="fas fa-microphone fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Voice Commands</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            
            <div class="container-fluid">
                    
                    <div class="row mb-3">
                        
                        <div class="col-lg-8" style="margin: auto">
                            <div class="row">
                                <p style="text-align: center;">You can change your registered information through this page so that the <span class="text-dark">details</span> always stay updated. </p>
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Change account details</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/sole_patient.php" method="get">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email</strong></label><input class="form-control" type="email" name="email" id="email" required></div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label" for="phone"><strong>Phone Number</strong></label><input class="form-control" type="text" name="phone" id="phone" maxlength="10" required></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
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
                            <h5 class="modal-title" id="staticBackdropLabel" style="margin:auto; color:#0DCAF0"><strong>Page specific voice commands</strong></h5>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body" style="text-align:justify">
                        Let's start filling the details <br>
                        </div>
                    </div>
                </div>
                </div>
                
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ReferMedi 2022</span></div>
                </div>
            </footer>
        </div>
        
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    
</body>

</html>