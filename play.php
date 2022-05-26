<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ReferMedi</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="index/css/overwrite.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57" style="user-select:none">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">&nbsp;<span style="color: #0dcaf0 !important">ReferMedi</span></a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#find">Find Out</a></li>
                    <li class="nav-item"><a class="nav-link" href="#covid">Covid</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="text-center text-white d-flex masthead" style="background-image: url('img/header.jpg');position:relative; height: 100vh">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto my-5">
                    <h1 style="margin: 5px 0px;"><strong>A collaborative space for <span class="text-warning">P</span>atients <span class="text-warning">H</span>ospitals & <span class="text-warning">D</span>octors</strong></h1>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">
                    where they can interact with each other and resurrect the healthcare system together.
                </p>
            </div>
        </div>
    </header>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Lets see what are the roles</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-dark mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-once="true">
                            <img src="https://img.icons8.com/doodle/70/000000/fever.png" /></i>
                        <h3 class="mb-3">Patient</h3>
                        <p class="text-muted mb-0">
                            Can book an appointment, sort & see various available options & chat with the doctor.
                            Bookings will be reviewd by hopitals
                        </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-info mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-delay="200" data-aos-once="true">
                            <img src="https://img.icons8.com/stickers/70/000000/hospital-2.png" /></i>
                        <h3 class="mb-3">Hospital</h3>
                        <p class="text-muted mb-0">
                            The highly versed & equipped entity on the platform. Apart from the tons of features
                            it can use voice commands to do everything like fill a form, navigate between sections & much more
                        </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-info mb-3 sr-icons" data-aos="fade" data-aos-duration="200" data-aos-delay="600" data-aos-once="true">
                            <img src="https://img.icons8.com/color/70/000000/doctor-male-skin-type-3.png" /></i>
                        <h3 class="mb-3">Doctor</h3>
                        <p class="text-muted mb-0">
                            This intellectual entity can interact with the patients and can provide precautions & preventions through the site itself
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="find" class="bg-dark text-white">
        <div id="schedule" class="m-4">
            <div class="container text-center">
                <h2><strong>Find Out playground awaits you</strong></h2>
                <hr>
                <div class="row">
                    <div class="d-sm-block col-sm-6">
                        <p class="text-warning">Know more about a disease by writing its name</p>
                        <p>For eg: try leukemia, cancer, scurvy</p>
                        <input id="searchDisease" class="my-2 form-control form-control-user" style="border: 3px none;width: 50%;margin: auto;  border-radius: 20px" type="text" aria-describedby="emailHelp" placeholder="" maxlength="25">

                        <div style="float: left">
                            <div id="specialty" class="text-faded mb-2 text-justify"></div>
                            <div id="symptoms" class="text-faded mb-2 text-justify"> </div>
                            <div id="factors" class="text-faded mb-2 text-justify"> </div>
                            <div id="treatment" class="text-faded mb-2 text-justify"></div>
                            <div id="link" class="text-faded mb-2 text-center"></div>
                        </div>
                    </div>
                    <div class="col sm-6 mb-0">
                        <p class="text-warning">Want to see the COVID stats country-wise? Try this out</p>
                        <div class="row">
                            <div class="col-6">

                                <select name="schedule" style="border: 3px none;border-radius: 10px; width:80%;" class="mt-2" id="countries">
                                    <?php

                                    $curl = curl_init();

                                    curl_setopt_array($curl, [
                                        CURLOPT_URL => "https://covid-193.p.rapidapi.com/countries",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "GET",
                                        CURLOPT_HTTPHEADER => [
                                            "X-RapidAPI-Host: covid-193.p.rapidapi.com",
                                            "X-RapidAPI-Key: a1e245bc00msh17b5bf88579175fp1cd37bjsnc2184a3efa43"
                                        ],
                                    ]);

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                        echo "cURL Error #:" . $err;
                                    } else {
                                        $resArr = json_decode($response);

                                        for ($i = 0; $i <= 232; $i++) { ?>

                                            <option><?php echo ($resArr->response[$i]); ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" style="border-radius: 20px; margin:auto; width:60%;" type="button" id="fetchData">Fetch</button>
                                </div>
                            </div>
                            <div class="text-justify mt-2 px-5">
                                <p id="population"></p>
                                <p id="total_cases"></p>
                                <!--<p id="new_cases"></p>-->
                                <p id="active_cases"></p>
                                <p id="total_deaths"></p>
                                <p id="total_tests"></p>
                            </div>
                        </div>
                        <p class="mt-2 text-justify"></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="covid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><img src="https://img.icons8.com/nolan/70/coronavirus.png" /> About COVID-19 <img src="https://img.icons8.com/nolan/70/coronavirus.png" /></h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-dark mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-once="true">
                            <img src="https://img.icons8.com/doodle/70/000000/protection-mask.png" /></i>
                        <h3 class="mb-3">Prevention</h3>
                        <p class="text-muted text-justify mb-0">
                            1. Get vaccinated when a vaccine is available to you. <br>
                            2. Stay at least 1 metre apart from others, even if they don’t appear to be sick. <br>
                            3. Wear a properly fitted mask when physical distancing is not possible or when in poorly ventilated settings. <br>
                            4. Wash your hands regularly with soap and water or clean them with alcohol-based hand rub.
                        </p>
                        <p onclick="window.location.href='https://www.who.int/health-topics/coronavirus#tab=tab_2'" class="mt-2" style="cursor: pointer">Read More...</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-info mb-3 sr-icons" data-aos="zoom-in" data-aos-duration="200" data-aos-delay="200" data-aos-once="true">
                            <img src="https://img.icons8.com/external-bearicons-outline-color-bearicons/70/000000/external-What-miscellany-texts-and-badges-bearicons-outline-color-bearicons.png" /></i>
                        <h3 class="mb-3">What is it?</h3>
                        <p class="text-muted text-justify mb-0">
                            Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.
                            Most people infected with the virus will experience mild to moderate respiratory illness and recover without requiring special treatment. However, some will become seriously ill and require medical attention. Older people and those with underlying medical conditions like cardiovascular disease, diabetes, chronic respiratory disease, or cancer are more likely to develop serious illness.
                        </p>
                        <p onclick="window.location.href='https://www.who.int/health-topics/coronavirus#tab=tab_1'" class="mt-2" style="cursor: pointer">Read More...</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 text-center">
                    <div class="mx-auto service-box mt-5"><i class="text-info mb-3 sr-icons" data-aos="fade" data-aos-duration="200" data-aos-delay="600" data-aos-once="true">
                            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/70/000000/external-symptoms-virus-transmission-flaticons-lineal-color-flat-icons-3.png" /></i>
                        <h3 class="mb-3">Symptoms</h3>
                        <p class="text-muted text-justify mb-0">
                            1. Most common symptoms : fever, cough, tiredness, loss of taste or smell. <br>
                            2. Less common symptoms : sore throat, headache, aches and pains, diarrhoea, a rash on skin, or discolouration of fingers or toes,red or irritated eyes. <br>
                            Seek immediate medical attention if you have serious symptoms. Always call before visiting your doctor or health facility.
                        </p>
                        <p onclick="window.location.href='https://www.who.int/health-topics/coronavirus#tab=tab_3'" class="mt-2" style="cursor: pointer">Read More...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-dark text-white p-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mx-auto">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4" style="height:5px">
                    <p class="mb-5">Ready to start using this project? That's great! Give me a call or send me an email
                        and I will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center ms-auto"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p><a class="text-decoration-none text-faded" href="tel:+917011238307">Drop a call</a></p>
                </div>
                <div class="col-lg-4 text-center me-auto"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a class="text-decoration-none text-faded" href="mailto:vishalvats2000@gmail.com">Drop an
                            email</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="margin:auto">
                    <p style="margin:auto; font-size:14px" class="text-center">Made and maintained by <b>Vishal Vats</b>
                        &copy;
                        <?php echo date("Y"); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="index/js/creative.js"></script>

    <script>
        document.getElementById('searchDisease').addEventListener("keyup", async () => {
            if (event.keyCode === 13) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "api.php");
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(`disease=${document.getElementById('searchDisease').value}`);
                xhr.onload = function() {
                    let result = this.responseText;
                    if (result != "NA") {
                        let arr = result.split("/");
                        document.getElementById('specialty').innerHTML = "1️⃣ <u>Specialty</u> : " + arr[0];
                        document.getElementById('symptoms').style.display = "block";
                        document.getElementById('factors').style.display = "block";
                        document.getElementById('treatment').style.display = "block";
                        document.getElementById('link').style.display = "block";

                        document.getElementById('specialty').innerHTML = "1️⃣ <u>Specialty</u> : " + arr[0];
                        document.getElementById('symptoms').innerHTML = "2️⃣ <u>Symptom</u> : " + arr[1];
                        document.getElementById('factors').innerHTML = "3️⃣ <u>Risk Factors</u> : " + arr[2];
                        document.getElementById('treatment').innerHTML = "4️⃣ <u>Treatment</u> :" + arr[3];

                        const disease = document.getElementById('searchDisease').value;
                        const address = 'https://en.wikipedia.org/wiki/' + disease;
                        document.getElementById('link').innerHTML = 'Click <a target="_blank" href=' + address + '>here</a> for more details';
                    } else {
                        document.getElementById('specialty').innerHTML = "🔴 <u>NO RECORD FOUND</u> ";
                        document.getElementById('symptoms').style.display = "none";
                        document.getElementById('factors').style.display = "none";
                        document.getElementById('treatment').style.display = "none";
                        document.getElementById('link').style.display = "none";
                    }

                }
            }
        });
    </script>

    <script>
        document.getElementById('fetchData').addEventListener('click', async () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "covid.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(`country=${document.getElementById('countries').value}`);
            xhr.onload = function() {
                let result = this.responseText;
                let arr = result.split("*");
                document.getElementById('population').innerHTML = "🟡 <u>Population</u> : " + arr[0];
                document.getElementById('total_cases').innerHTML = "🟡 <u>Total Cases</u> : " + arr[1];
                document.getElementById('active_cases').innerHTML = "🟡 <u>Active Cases</u> : " + arr[2];
                document.getElementById('total_deaths').innerHTML = "🟡 <u>Total deaths</u> : " + arr[3];
                document.getElementById('total_tests').innerHTML = "🟡 <u>Total Tests</u> : " + arr[4];
            };
        });
    </script>
</body>

</html>