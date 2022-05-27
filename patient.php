<?php
require 'utilities/common.php';
if (!isset($_SESSION['role'])) {
    header("location: play.php");
}

if($_SESSION['role'] == "Hospital") {
    header("location: index.php");
}

if($_SESSION['role'] == "Doctor") {
    header("location: doctor.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi | Table</title>
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
                    <li class="nav-item"><a class="nav-link active" href="patient.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="patient_details.php" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="referral_stats.php" style="font-size: 16px"><i class="fas fa-gear" style="font-size: 20px"></i><span>Stats</span></a></li>-->
                    
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
                                            <div class="text-uppercase text-primary fw-bold text-lg mb-1"><span>Patient ID</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['id']) ?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/48/000000/external-id-hospitality-services-flaticons-flat-flat-icons.png"/>
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
                                            <div class="text-uppercase text-success fw-bold text-lg mb-1"><span>Email</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['email']) ?></span></div>
                                        </div>
                                        <div class="col-auto d-none d-md-block">
                                           <img src="https://img.icons8.com/emoji/48/000000/e-mail.png"/>
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
                                            <div class="text-uppercase text-info fw-bold text-lg mb-1"><span>Age</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo($_SESSION['age']) ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-filled-outline-berkahicon/48/000000/external-age-survey-filled-outline-berkahicon.png"/>
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
                                            <div class="text-uppercase text-info fw-bold text-lg mb-1">Phone</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo($_SESSION['phone']) ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-none d-md-block">
                                            <img src="https://img.icons8.com/ios-filled/48/000000/apple-phone.png"/>
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
                                            <div class="text-uppercase text-warning fw-bold text-lg mb-1"><span>Name</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo($_SESSION['name']) ?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/pastel-glyph/48/000000/name.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        
                        <div class="col-lg-8">
                            <h3 class="text-dark mb-4" style="text-align: center">Book an appointment</h3>
                            <p >Just use the sort features to see <span class="text-dark">which hospitals and doctors</span> are available on the platform and get started! </p>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Sort & Search</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/refer_patients.php?p_id=<?php echo $p_id ?>" method="post">
                                                
                                                <div class="row">
                                                    <div class="col" id="sort_by">
                                                        <div class="mb-3 form-check form-check-inline d-sm-block d-md-inline-block">
                                                            <input type="radio" class="form-check-input" name="sort" value="Heart">
                                                           <label class="form-label" for="name">Heart</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline d-sm-block d-md-inline-block">
                                                            <input type="radio" class="form-check-input" name="sort" value="Nerves">
                                                           <label class="form-label" for="ICU">Nerves</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" name="sort" value="Bones">
                                                           <label class="form-label" for="name">Bones</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" name="sort" value="Eyes">
                                                           <label class="form-label" for="name">Eyes</label>
                                                        </div>
                                                        <div class="mb-3 form-check form-check-inline">
                                                            <input type="radio" class="form-check-input" name="sort" value="ENT">
                                                           <label class="form-label" for="name">ENT</label>
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
                                                
                                    <div class="table-responsive table mt-2" id="options_available" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0">
                                            <thead>
                                                <tr>
                                                <th>Hospital Name</th>
                                                <th>Hospital Email</th>
                                                <th>Doctors</th>
                                                <th>Details</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table my-0" id="append_options">
                                            
                                        </table>
                                    </div>
                                                <div class="mb-3"><button id="refer_request" class="btn btn-primary btn-sm" type="submit">Send Request</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <h3 class="text-dark mb-4" style="text-align: center">Your appointments</h3>
                            <p>See your appintment status so that you keep upto date</p>
                            <div class="table-responsive table mt-2" id="options_available" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0">
                                            
                                            <thead>
                                                <tr>
                                                <th>Hospital</th>
                                                <th>Doctor</th>
                                                <th>Speciality</th>
                                                <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php  
                                                $search_query = "SELECT * from appointment WHERE p_id = '$_SESSION[id]'";
                                                $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));
                                                 
                                                while($result = mysqli_fetch_array($result_search_query)) {
                                                    
                                                    $search_query1 = "SELECT name from doctors WHERE d_id = '$result[d_id]'";
                                                    $result_search_query1 = mysqli_query($connect, $search_query1) or die(mysqli_error($connect));
                                                    $result1 = mysqli_fetch_array($result_search_query1);
                                                    
                                                    $search_query2 = "SELECT h_name from hospitals WHERE h_id = '$result[h_id]'";
                                                    $result_search_query2 = mysqli_query($connect, $search_query2) or die(mysqli_error($connect));
                                                    $result2 = mysqli_fetch_array($result_search_query2);
                                            ?>
                                            <tbody style="cursor: pointer" onclick="window.location='p_doc.php?h_id=<?php echo $result['h_id'] ?>&speciality=<?php echo $result['speciality'] ?>'">
                                                <td><?php echo $result2['h_name'] ?></td>
                                                <td><?php echo $result1['name'] ?></td>
                                                <td><?php echo $result['speciality'] ?></td>
                                                <td>
                                                    <?php if($result['status'] == "accepted") {?>
                                                        <img style="margin-left: 14px" src="https://img.icons8.com/emoji/20/000000/green-circle-emoji.png"/>
                                                    <?php } else { ?>
                                                        Awaiting
                                                    <?php  } ?>
                                                </td>
                                            </tbody>
                                            
                                            <?php
                                                }
                                            ?>
                                            
                                        </table>
                                        <table class="table my-0" id="append_options">
                                            
                                        </table>
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
        
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <script>
        document.getElementById('sort_by').addEventListener("click", async () => {
            var radios = document.getElementsByName('sort');
            for (var radio of radios) {
                if(radio.checked) {
                    
                    document.getElementById('append_options').innerHTML = "";
                    
                    let xhr  = new XMLHttpRequest();
                    xhr.open("POST","p_find.php");
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhr.send(`sort=${radio.value}`);
                    xhr.onload = function () {
                        let arr = this.responseText.split("&");
                        if(arr == "NA") {
                            document.getElementById('noHospitals').style.display = "block";
                            document.getElementById('options_available').style.display = "none";
                        } else {
                            document.getElementById('noHospitals').style.display = "none";
                            document.getElementById('options_available').style.display = "block";
                            res = arr.slice(0,length - 1);
                            res.forEach(updateUI);   
                        }
                        
                        function updateUI(item) {
                                var h_id  =  item.split("-")[3];
                                var speciality = item.split("-")[4];
                                var newHTML = '<tbody><td>'+item.split("-")[1]+'</td><td>'+item.split("-")[2]+'</td><td>'+item.split("-")[0]+'</td><td><a href="p_doc.php?h_id='+h_id+'&speciality='+speciality+'">Click here</a></td></tbody>';
                                
                                document.getElementById('append_options').innerHTML+=newHTML;   
                            
                        }
                    }
                }
            }
        })
    </script>
    
</body>

</html>