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
    <title>ReferMedi | Stats</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php?action=hospital" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>
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
                        
                        <h3 class="text-dark mb-0" style="font-weight: bold">Referral <img src="https://img.icons8.com/fluency/40/000000/search-client.png"/></h3>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo($_SESSION['name']) ?></span><img class="border rounded-circle img-profile" src="https://img.icons8.com/ios-glyphs/30/000000/test-account.png"/></a>
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
                    
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <h4 class="text-dark mt-2" style="text-align: center; font-weight: bold;">Referred by Us:</h4>
                                <?php
                                        //Query for searching record in r_hospitals table
                                        $query = "SELECT * from r_hospitals WHERE r_from = '$_SESSION[name]'";
                                        $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));
                                        $flag =  true;
                                        
                                        while($row = mysqli_fetch_array($result_query)) {
                                        $flag = false;
                                    
                                        // Query to fetch the patient details from patients table
                                        $query1 = "SELECT * from patients WHERE p_id = '$row[p_id]'";
                                        $result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));
                                        $answer = mysqli_fetch_array($result_query1);
                                        
                                    ?>
                                <div class="col-lg-3 mb-4">
                                        <?php
                                            if($row['status'] == 'accept') {
                                        ?>
                                            <div class="card textwhite bg-success text-white shadow py-3">
                                        <?php
                                            } elseif($row['status'] == 'reject') {
                                        ?>
                                            <div class="card textwhite bg-danger text-white shadow">
                                        <?php
                                            } else {
                                        ?>
                                            <div class="card textwhite bg-warning text-white shadow py-3">
                                        <?php
                                            }
                                        ?>
                                        <div class="card-body" style="font-weight: bold">
                                            
                                            <?php
                                                if($row['status'] == 'accept') {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-a.png"/>
                                            <?php
                                                } elseif($row['status'] == 'reject') {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-r.png"/>
                                            <?php
                                                } else {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-p.png"/>
                                            <?php
                                                }
                                            ?>
                                            
                                            <p class="m-0" style="display: inline-block"><?php echo $row['p_id'] ?></p>
                                            <p class="m-0 r_by_name" style="display: inine-bock; float: right"><?php echo $answer['name'] ?></p>
                                            <p class="m-0 mt-2" style="text-align: center"><?php echo $row['r_to'] ?></p>
                                            
                                            <?php
                                                if($row['status'] == 'reject') {
                                            ?>
                                                <p class="m-0 mt-2" id="status_field" style="text-align: center; border: white 1px solid; border-radius: 3px"><?php echo $row['rod'] ?></p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                    
                                    if($flag) {
                                        ?>
                                            <div class="col-lg-3 mb-4">
                                                <div class="card textwhite bg-dark text-white shadow">
                                                    <div class="card-body">
                                                        <p class="m-0">No Record Found</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                            <div class="row">
                                <h4 class="text-dark mt-2" style="text-align: center; font-weight: bold;">Referred to Us:</h4>
                                <?php
                                        //Query for searching record in r_hospitals table
                                        $query = "SELECT * from r_hospitals WHERE r_to = '$_SESSION[name]'";
                                        $result_query = mysqli_query($connect, $query) or die(mysqli_error($connect));
                                        $flag = true;
                                        
                                        while($row = mysqli_fetch_array($result_query)) {
                                            
                                        $flag = false;
                                        
                                        // Query to fetch the patient details from patients table
                                        $query1 = "SELECT * from patients WHERE p_id = '$row[p_id]'";
                                        $result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));
                                        $answer = mysqli_fetch_array($result_query1);
                                        
                                    ?>
                                <div class="col-lg-3 mb-4">
                                        <?php
                                            if($row['status'] == 'accept') {
                                        ?>
                                            <div class="card textwhite bg-success text-white shadow py-3">
                                        <?php
                                            } elseif($row['status'] == 'reject') {
                                        ?>
                                            <div class="card textwhite bg-danger text-white shadow">
                                        <?php
                                            } else {
                                        ?>
                                            <div class="card textwhite bg-warning text-white shadow py-3">
                                        <?php
                                            }
                                        ?>
                                        <div class="card-body" style="font-weight: bold">
                                            
                                            <?php
                                                if($row['status'] == 'accept') {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-a.png"/>
                                            <?php
                                                } elseif($row['status'] == 'reject') {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-r.png"/>
                                            <?php
                                                } else {
                                            ?>
                                                <img src="https://img.icons8.com/ios-filled/25/ffffff/circled-p.png"/>
                                            <?php
                                                }
                                            ?>
                                            
                                            <p class="m-0" style="display: inline-block"><?php echo $row['p_id'] ?></p>
                                            <p class="m-0 r_to_name" style="display: inine-bock; float: right"><?php echo $answer['name'] ?></p>
                                            <p class="m-0 mt-2" style="text-align: center"><?php echo $row['r_from'] ?></p>
                                            
                                            <?php
                                                if($row['status'] == 'reject') {
                                            ?>
                                                <p class="m-0 mt-2" id="status_field" style="text-align: center; border: white 1px solid; border-radius: 3px"><?php echo $row['rod'] ?></p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                    
                                    if($flag) {
                                        ?>
                                            <div class="col-lg-3 mb-4">
                                                <div class="card textwhite bg-dark text-white shadow">
                                                    <div class="card-body">
                                                        <p class="m-0">No Record Found</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                ?>
                                
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
                        1. Show me patients referred by my hospital <br> 
                        2. Show me patients referred to my hospital <br><br>
                        </div>
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

    <div class="alan-btn"></div>
    <script type="text/javascript" src="https://studio.alan.app/web/lib/alan_lib.min.js"></script>
    <script>
    var alanBtnInstance = alanBtn({
        key: "ffd76d92a00cd23e5e7e5d5734a8c8012e956eca572e1d8b807a3e2338fdd0dc/stage",
        onCommand: function (commandData) {
         if(commandData.command === "referredByUs") {
             var elements = document.getElementsByClassName('r_by_name');
             if(elements.length == 0) {
                 alanBtnInstance.callProjectApi("noRecord", {value: 'No Record Found'}, function (error, result){
                    console.log(error);
                });
             }
             for (let j=0; j<elements.length; j++) {
                elements[j].style.color="black";
                alanBtnInstance.callProjectApi("referByUs", {value: elements[j].innerHTML}, function (error, result){
                    console.log(error);
                });
            }
         } else if(commandData.command === "referredToUs") {
             var elements = document.getElementsByClassName('r_to_name');
             if(elements.length == 0) {
                 alanBtnInstance.callProjectApi("noRecord", {value: 'No Record Found'}, function (error, result){
                    console.log(error);
                });
             }
             for (let k=0; k<elements.length; k++) {
                elements[k].style.color="black";
                alanBtnInstance.callProjectApi("referToUs", {value: elements[k].innerHTML}, function (error, result){
                    console.log(error);
                });
            }
         } else if(commandData.command === "createPatient") {
             window.location.replace(commandData.item);
         } else if (commandData.command === "dashBoard") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "table") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "changeBeds") {
            alanBtnInstance.callProjectApi("checkHospitalPage", {value:window.location.href}, function (error, result){
                console.log(error);
            });
        } else if (commandData.command === "addName") {
            alanBtnInstance.callProjectApi("checkPatientPage", {value:window.location.href}, function (error, result){
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