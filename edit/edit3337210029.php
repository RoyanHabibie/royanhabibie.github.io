<?php
// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $kelas = $_POST['class'];
    $alamat = $_POST['adress'];
    $about = $_POST['about'];
    $email = $_POST['email'];
    $link_in = $_POST['link_in'];
    $link_git = $_POST['link_git'];
    $link_twit = $_POST['link_twit'];
    $link_fb = $_POST['link_fb'];
    //$award = $_POST['award'];
    $interest = $_POST['interest'];
    //$skill = $_POST['skill'];
    $link_foto = $_POST['link_foto'];

    // query
    $sql = "UPDATE about, interests, users SET
    users.nama  = '$fname $lname',
    about.fname = '$fname',
    about.lname = '$lname',
    about.alamat = '$alamat',
    users.kelas = '$kelas',
    about.about = '$about',
    users.email = '$email',
    about.email = '$email',
    about.link_in = '$link_in',
    about.link_git = '$link_git',
    about.link_twit = '$link_twit',
    about.link_fb = '$link_fb',
    interests.interest = '$interest',
    about.link_foto = '$link_foto'
    WHERE about.nim = 3337210029 AND interests.nim = about.nim  AND users.nim = about.nim";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah

}


$sqluser = "SELECT * FROM users WHERE nim=3337210029";
$queryuser = mysqli_query($conn, $sqluser);
$rowuser = mysqli_fetch_assoc($queryuser);

$nim = $rowuser["nim"];
$kelas = $rowuser["kelas"];

// update user data about
$sqlabout = "SELECT * FROM about WHERE nim=3337210029";
$queryabout = mysqli_query($conn, $sqlabout);
$rowabout = mysqli_fetch_assoc($queryabout);

$fname = $rowabout["fname"];
$lname = $rowabout["lname"];
$alamat = $rowabout["alamat"];
$about = $rowabout["about"];
$email = $rowabout["email"];
$link_in = $rowabout["link_in"];
$link_git = $rowabout["link_git"];
$link_twit = $rowabout["link_twit"];
$link_fb = $rowabout["link_fb"];
$link_foto = $rowabout["link_foto"];

//awards
$sqlaward = "SELECT * FROM awards WHERE nim=3337210029";
$queryaward = mysqli_query($conn, $sqlaward);

//interest
$sqlinterest = "SELECT * FROM interests WHERE nim=3337210029";
$queryinterest = mysqli_query($conn, $sqlinterest);
$rowinterest = mysqli_fetch_assoc($queryinterest);

$interest = $rowinterest["interest"];

//skills
$sqlskill = "SELECT * FROM skills WHERE nim=3337210029";
$queryskill = mysqli_query($conn, $sqlskill);


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <!-- ========== Bootstrap CSS ========== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- =========== CSS ============ -->
    <style>
        .mainBg{
            background-color: #00c3f1;
            background-image: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7));
        }

        .formCard{
            border-radius: 10px;
        }

        .formCardheight{
            height: max-content;
        }
        
    </style>
</head>

<body class="mainBg">
    <div class="container">
        <h1 class="text-center text-white my-5 col-12"> EDIT FORM </h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-10 col-lg-4 col-xxl-5 mx-5">
                    <div class="bg-light formCard formCardheight my-5">
                        <h3 class="text-center p-3">User</h3>
                        <div class="p-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" name="name" id="name" class="form-control" value=<?php echo $fname.$lname; ?> disabled><br>
                            <label for="nim" class="form-label">NIM :</label>
                            <input type="text" name="nim" id="nim" class="form-control" value=<?= $nim ?> disabled ><br>
                            <label for="class" class="form-label">Class :</label>
                            <input type="text" name="class" id="class" class="form-control" value="<?= $kelas ?>" ><br>
                        </div> 
                    </div>
                    <div class="bg-light formCard formCardheight my-5">
                        <h3 class="text-center p-3">Interest</h3>
                        <div class="p-3">
                            <label for="interest" class="form-label">interest :</label>
                            <textarea type="textarea" class="form-control" id="interest" name="interest" ><?= $interest ?></textarea><br>
                        </div> 
                    </div>
                    <div class="bg-light formCard formCardheight my-5">
                        <h3 class="text-center p-3">Skills</h3>
                        <div class="p-3">
                            <?php while($rowskill = mysqli_fetch_assoc($queryskill)) : ?>
                            <label for="skill" class="form-label">Skill :</label>
                            <input type="text" name="skill" id="skill" class="form-control" value="<?= $skill[] = $rowskill["skill"]; ?>" ><br>
                            <?php endwhile; ?>
                        </div> 
                    </div>
                </div>
                <div class="col-10 col-lg-5 col-xxl-5 my-5 mx-5">
                    <div class="bg-light formCard formCardheight">
                        <h3 class="text-center p-3">About</h3>
                        <div class="p-3">
                            <label for="fname" class="form-label">First Name :</label>
                            <input type="text" name="fname" id="fname" class="form-control" value="<?= $fname ?>" ><br>
                            <label for="lname" class="form-label">Last Name :</label>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?= $lname ?>"  ><br>
                            <label for="email" class="form-label">Email :</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>" ><br>
                            <label for="adress" class="form-label">Adress :</label>
                            <input type="text" name="adress" id="adress" class="form-control" value="<?= $alamat ?>" ><br>
                            <label for="about" class="form-label">About :</label>
                            <textarea type="textarea" class="form-control" id="about" name="about" ><?= $about ?></textarea><br>
                            <label for="link_in" class="form-label">Link_in :</label>
                            <input type="text" name="link_in" id="link_in" class="form-control" value="<?= $link_in ?>" ><br>
                            <label for="link_git" class="form-label">Link_git :</label>
                            <input type="text" name="link_git" id="link_git" class="form-control" value="<?= $link_git ?>" ><br>
                            <label for="link_twit" class="form-label">Link_twit :</label>
                            <input type="text" name="link_twit" id="link_twit" class="form-control" value="<?= $link_twit ?>" ><br>
                            <label for="link_fb" class="form-label">Link_fb :</label>
                            <input type="text" name="link_fb" id="link_fb" class="form-control" value="<?= $link_fb ?>" ><br>
                            <label for="link_foto" class="form-label">Link_foto :</label>
                            <input type="text" name="link_foto" id="link_foto" class="form-control" value="<?= $link_foto ?>" ><br>
                        </div> 
                    </div>
                    <div class="bg-light formCard formCardheight my-5">
                        <h3 class="text-center p-3">Awards</h3>
                        <div class="p-3">
                            <?php while($rowaward = mysqli_fetch_assoc($queryaward)) : 
                            $award = $rowaward["award"];
                            ?>
                            <label for="award" class="form-label">Awards :</label>
                            <input type="text" name="award" id="award" class="form-control" value="<?= $award ?>"><br>
                            <?php endwhile; ?>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div class="mx-5 d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn btn-outline-info btn-lg px-5 mx-5">Update</button>
                <a href="../index.php"><button type="submit" class="btn btn-outline-info btn-lg px-5 mx-5">Back to Home</button></a>
            </div>
        </form>
    </div>
</body>
