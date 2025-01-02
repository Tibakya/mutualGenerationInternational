<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- Color File -->
    <link href="assets/css/color.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Join Entrepreneurship Club</title>

    <style>
    body {
        background-image: url('assets/images/background/bg24.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #333;
        font-family: Arial, sans-serif;
    }

    .form-section {
        padding: 50px 0;
    }

    .form-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .aside-section {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e9ecef;
        border-radius: 10px;
        padding: 15spx;
    }

    .aside-section img {
        max-width: 100%;
        border-radius: 10px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .form-label {
        font-weight: bold;
    }

    .btn {
        font-size: 16px;
        padding: 10px 20px;
    }

    .text-center strong {
        font-size: 1.2rem;
    }
    </style>
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
    <section class="page-title" style="background-image: url(assets/images/background/image-3.jpg);">
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
                        <h1>Entrepreneurship</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index">Home</a></li>
                        <li>Interpreneures</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Form Card -->
                <div class="col-md-6">
                    <div class="form-card">
                        <h4 style="margin-bottom:35px;" > Join Entrepreneurship Club near you!</h4>
                        <p class="text-center">
                            Provide your details below to register and help
                                us create a national database of youth clubs across the country.
                        </p>
                        <form action="process_interpr.php" method="POST" id="contact_form">
                            <!-- First Name -->
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class=" fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="First Name" required>
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class=" fas fa-person-dolly "></i></span>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Last Name" required>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Address" required>
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="eg. 0712345678" required>
                                </div>
                            </div>
                            <!-- Region -->
                            <div class="mb-3">
                                <label for="region" class="form-label">Region</label>
                                <select class="form-control" id="region" name="region" required>
                                    <option value="">Select Region</option>
                                    <!-- Add all regions dynamically -->
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
                                    <!-- Add other regions here -->
                                </select>
                            </div>
                            <!-- District -->
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <select class="form-control" id="district" name="district" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <!-- Ward -->
                            <div class="mb-3">
                                <label for="ward" class="form-label">Ward</label>
                                <input type="text" class="form-control" id="ward" name="ward" placeholder="Ward"
                                    required>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Join Club <i
                                        class="bi bi-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Picture Card -->
                <div class="col-md-6">
                    <div class="aside-section">
                        <img src="assets/images/background/bg23.jpg" alt="Side Image">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script>

document.getElementById("contact_form").addEventListener("submit", function(event) {
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9]{10,15}$/;

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    }

    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number.");
        event.preventDefault();
    }
});



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
    document.getElementById("region").addEventListener("change", function() {
        const region = this.value;
        const districtSelect = document.getElementById("district");
        districtSelect.innerHTML = '<option value="">Select District</option>'; // Reset districts

        if (regionsToDistricts[region]) {
            regionsToDistricts[region].forEach(function(district) {
                const option = document.createElement("option");
                option.value = district;
                option.textContent = district;
                districtSelect.appendChild(option);
            });
        }
    });


    if (localStorage.getItem("formSubmitted") === "true") {
            // Reset the form fields
            document.getElementById("contact_form").reset();
            // Remove the flag to prevent clearing on subsequent visits
            localStorage.removeItem("formSubmitted");
        }
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