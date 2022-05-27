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
                    <li class="nav-item"><a class="nav-link" href="index.php" style="font-size: 16px"><i style="font-size: 20px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php?action=hospital" style="font-size: 16px"><i class="fas fa-user" style="font-size: 20px"></i><span>Profile</span></a></li>
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
                
                <?php
                    $action = $_GET['action'];
                    
                    if($action == "hospital") {
                        
                ?>
                
                <div class="container-fluid">
                    
                    <div class="row mb-3">
                        
                        <div class="col-lg-8" style="margin: auto">
                            <div class="row">
                                <p style="text-align: center;">You can change your registered information through this page so that the <span class="text-dark">information</span> stays updated. </p>
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Hospital Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/update_details.php" method="get">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <input class="form-check-input" name="status" type="checkbox" id="sameBeds">
                                                            <label class="form-label" for="beds"><strong>Beds</strong></label><input class="form-control" type="text" placeholder="No of beds" name="beds" id="beds" required>
                                                            <script>
                                                                document.getElementById('sameBeds').addEventListener('click', async ()=> {
                                                                    if(document.getElementById('sameBeds').checked) {
                                                                    document.getElementById('beds').value = '<?php echo $_SESSION['beds']; ?>';
                                                                    } else {
                                                                    document.getElementById('beds').value = ''; 
                                                                    }
                                                                })
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <input class="form-check-input" name="status" type="checkbox" id="sameDocs">
                                                            <label class="form-label" for="doctors"><strong>Doctors</strong></label><input class="form-control" type="text" placeholder="No of doctors" name="doctors" id="doctors" required>
                                                            <script>
                                                                document.getElementById('sameDocs').addEventListener('click', async ()=> {
                                                                    if(document.getElementById('sameDocs').checked) {
                                                                    document.getElementById('doctors').value = '<?php echo $_SESSION['doctors']; ?>'; 
                                                                    } else {
                                                                    document.getElementById('doctors').value = ''; 
                                                                    }
                                                                })
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <input class="form-check-input" name="status" type="checkbox" id="sameICU">
                                                            <label class="form-label" for="icu"><strong>ICU</strong></label><input class="form-control" type="text" placeholder="No of icu" name="icu" id="icu" required>
                                                            <script>
                                                                document.getElementById('sameICU').addEventListener('click', async ()=> {
                                                                    if(document.getElementById('sameICU').checked) {
                                                                    document.getElementById('icu').value = '<?php echo $_SESSION['icu']; ?>'; 
                                                                    } else {
                                                                    document.getElementById('icu').value = ''; 
                                                                    }
                                                                })
                                                            </script>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <input class="form-check-input" name="status" type="checkbox" id="sameOxy">
                                                            <label class="form-label" for="oxygen"><strong>Oxygen</strong></label><input class="form-control" type="text" placeholder="No of oxygen cylinders" name="oxygen" id="oxygen" required>
                                                            <script>
                                                                document.getElementById('sameOxy').addEventListener('click', async ()=> {
                                                                    if(document.getElementById('sameOxy').checked) {
                                                                    document.getElementById('oxygen').value = '<?php echo $_SESSION['oxygen']; ?>'; 
                                                                    } else {
                                                                    document.getElementById('oxygen').value = ''; 
                                                                    }
                                                                })
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Update details</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <?php
                    }
                    elseif($action=="create_user") {
                ?>

                <div class="row mx-2">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-2">
                                <p class="text-primary m-0 fw-bold">New patient details</p>
                            </div>
                            <div class="card-body">
                                <form action="utilities/patient_details.php" method="get">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control border border-secondary" type="email" placeholder="user@example.com" name="email" id="email" required></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="name"><strong>Full Name</strong></label><input class="form-control border border-secondary" type="text" placeholder="Name" name="name" id="name" required></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="doa"><strong>Date of admission</strong></label><input class="form-control border border-secondary" type="date" placeholder="Date of admission" name="doa" id="doa" required></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3"><label class="form-label" for="age"><strong>Age</strong></label><input class="form-control border border-secondary" type="number" placeholder="Age" name="age" min="0" max="120"  id="age" required></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Disease Category</strong></label>
                                                            <br>
                                                            <div class="btn-group" style="width: 100%;">
                                                                <select name="select_disease" id="disease" type="button" class="btn border border-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                
                                                                <ul class="dropdown-menu">
                                                                    <option class="dropdown-item">Select category </option>
                                                                    <option class="dropdown-item">DC-001 | Cardiovascular - Heart</option>
                                                                    <option class="dropdown-item">DC-002 | Neurological - Nerves</option>
                                                                    <option class="dropdown-item">DC-003 | Orthopaedic - Bones</option>
                                                                    <option class="dropdown-item">DC-004 | Opthalmology - Eyes</option>
                                                                    <option class="dropdown-item">DC-005 | Otolaryngology - ENT</option>
                                                                </ul>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3"><label class="form-label" for="note"><strong>Note</strong></label><input class="form-control border border-secondary" type="message" placeholder="About the disease" name="note"  id="note" required></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="phone"><strong>Phone</strong></label><input class="form-control border border-secondary" type="text" placeholder="Phone Number" name="phone"  id="phone" required minlength="10" maxlength="10" required></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3"><label class="form-label"><strong>Status</strong></label>
                                             <div class="form-check mt-2">
                                                <input class="form-check-input" name="status" id="status" type="checkbox" value="true" id="checkStatus">
                                                <label class="form-check-label" for="checkStatus">
                                                    Critical?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Create patient</button></div>
                                </form>
                            </div>
                        </div>
                                    
                    </div>
                </div>
                
            </div>
            
            <?php
                    } elseif($action == "view_patient") {
                        
                    $p_id = $_GET['id'];
                    
                    $search_query = "SELECT * from patients WHERE h_id = '$_SESSION[id]' && p_id = '$p_id'";
                    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect));   
                    $row = mysqli_fetch_array($result_search_query);

                    $search_referral_query = "SELECT * from referrals WHERE h_id = '$_SESSION[id]' && p_id = '$p_id'";
                    $result_referral_query = mysqli_query($connect, $search_referral_query) or die(mysqli_error($connect));   
                    $answer = mysqli_fetch_array($result_referral_query);
    
                ?>
                
            <div class="row mx-2">
                    <div class="col">
                        <p style="text-align: center">Want to refer the patient quickly? Use the <span class="text-dark">share button</span> to escalate the process </p>
                        <div class="card shadow mb-3">
                            <div class="card-header py-2">
                                <p class="text-primary fw-bold" style="margin-top: 8px; display: inline-block; float: left;">Details</p>
                                <?php
                                    if($answer==0) {
                                ?>
                                <a style="display: inline-block; float: right; margin-top: 5px" href="profile.php?action=refer_patient&p_id=<?php echo $p_id ?>">
                                    <img style="float: right" src="https://img.icons8.com/ios-filled/25/000000/share-2.png"/>
                                </a>
                                <a href="utilities/deleteUser.php?p_id=<?php echo $p_id ?>" style="display: inline-block; float: right" class="mx-2" >
                                <button class="btn btn-success">Recovered</button>
                            </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" placeholder="<?php echo $row['email'] ?>" disabled readonly></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="name"><strong>Full Name</strong></label><input class="form-control" placeholder="<?php echo $row['name'] ?>" disabled readonly></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="doa"><strong>Date of admission</strong></label><input class="form-control" placeholder="<?php echo $row['doa'] ?>" disabled readonly></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3"><label class="form-label" for="age"><strong>Age</strong></label><input class="form-control" placeholder="<?php echo $row['age'] ?>" disabled readonly></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="d_cat"><strong>Disease Category</strong></label><input class="form-control" placeholder="<?php echo $row['d_category'] ?>" disabled readonly></div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3"><label class="form-label" for="phone"><strong>Phone</strong></label><input class="form-control" placeholder="<?php echo $row['phone'] ?>" disabled readonly></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="note"><strong>Note</strong></label><input class="form-control" placeholder="<?php echo $row['note'] ?>" disabled readonly></div>
                                        </div>
                                </form>
                            </div>
                        </div>
                                    
                    </div>
                </div>
                
            </div> 
            
            <div class="container-fluid">
                <p style="text-align: center">Add the reports, prescriptions of the patient in this section <span class="text-dark">without hassle.</span> Patient recovered? Click on the green icon to update the status of patient</p>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="display: inline-block; float: left">Record Details</p>
                            <p class="m-0" style="display: inline-block; float: right">
                                <?php
                                    if($row['critical'] == 'true') {
                                ?>
                                    <a href="utilities/recovered.php?p_id=<?php echo $p_id ?>">
                                    <img src="https://img.icons8.com/external-glyph-geotatah/30/26e07f/external-healthy-spread-of-disease-glyph-glyph-geotatah.png"/>
                                </a>
                                <?php
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Test Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $records_query = "SELECT * from p_records WHERE p_id = '$p_id'";
                                            $result_records_query = mysqli_query($connect, $records_query) or die(mysqli_error($connect));   
                                            
                                            while($row = mysqli_fetch_array($result_records_query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo("$row[test_name]") ?></td>
                                            
                                            <td><a href="<?php echo $row['test_file'] ?>" target="_blank">Click to see</a></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <a href="profile.php?action=update_record&p_id=<?php echo $p_id ?>">
                                        <img style="margin-top:-12px" src="https://img.icons8.com/ios-filled/25/000000/plus.png"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php
                } elseif($action == "update_record") {
                $p_id = $_GET['p_id'];
            ?>
            <div class="container-fluid">
                <p style="text-align: center">Uplaod a file and the same will be attached with the atient details</p>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Report Updation</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/create_records.php?p_id=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label" for="test_name"><strong>Test</strong></label><input class="form-control" type="text" placeholder="Name of test" name="test_name"></div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label"><strong>Report</strong></label>
                                                            <input class="form-control" type="file" name="bill">
                                                        </div>
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
            <?php 
                } elseif($action == "refer_patient") {
                    $p_id = $_GET['p_id'];
                    
                $search_patient = "SELECT * from patients WHERE h_id = '$_SESSION[id]' && p_id = '$p_id'";
                $patient_search_query = mysqli_query($connect, $search_patient) or die(mysqli_error($connect));   
                $row = mysqli_fetch_array($patient_search_query);
                    
            ?>
            
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
                                                        <div class="mb-3"><label class="form-label" for="email"><strong></strong>Email</label><input class="form-control" placeholder="<?php echo $row['email'] ?>" disabled readonly></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="name"><strong></strong>Name</label><input class="form-control" type="text" placeholder="<?php echo $row['name'] ?>" required readonly></div>
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
                
            <?php
                } elseif ($action == "create_doctor") {
            ?>
                <div class="container-fluid">
                <p style="text-align: center">Uplaod a profile picture and the rest of the doctor's details</p>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-2">
                                            <p class="text-primary m-0 fw-bold">Doctor Creation</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="utilities/create_doctors.php?h_id=<?php echo $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label" for="test_name"><strong>Name</strong></label><input class="form-control" type="text" placeholder="Name of doctor" name="d_name"></div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3"><label class="form-label"><strong>Profile Picture</strong></label>
                                                            <input class="form-control" type="file" name="picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Specialization</strong></label>
                                                            <br>
                                                            <div class="btn-group" style="width: 100%;">
                                                                <select name="main" id="disease" type="button" class="btn border border-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                
                                                                <ul class="dropdown-menu">
                                                                    <option class="dropdown-item">Select category </option>
                                                                    <option class="dropdown-item">Heart</option>
                                                                    <option class="dropdown-item">Nerves</option>
                                                                    <option class="dropdown-item">Bones</option>
                                                                    <option class="dropdown-item">Eyes</option>
                                                                    <option class="dropdown-item">ENT</option>
                                                                </ul>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="col-md-6 col-sm-12">
                                             <div class="mb-3">
                                                <label class="form-label" for="test_name"><strong>Email</strong></label><input class="form-control" type="email" placeholder="Email of doctor" name="d_email">
                                             </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3"><label class="form-label" for="phone"><strong>Phone</strong></label><input class="form-control border border-secondary" type="text" placeholder="Phone Number" name="d_phone"  id="phone" required minlength="10" maxlength="10" required></div>
                                        </div>
                                    </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Create Doctor</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
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
        <!--<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>-->
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <div class="alan-btn" onclick="sendURL()"></div>
    <script type="text/javascript" src="https://studio.alan.app/web/lib/alan_lib.min.js"></script>
    <script>
    var alanBtnInstance = alanBtn({
        key: "ffd76d92a00cd23e5e7e5d5734a8c8012e956eca572e1d8b807a3e2338fdd0dc/stage",
        onCommand: function (commandData) {
        if (commandData.command === "changeBeds") {
            document.getElementById('beds').value = commandData.item;
        } else if(commandData.command === "changeDoctors") {
            document.getElementById('doctors').value = commandData.item;
        } else if (commandData.command === "submitDetails") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "addName") {
            
            alanBtnInstance.callProjectApi("checkPatientPage", {value:window.location.href}, function (error, result){
                console.log(error);
            });
            document.getElementById('name').value = commandData.item;
        } else if (commandData.command === "addDOA") {
            document.getElementById('doa').value = commandData.item;
        } else if (commandData.command === "addAge") {
            document.getElementById('age').value = commandData.item;
        } else if (commandData.command === "addNote") {
            document.getElementById('note').value = commandData.item;
        } else if (commandData.command === "setStatus") {
            document.getElementById('status').checked= commandData.item;
        } else if (commandData.command === "submitPatient") {
            
            let email = document.getElementById('email').value;
            let d_cat = document.getElementById('disease').value;
            let phone = document.getElementById('phone').value;
            
            window.location.replace(commandData.item+'&email='+email+'&phone='+phone+'&select_disease='+d_cat);
        } else if( commandData.command === "createPatient") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "dashBoard") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "referral") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "table") {
            window.location.replace(commandData.item);
        } else if (commandData.command === "endSession") {
            window.location.replace('logout.php');
        }
        },
        rootEl: document.getElementById("alan-btn"),
    });
    </script>
    
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
                                var hope = item.replace(" ", "%20");
                                hope = hope.split(":")[0];
                                
                                var newHTML = '<ul class="dropdown-menu"><option class="dropdown-item" value="'+hope.replace("%20"," ")+'">'+item+'</option></ul>';
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