<?php
// Create database connection using config file
include_once("config.php");

// Display selected user data based on id
// Getting id from url
$nim = $_GET['nim'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM about WHERE nim=$nim");
while ($user_data = mysqli_fetch_array($result)) {
    $nim = $user_data['nim'];
    $fname = $user_data['fname'];
    $lname = $user_data['lname'];
    $alamat = $user_data['alamat'];
    $about = $user_data['about'];
    $email = $user_data['email'];
    $link_in = $user_data['link_in'];
    $link_git = $user_data['link_git'];
    $link_twit = $user_data['link_twit'];
    $link_fb = $user_data['link_fb'];
}

$skills = mysqli_query($conn, "SELECT * FROM skills WHERE nim=$nim");

$interests = mysqli_query($conn, "SELECT * FROM interests WHERE nim=$nim");
while ($data_interests = mysqli_fetch_array($interests)) {
    $interest = $data_interests['interest'];
}

$awards = mysqli_query($conn, "SELECT * FROM awards WHERE nim=$nim");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CV</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/profile.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Royan Habibie</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li> -->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    <?php
                    echo "$fname";
                    ?>
                    <span class="text-primary">
                        <?php
                        echo "$lname";
                        ?></span>
                </h1>
                <div class="subheading mb-5">
                    <?php
                    echo "$alamat";
                    ?>
                    <a href="mailto:name@email.com">
                        <?php
                        echo "$email";
                        ?>
                    </a>
                </div>
                <p class="lead mb-5">
                    <?php
                    echo "$about";
                    ?>
                </p>
                <div class="social-icons">
                    <?php
                    echo "<a class='social-icon' href='$link_in'><i class='fab fa-linkedin-in'></i></a>";
                    echo "<a class='social-icon' href='$link_git'><i class='fab fa-github'></i></a>";
                    echo "<a class='social-icon' href='$link_twit'><i class='fab fa-twitter'></i></a>";
                    echo "<a class='social-icon' href='$link_fb'><i class='fab fa-facebook-f'></i></a>";
                    ?>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <!-- <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">University of Colorado Boulder</h3>
                        <div class="subheading mb-3">Bachelor of Science</div>
                        <div>Computer Science - Web Development Track</div>
                        <p>GPA: 3.23</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">August 2006 - May 2010</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">James Buchanan High School</h3>
                        <div class="subheading mb-3">Technology Magnet Program</div>
                        <p>GPA: 3.56</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">August 2002 - May 2006</span></div>
                </div>
            </div>
        </section>
        <hr class="m-0" /> -->
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Skills</h2>
                <div class="subheading mb-3">Programming Languages & Tools</div>
                <?php
                while ($data_skills = mysqli_fetch_array($skills)) {
                    echo "<ul class='fa-ul mb-0'>";
                    echo "<li>
                        <span class='fa-li'><i class='fas fa-check'></i></span>
                        " . $data_skills['skill'] . "
                        </li>";
                    echo "</ul>";
                }
                ?>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">Interests</h2>
                <?php
                echo "$interest";
                ?>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Awards-->
        <section class="resume-section" id="awards">
            <div class="resume-section-content">
                <h2 class="mb-5">Awards & Certifications</h2>
                <ul class="fa-ul mb-0">
                    <?php
                    while ($data_awards = mysqli_fetch_array($awards)) {
                        echo "<li>
                                <span class='fa-li'><i class='fas fa-trophy text-warning'></i></span>
                                " . $data_awards['award'] . "
                            </li>";
                    }
                    ?>
                </ul>
            </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/profile.js"></script>
</body>

</html>