<?php
require 'utilities/common.php';
if (!isset($_SESSION['role'])) {
    header("location: play.php");
}

$flag = 'false';
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
                    <li class="nav-item"><a class="nav-link" href="index.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php?action=hospital" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-table"></i><span>Table</span></a></li>
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
                    <h3 class="text-dark mb-4" style="text-align: center">Refer a patient</h3>
                    <p style="text-align: center">According to the quality factor, choose the hospitals in whoch you have to refer the patient. A <span class="text-dark">customized email template</span> will be shared to the referred hospital </p>
                    <div class="row mb-3">
                        
                        <div class="col-lg-8" style="margin: auto">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Details for patient # <?php echo($p_id)?></p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/refer_patients.php?p_id=<?php echo $p_id ?>" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email</strong></label><input class="form-control" placeholder="email" disabled readonly></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="name"><strong>Name</strong></label><input class="form-control" type="text" placeholder="Name" required readonly></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col" id="sort_by">
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Sort By</strong></label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline d-sm-block d-md-inline-block">
                                                            <input type="radio" class="form-check-input" name="sort" value="oxygen">
                                                           <label class="form-label" for="name">Oxygen</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline d-sm-block d-md-inline-block">
                                                            <input type="radio" class="form-check-input" name="sort" value="icu">
                                                           <label class="form-label" for="ICU">ICU</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" name="sort" value="doctor">
                                                           <label class="form-label" for="name">Doctors</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" name="sort" value="beds">
                                                           <label class="form-label" for="name">Beds</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row" id="noHospitals" style="display: none">
                                                    <div class="col">
                                                        <div class="mb-3 text-center text-danger" style="font-weight: bold">
                                                            <p>No avaliable hospitals as per your request</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col" id="options_available" style="display: none">
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Available options</strong></label>
                                                            <br>
                                                            <div class="btn-group d-block" >
                                                                <select name="select_hospital" type="button" class="btn border border-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%" id="append_options">
                                                                    Select from below 
                                                                
                                                                <ul class="dropdown-menu" >
                                                                    
                                                                </ul>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="mb-3"><button id="refer_request" class="btn btn-primary btn-sm" type="submit">Send Request</button></div>
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
    
    <script>
        document.getElementById('sort_by').addEventListener("click", async () => {
            var radios = document.getElementsByName('sort');
            for (var radio of radios) {
                if(radio.checked) {
                    let xhr  = new XMLHttpRequest();
                    xhr.open("POST","sort.php");
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhr.send(`sort=${radio.value}`);
                    xhr.onload = function () {
                        let arr = this.responseText.split("-");
                        res = arr.slice(0,arr.length - 1);
                        document.getElementById('append_options').innerHTML = 0;
                        document.getElementById('options_available').style.display = "block";
                        document.getElementById('noHospitals').style.display = "none";
                        
                        res.forEach(updateUI);
                        
                        function updateUI(item) {
                            if(item == "NA") {
                                document.getElementById('noHospitals').style.display = "block";
                                document.getElementById('options_available').style.display = "none";
                            } else {
                                
                                var newHTML = '<ul class="dropdown-menu"><option class="dropdown-item">'+item+'</option></ul>';
                                document.getElementById('append_options').innerHTML+=newHTML;   
                            }
                        }
                    }
                }
            }
        })
    </script>
    
</body>

</html>