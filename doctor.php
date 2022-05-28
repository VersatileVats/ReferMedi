<?php
require 'utilities/common.php';
if (!isset($_SESSION['role'])) {
    header("location: play.php");
}

if($_SESSION['role'] == "Patient") {
    header("location: patient.php");
}

if($_SESSION['role'] == "Hospital") {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi | Appointment</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top" style="user-select: none;">
    <div id="wrapper"style="height: 100vh;">
        
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
                
                <div class="container container-fluid">
                    <h4>Your appointments are as follows: </h4>
                    <?php
                    $search_query = "SELECT * from appointment WHERE d_id = '$_SESSION[id]' && status = 'accepted' ";
                    $result_search_query = mysqli_query($connect, $search_query) or die(mysqli_error($connect)); 
    
                    while($row = mysqli_fetch_array($result_search_query)) {
                        
                        $search_query1 = "SELECT * from sole_patient WHERE id = '$row[p_id]' ";
                        $result_search_query1 = mysqli_query($connect, $search_query1) or die(mysqli_error($connect));
                        $result = mysqli_fetch_array($result_search_query1) ;
                ?>
                
                    <div class="card text-white bg-success d-inline-block m-4 my-2 mb-3" style="width: 17rem;">
                    <div class="card-header text-dark">
                        Patient Id <?php echo $result['id'] ?>
                    </div>
                    <div class="card-body d-block text-center">
                        <h5 class="card-title"><?php echo $result['p_name'] ?></h5>
                        <h6 class="card-title"><?php echo $result['email'] ?></h6>
                        <h6 class="card-title"><?php echo $result['phone'] ?></h6>
                    </div>
                    
                    <div class="card-body">
                        <p class="card-text" style="text-align: center">
                                <button id="start_chat" onclick = "window.location.href='doctor.php?p_id=<?php echo $row['p_id'] ?>'" class="btn btn-outline-dark text-white"><b>Chat</b></button>
                        </p>
                    </div>
                    
                    <div class="card-footer text-center text-dark" style="font-size: 0.8rem">
                        <?php
                            
                                echo $row['timing'];
                        ?>
                    </div>
                </div>
                
                <?php
                    }
                ?>
                
                <?php 
                    if(isset($_GET['p_id'])) {
                        $p_id = $_GET['p_id'];
                 ?>
                    
                    <div class="row my-3" id="after_chat">
                        
                        <div class="col-lg-4">
                            <h3 class="text-dark mb-4" style="text-align: center; border: outset 3px black; border-radius: 10px">Add a prescription</h3>
                            <p >Add or remove upto 5 prescriptions </p>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-body">
                                        
                                                <div class="row">
                                                    <div class="col">
                                                        <?php
                                                            $query = "SELECT answer,question,p1,p2,p3,p4,p5 from prescription WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
                                                            $result_query = mysqli_query($connect, $query) or die(mysqli_error    ($connect));
                                                            $result = mysqli_fetch_array($result_query);
                                                            $prescriptions = array($result['p1'],$result['p2'],$result['p3'],$result['p4'],$result['p5']);
                                                            
                                                            $empty = 0;
                                                            $itr = 1;
                                                            
                                                            foreach ($prescriptions as $value) {
                                                                if($value != "") {
                                                        ?>
                                                                <div class="mb-3 text-dark" style="font-weight: bold">
                                                                <p>
                                                                <i value = "<?php echo $itr ?>" id="delete_prescription" onclick="changeUI(this)" class="fa fa-ban text-danger" aria-hidden="true" style="cursor: pointer"><span style="display: none"><?php echo $itr ?></span></i>
                                                                <?php echo $value ?>
                                                                </p>
                                                                </div> 
                                                                
                                                                
                                                                
                                                        <?php
                                                                $itr ++; } else {$empty ++;}
                                                            } if($empty != 0) {
                                                        ?>
                                                            <div>
                                                            <input id="add_prescription" class="form-control form-control-user" style="border: black 2px solid" type="text" aria-describedby="emailHelp" placeholder="Your prescription please"  maxlength="50">
                                                            </div>
                                                          <script>
                                                        <?php   
        
        
                                                        if(isset($_GET['p_id'])) { ?>
                                                            document.getElementById('add_prescription').addEventListener("keyup", async () => {
                                                            if(event.keyCode ===  13) {
                                                                if(document.getElementById('add_prescription').value != "") {
                                                                    
                                                                let xhr  = new XMLHttpRequest();
                                                                xhr.open("POST","common_chat.php");
                                                                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                                                xhr.send(`prescription=${document.getElementById('add_prescription').value}&p_id=${<?php echo $_GET['p_id'] ?>}&action=add`);
                                                                xhr.onload = function () {location.reload()};
                                                            }   
                                                        }});
                                                        <?php    }   ?> </script>  
                                                            
                                                            <div class="small text-center">
                                                            <p><?php echo $empty ?>/5 left</p>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <h3 class="text-dark mb-4" style="text-align: center; border: outset 3px black; border-radius: 10px">Patient Info</h3>
                            <p>A quick glance of the patient you are interacting with</p>
                            <div class="table-responsive table mt-2" id="options_available" role="grid" aria-describedby="dataTable_info">
                                   <table class="table my-0">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Phone</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php 
                                                $find_patient = "SELECT * from sole_patient WHERE id = '$p_id' ";
                                                $result_find_patient = mysqli_query($connect, $find_patient) or die(mysqli_error($connect));
                                                $found_them = mysqli_fetch_array($result_find_patient);
                                            ?>
                                            <tbody>
                                                <td><?php echo $p_id ?></td>
                                                <td><?php echo $found_them['p_name'] ?></td>
                                                <td><?php echo $found_them['email'] ?></td>
                                                <td><?php echo $found_them['age'] ?></td>
                                                <td><?php echo $found_them['phone'] ?></td>
                                            </tbody>
                                        </table>  
                                        <div class="d-flex justify-content-center">
                                            <button onclick="window.location.href='utilities/deleteAppoint.php?p_id=<?php echo $p_id ?>&d_id=<?php echo $_SESSION['id'] ?>'" class="mt-2 btn btn-outline-primary " style="font-weight: bold">Discharge</button>
                                        </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-lg-4">
                            <h3 class="text-dark mb-4" style="text-align: center; border: outset 3px black; border-radius: 10px">Q&A</h3>
                            <p>Auto deletes when patient asks a new question</p>
                            <img src="https://img.icons8.com/stickers/35/000000/q.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/u.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/e.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/s.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/t.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/i.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/o.png"/> 
                            <img src="https://img.icons8.com/stickers/35/000000/n.png"/> 
                            
                            
                            <input class="my-2 form-control form-control-user" style="border: black 2px solid" type="text" aria-describedby="emailHelp" placeholder="<?php echo $result['question'] ?>" disabled maxlength="50">
                            
                            
                            <img src="https://img.icons8.com/stickers/35/000000/a.png"/>
                            <img src="https://img.icons8.com/stickers/35/000000/n.png"/>
                            <img src="https://img.icons8.com/stickers/35/000000/s.png"/>
                            <img src="https://img.icons8.com/stickers/35/000000/w.png"/>
                            <img src="https://img.icons8.com/stickers/35/000000/e.png"/>
                            <img src="https://img.icons8.com/stickers/35/000000/r.png"/>
                            
                            <input id="submitAnswer" class="my-2 form-control form-control-user" style="border: black 2px solid" type="text" aria-describedby="emailHelp" placeholder="Max 50 chars allowed" maxlength="50">
                            <script>
                                if(<?php echo $result['question'] =="" or $result['answer'] != "" ?> ) {
                                    document.getElementById('submitAnswer').setAttribute('disabled','');
                                   document.getElementById('submitAnswer').value = "<?php echo $result['answer'] ?>";
                                }
                            </script>
                        </div>
                    </div>
                    <?php } ?>
                    
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
        function changeUI(el) {
            let target = el.textContent;
            let xhr= new XMLHttpRequest();
            xhr.open("POST","common_chat.php");
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`p_id=${<?php echo $_GET['p_id'] ?>}&action=delete&target=${target}`);
            xhr.onload = function () {location.reload()};
        }
    </script>
    
    <script>
         document.getElementById('submitAnswer').addEventListener("keyup", async () => {
             if(event.keyCode ===  13) {
                // document.getElementById('submitAnswer').value
                let xhr  = new XMLHttpRequest();
                xhr.open("POST","common_chat.php");
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send(`answer=${document.getElementById('submitAnswer').value}&p_id=${<?php echo $_GET['p_id'] ?>}&action=answer`);
                xhr.onload = function () {location.reload()};
             }});
    </script>
    
</body>

</html>