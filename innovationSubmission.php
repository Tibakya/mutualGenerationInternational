<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "admin/conn.php";
   
    // Fetch settings
    $settings = mysqli_query($con, "SELECT * FROM settings");
    $setting = mysqli_fetch_array($settings);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Innovations-<?php echo htmlspecialchars($setting['site_name']); ?></title>
    <meta name="description" content="MGI is a nonprofit, non-governmental organization, autonomous, non-religious, non-partisan, non-political organization and social organization.
.">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <style>
        

        body {
            /* url(assets/images/background/bg24.png);  background-size: cover;  background-repeat: no-repeat;" */
            background-image: url('assets/images/background/bg24.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .form-section {
            padding: 80px 0;
            /* backdrop-filter: blur(3px); */
        }
        .form-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        }
        .form-card h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #28a745;
        }
        .form-control {
            border-radius: 20px;
            padding: 15px;
            transition: border-color 0.3s;
            min-height: 50px; /* Minimum height for dropdown */
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: none;
        }
        .form-control option {
            color: black; /* Ensure text is visible in the dropdown */
            padding: 10px; /* Padding for option */
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 15px 0;
            border-radius: 50px;
            transition: all 0.3s;
            font-size: 18px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .section-title {
            color: #fff;
            text-align: center;
            margin-bottom: 40px;
            font-size: 24px;
            font-weight: bold;
        }
        /* Basic Select Field Styles */
select {
    width: 100%; /* Make it full-width */
    padding: 10px; /* Add padding for better readability */
    font-size: 16px; /* Set a readable font size */
    border: 1px solid #ccc; /* Light border for the select box */
    border-radius: 4px; /* Rounded corners for modern look */
    background-color: #f9f9f9; /* Light background color */
    appearance: none; /* Remove default dropdown arrow */
    -webkit-appearance: none; /* Remove default dropdown arrow in WebKit browsers */
    -moz-appearance: none; /* Remove default dropdown arrow in Firefox */
}

/* Custom Arrow for Select */
select::-ms-expand {
    display: none; /* Remove the default arrow in IE */
}

/* Optional: Add a custom background image for the dropdown arrow */
select {
    background-image: url('path/to/your/arrow-icon.png');
    background-repeat: no-repeat;
    background-position: right 10px center; /* Adjust arrow position */
    background-size: 12px; /* Adjust size of the arrow */
}

/* Focused Select Field */
select:focus {
    border-color: #007bff; /* Highlight border on focus */
    outline: none; /* Remove the default outline */
}

/* Option Styling (for better visibility) */
select option {
    padding: 10px; /* Add padding for options */
}

    </style>
</head>
<body>


   <!-- Preloader -->
   <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>
        <!-- End Main Header -->
        <?php include "header.php"; ?>
        <!-- Hidden Sidebar -->
        <?php include "hidden_folder/hidden_sideBar.php" ?>
        <!-- Hidden Sidebar End -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/ai-innovatio.jpg);">
            <div class="background-text">
                <!-- <div data-parallax='{"x": 100}'>
                    <div class="text-1">mutual</div>
                    <div class="text-2">mutual</div>
                </div> -->
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper">
                        <div class="title">
                            <h1>Innovations and Products</h1>
                        </div>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index">Home</a></li>
                            <li>MGI Members</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>




<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">
                    <!-- <h2 class="text-center">Register for Product and Innovation</h2> -->
                    <p class="text-center"><strong>Register for Products and Innovations Monthly Exhibitions through Meza Duara ya
                    Vijana at Your Region</strong></p>
                
                    <div class="form-section">
                <form action="process_innovation.php" method="POST" id="contact_form">
               

                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" required>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="E-Mail Address" required>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone #</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="+255 123 456 789" required>
                            </div>
                        </div>

                        <!-- Tanzania Region and District -->
                        <div class="mb-3 input-group" >
                            <label for="region" class="form-label">Region</label>
                            <select class=" input-group form-select" id="region" name="region" required>
                                <option value="" disabled selected>Select Region</option>
                                <option value="Arusha">Arusha</option>
                                <option value="Dar es Salaam">Dar es Salaam</option>
                                <option value="Dodoma">Dodoma</option>
                                <option value="Geita">Geita</option>
                                <option value="Iringa">Iringa</option>
                                <option value="Kagera">Kagera</option>
                                <option value="Katavi">Katavi</option>
                                <option value="Kigoma">Kigoma</option>
                                <option value="Kilimanjaro">Kilimanjaro</option>
                                <option value="Lindi">Lindi</option>
                                <option value="Manyara">Manyara</option>
                                <option value="Mara">Mara</option>
                                <option value="Mbeya">Mbeya</option>
                                <option value="Morogoro">Morogoro</option>
                                <option value="Mtwara">Mtwara</option>
                                <option value="Mwanza">Mwanza</option>
                                <option value="Njombe">Njombe</option>
                                <option value="Pwani">Pwani</option>
                                <option value="Rukwa">Rukwa</option>
                                <option value="Ruvuma">Ruvuma</option>
                                <option value="Shinyanga">Shinyanga</option>
                                <option value="Simiyu">Simiyu</option>
                                <option value="Singida">Singida</option>
                                <option value="Tabora">Tabora</option>
                                <option value="Tanga">Tanga</option>
                                <option value="Unguja">Unguja</option>
                                <option value="Pemba">Pemba</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="district" class=" form-label">District</label>
                            <select class="input-group form-select" id="district" name="district" required>
                                <option value="" disabled selected>Select District</option>
                            </select>
                        </div>

                        <!-- Project Description -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Project Description</label>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Project Description"
                                rows="4" required></textarea>
                        </div>

                        <!-- Success Message -->
                        <div class="alert alert-success d-none" id="success_message">
                            <strong>Success!</strong> Thanks for contacting us, we will get back to you shortly.
                        </div>

                         <!-- submission date -->
                         <div class="mb-3">
                            <label for="phone" class="form-label">Exhibition Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calender "></i></span>
                                <input type="date" class="form-control" id="date" name="date"
                                    placeholder="+255 123 456 789" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Send <i class="bi bi-send"></i></button>
                        </div>
                    </fieldset>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>





<script>
  const regionsToDistricts = {
      "Arusha": ["Arusha City", "Arumeru", "Karatu", "Longido", "Monduli"],
      "Dar es Salaam": ["Ilala", "Kinondoni", "Temeke", "Ubungo", "Kigamboni"],
      "Dodoma": ["Dodoma Urban", "Chamwino", "Kondoa", "Mpwapwa", "Bahi"],
      "Geita": ["Bukombe", "Chato", "Geita Town", "Mbogwe", "Nyang'hwale"],
      "Iringa": ["Iringa Rural", "Iringa Urban", "Kilolo", "Mufindi"],
      "Kagera": ["Bukoba Rural", "Bukoba Urban", "Biharamulo", "Karagwe", "Ngara", "Kyerwa", "Muleba"],
      "Katavi": ["Mlele", "Mpanda"],
      "Kigoma": ["Kasulu", "Kibondo", "Kigoma Rural", "Kigoma Urban", "Kakonko", "Uvinza"],
      "Kilimanjaro": ["Hai", "Moshi Rural", "Moshi Urban", "Rombo", "Siha", "Same"],
      "Lindi": ["Lindi Rural", "Lindi Urban", "Kilwa", "Ruangwa", "Nachingwea"],
      "Manyara": ["Babati", "Simanjiro", "Kiteto", "Mbulu", "Hanang"],
      "Mara": ["Musoma Rural", "Musoma Urban", "Bunda", "Rorya", "Serengeti", "Tarime"],
      "Mbeya": ["Mbeya Rural", "Mbeya Urban", "Rungwe", "Chunya", "Kyela"],
      "Morogoro": ["Morogoro Rural", "Morogoro Urban", "Kilombero", "Ulanga", "Mvomero"],
      "Mtwara": ["Mtwara Rural", "Mtwara Urban", "Masasi", "Nanyumbu", "Tandahimba"],
      "Mwanza": ["Mwanza City", "Ukerewe", "Ilemela", "Sengerema", "Nyamagana", "Kwimba", "Magu"],
      "Njombe": ["Njombe Rural", "Njombe Urban", "Makambako", "Ludewa", "Wanging'ombe"],
      "Pwani": ["Kibaha", "Bagamoyo", "Mkuranga", "Rufiji", "Kisarawe"],
      "Rukwa": ["Kalambo", "Nkasi", "Sumbawanga Rural", "Sumbawanga Urban"],
      "Ruvuma": ["Songea Rural", "Songea Urban", "Mbinga", "Namtumbo", "Tunduru"],
      "Shinyanga": ["Shinyanga Rural", "Shinyanga Urban", "Kahama", "Bukombe"],
      "Simiyu": ["Bariadi", "Meatu", "Maswa", "Itilima", "Busega"],
      "Singida": ["Singida Rural", "Singida Urban", "Manyoni", "Iramba", "Ikungi"],
      "Tabora": ["Tabora Urban", "Nzega", "Igunga", "Sikonge", "Urambo"],
      "Tanga": ["Tanga City", "Korogwe", "Lushoto", "Muheza", "Handeni", "Mkinga"],
      "Unguja": ["Zanzibar City", "West Unguja", "Central Unguja", "South Unguja"],
      "Pemba": ["Chake Chake", "Wete", "Mkoani", "North Pemba"]
  };

  // Function to update districts based on selected region
  document.getElementById("region").addEventListener("change", function () {
      const region = this.value;
      const districtSelect = document.getElementById("district");
      districtSelect.innerHTML = '<option value="">Select District</option>'; // Reset districts

      if (regionsToDistricts[region]) {
          regionsToDistricts[region].forEach(function (district) {
              const option = document.createElement("option");
              option.value = district;
              option.textContent = district;
              districtSelect.appendChild(option);
          });
      }
  });

  document.getElementById("contact_form").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    // Email Validation Regex
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    }

    // Phone Validation Regex (simple example for Tanzanian phone numbers)
    var phonePattern = /^\+255[0-9]{9}$/;
    if (!phone.match(phonePattern)) {
        alert("Please enter a valid phone number in the format +255123456789.");
        event.preventDefault();
    }
});

</script>



        <!-- End page wrapper -->

        <!-- Scroll to top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span>
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/jquery.fancybox.js"></script>
        <script src="assets/js/isotope.js"></script>
        <script src="assets/js/owl.js"></script>
        <script src="assets/js/appear.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/lazyload.js"></script>
        <script src="assets/js/scrollbar.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/swiper.min.js"></script>
        <script src="assets/js/jquery.polyglot.language.switcher.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/parallax-scroll.js"></script>
        <script src="assets/js/script.js"></script>

</body>
</html>
