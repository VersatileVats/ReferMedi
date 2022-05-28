<?php
require 'utilities/common.php';
if (!isset($_SESSION['role'])) {
    header("location: login.php");
} 

if($_SESSION['role'] != "Hospital") {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi | Doctors</title>
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
                    <li class="nav-item"><a class="nav-link" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-table"></i><span>Table</span></a></li>
                    <?php 
                        if($_SESSION['role'] == "Hospital") {
                    ?>
                        <li class="nav-item"><a class="nav-link active" href="doc.php?h_id=<?php echo $_SESSION['id'] ?>" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-user-md"></i><span>Doctors</span></a></li>
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
                    
                        <h3 class="text-dark mb-0" style="font-weight: bold">Doctors</h3>
                        
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
                
                <?php
                    $h_id = $_GET["h_id"];
                    $search_query = "SELECT * from doctors WHERE h_id = $h_id";
                    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));   
    
                    while($row = mysqli_fetch_array($result_search_query)) {
                ?>
                
                    <div class="card text-white bg-success m-5 my-2 d-inline-block" style="width: 17rem; height: 15em">
                    <div class="card-header text-dark">Doctor Id <?php echo $row['d_id'] ?></div>
                    <div class="card-body d-block" style="float:left; width: 65%">
                        <h5 class="card-title">Dr. <?php echo $row['name'] ?></h5>
                        
                        <?php if ($row['speciality'] ==  "Nerves") { ?>
                            <img src="https://img.icons8.com/external-others-pike-picture/25/000000/external-brain-neurology-medicine-others-pike-picture-6.png" id="neuro" />
                        <?php 
                        } elseif ($row['speciality'] == "Bones") { ?>
                            <img src="https://img.icons8.com/external-vitaliy-gorbachev-blue-vitaly-gorbachev/25/000000/external-bones-bad-habits-vitaliy-gorbachev-blue-vitaly-gorbachev.png" id="bones"/>
                        <?php    
                        } elseif ($row['speciality'] == "Eyes") { ?>
                            <img src="https://img.icons8.com/external-creatype-filed-outline-colourcreatype/25/000000/external-eyes-basic-creatype-filed-outline-colourcreatype.png" id="eyes"/>
                        <?php
                        }elseif($row['speciality'] == "Heart") { ?>
                            <img src="https://img.icons8.com/fluency/25/000000/like.png" id="heart"/>
                        <?php
                        } else { ?>
                        <img src="https://img.icons8.com/pastel-glyph/25/000000/throat--v1.png" id="ent"/>
                        <?php    
                        }
                        ?>
                        
                    </div>
                    <div class="card-body mt-2" >
                        <?php
                            if($row['profile'] == "utilities/uploads/avatars/") { ?>
                                <img src="utilities/uploads/user.png" class="img-fluid bg-white" style="border-radius: 50%; height: 60px" alt="Doc">
                            <?php    
                            } else {
                            ?>
                                <img src="<?php echo $row['profile'] ?>" class="img-fluid bg-white" style="border-radius: 50%; height: 60px" alt="Doc">
                            <?php
                            }
                        ?>
                        
                    </div>
                    
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $row['email'] ?> <br>
                            <b>Phone:</b> <?php echo $row['phone'] ?>
                        </p>
                    </div>
                </div>
                
                <?php
                    }
                ?>
                
                
                <a href="https://wheels4water.me/hackfest/profile.php?action=create_doctor"><img style="display: inline-block; padding-bottom: 130px" class="m-3" src="https://img.icons8.com/external-bearicons-glyph-bearicons/48/000000/external-Plus-essential-collection-bearicons-glyph-bearicons.png"/></a>
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