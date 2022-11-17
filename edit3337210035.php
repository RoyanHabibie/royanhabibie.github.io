<?php
// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $kelas = $_POST['kelas'];
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
    $link_foto = $_POST['link_foto'];

    // query
    $sql = "UPDATE about, interests, awards, skills, users SET
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
    awards.award = '$award',
    interests.interest = '$interest',
    skills.skill = '$skill',
    about.link_foto = '$link_foto'
    WHERE about.nim = 3337210035 AND interests.nim = about.nim  AND awards.nim = about.nim AND skills.nim = about.nim AND users.nim = about.nim
";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah

}


$sql = "SELECT * FROM users WHERE nim=3337210035";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$nim = $row["nim"];
$kelas = $row["kelas"];

// update user data about
$sql = "SELECT * FROM about WHERE nim=3337210035";
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
$link_foto = $row["link_foto"];

//awards
$sql = "SELECT * FROM awards WHERE nim=3337210035";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=3337210035";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=3337210035";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$skill = $row["skill"];

?>
<html>

<html class="no-js" lang="en">
<head>
    <title>Edit User Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"></link>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <style>
        body {
            background: #0d6efd;
            background: -webkit-linear-gradient(to top, #ffc107, #198754);
            background: linear-gradient(to top, #dc3545, #20c997);
        }
        .container {
            max-width: 550px;
        }
        .has-error label,
        .has-error input,
        .has-error textarea {
            color: red;
            border-color: red;
        }
        .list-unstyled li {
            font-size: 13px;
            padding: 4px 0 0;
            color: red;
        }
    </style>
</head>
<body>
    <a class="btn btn-primary" href="../index.php">Go to Home</a>
    <br /><br />

    <form method="post" action='edit33372100.php' enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?= $nim ?> disabled></td>
            </tr>
            <tr>
                <td>first name</td>
                <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas ?>" required></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required></td>
            </tr>
            <tr>
                <td>about</td>
                <td><textarea type="textarea" class="form-control" id="about" name="about" required><?= $about ?></textarea></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required></td>
            </tr>
            <tr>
                <td>link_in</td>
                <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></td>
            </tr>
            <tr>
                <td>link_git</td>
                <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></td>
            </tr>
            <tr>
                <td>link_twit</td>
                <td><input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required></td>
            </tr>
            <tr>
                <td>link_fb</td>
                <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></td>
            </tr>
            <tr>
                <td>link_foto</td>
                <td> <input type="text" class="form-control" id="link_foto" name="link_foto" value="<?= $link_foto ?>" required>
                </td>
            </tr>
            <!-- Awards -->
            <tr>
                <td>award</td>
                <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
            </tr>

            <!-- Interest -->
            <tr>
                <td>interest</td>
                <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
            </tr>

            <!-- Skills -->
            <tr>
                <td>skill</td>
                <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
            </tr>
            <tr>
                <td>
                    <div class="text-center pt-2">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>


</body>

</html>
