<?php
// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $nim = $_POST['nim'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $alamat = $_POST['alamat'];
    $about = $_POST['about'];
    $email = $_POST['email'];
    $link_in = $_POST['link_in'];
    $link_git = $_POST['link_git'];
    $link_twit = $_POST['link_twit'];
    $link_fb = $_POST['link_fb'];
    $award = $_POST['award'];
    $interest = $_POST['interest'];
    $skill = $_POST['skill'];

    // query
    $sql = "UPDATE about, interests, awards, skills SET
                fname = '$fname',
                lname = '$lname',
                alamat = '$alamat',
                about = '$about',
                email = '$email',
                link_in = '$link_in',
                link_git = '$link_git',
                link_twit = '$link_twit',
                link_fb = '$link_fb',
                award = '$award',
                interest = '$interest',
                skill = '$skill'
                WHERE about.nim = $nim AND interests.nim = $nim  AND awards.nim = $nim AND skills.nim = $nim
            ";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah

}


// Check if form is submitted for user update, then redirect to homepage after update
if (!isset($_GET['nim'])) {
    header('Location: ../index.php');
}
// about
$nim = $_GET['nim'];

// update user data about
$sql = "SELECT * FROM about WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$fname = $row["fname"];
$lname = $row["lname"];
$alamat = $row["alamat"];
$about = $row["about"];
$email = $row["email"];
$link_in = $row["link_in"];
$link_git = $row["link_git"];
$link_twit = $row["link_twit"];
$link_fb = $row["link_fb"];

//awards
$sql = "SELECT * FROM awards WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$skill = $row["skill"];

?>
<html>
    <head>
        <title>Edit CV</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- SweetAlert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Nerko+One&family=Poppins:wght@200&display=swap" rel="stylesheet">

    </head>
    <style>
        body{
            background-color: #C6EBC5;
        }
    .btn{
            background-color: #7FB77E;
        }
        .teks{
            color:black;
            font-size: 15px;
            font-weight: 0;
        }
    </style>

    <body>
        <div class="container mt-5">
            <a class="btn" href="../index.php">Go to Home</a><br /><br />
            <h2>Edit CV</h2></br>
            <form class="row g-3" method="post" action='edit3337210043.php' enctype="multipart/form-data">
                <div>
                    <td><input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?>></td>
                    <td></td>
                </div>
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" class="teks form-control" id="fname" name="fname" value="<?= $fname ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Alamat</label>
                    <input type="text" class="teks form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="teks form-control" id="lname" name="lname" value="<?= $lname ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" class="teks form-control" id="email" name="email" value="<?= $email ?>" required>
                </div>
                <div class="col-md-6">
                    <label>About</label>
                    <input type="textarea" class="teks form-control" id="about" name="about" value="<?= $about ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Link in</label>
                    <input type="text" class="teks form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Link Github</label>
                    <input type="text" class="teks form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Link Twitter</label>
                    <input type="text" class="teks form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Link Facebook</label>
                    <input type="text" class="teks form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Awards</label>
                    <input type="text" class="teks form-control" id="award" name="award" value="<?= $award ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Interests</label>
                    <input type="text" class="teks form-control" id="interest" name="interest" value="<?= $interest ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Skills</label>
                    <input type="text" class="teks form-control" id="skill" name="skill" value="<?= $skill ?>" required>
                </div>
                <div>
                <button type="submit" name="submit" class="btn"><i class="fas fa-edit"></i> Edit</button>
                </div>
            </form>
        </div>
    </body>
</html>
