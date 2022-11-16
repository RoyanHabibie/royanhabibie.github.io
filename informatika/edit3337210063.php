<?php

// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['submit'])) {

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
  $link_foto = $_POST['link_foto'];

// update user data
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
    about.link_foto = '$link_foto'
    WHERE about.nim = 3337210063 AND interests.nim = about.nim  AND awards.nim = about.nim AND skills.nim = about.nim AND users.nim = about.nim
";
$query = mysqli_query($conn, $sql);

// checking query

}


$sql = "SELECT * FROM users WHERE nim=3337210063";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$nim = $row["nim"];
$kelas = $row["kelas"];

// update user data about
$sql = "SELECT * FROM about WHERE nim=3337210063";
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
$sql = "SELECT * FROM awards WHERE nim=3337210063";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=3337210063";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=3337210063";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$skill = $row["skill"];

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Data</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&display=swap" rel="stylesheet">

   <style>
    .html, body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-size: 14px;
      color: rgb(255, 255, 255);
      }

    .h1 {
      margin: 0 0 20px;
      font-weight: 400;
      color: #ffffff;
      }

    .p {
      margin: 0 0 5px;
      }

    .font{
      font-family: "Sofia", sans-serif;
      font-size: 45px;
      }
    
    .bag{
      font-family: 'Bitter', serif;
    }
    .isi{
        font-family: "Trirong", serif;
    }

    .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      }
      form {
      padding: 25px;
      margin: 25px;
      box-shadow: 0 2px 5px #71bfe6; 
      background: #39aaaa; 
      }
      .fas {
      margin: 25px 10px 0;
      font-size: 72px;
      color: #fff;
      }
      .fa-envelope {
      transform: rotate(-20deg);
      }
      .fa-at , .fa-mail-bulk{
      transform: rotate(10deg);
      }
      input, textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ffffff;
      outline: none;
      }
      input::placeholder {
      color: rgb(0, 0, 0);
      }
      button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #108372; 
      font-size: 16px;
      font-weight: 400;
      color: #ffffff;
      }
      button:hover {
      background: #a5a5a5;
      }   

      @media (min-width: 568px) {
      .main-block {
      flex-direction: row;
      }
      .left-part, form {
      width: 50%;
      }
      }
    </style>
  </head>

  <body style="background-image : url('https://i.postimg.cc/nrPpZbDH/images.png');"
   
    <div class="main-block"></div>
      <div class="center"></div>

      <form method="post" action="edit3337210063.php" enctype="multipart/form-data">
 

        <h1 class="font"><b><center>EDIT DATA USER</center></b></h1>
        <td>

        <h2 class="bag"><center>User</center></h2><hr class="garis_judul">
        <div class="isi"><tr>
            <td>NIM</td>
            <td><input type="text" name="nim" value=<?= $nim ?> disabled></td>
        </tr>

        <b>Name<b>
        </td>
        <br>
        <br>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $fname, $lname ?>" required></input>
          <td>

        <b>Class<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas ?>" required></td>
          <td>
        
        <br>

        <h2 class="bag"><center>About Me</center></h2><hr class="garis_judul">
        <b> First Name<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></td>
          <td>

        <b>Last Name<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></td>
          <td>
        
        <tr>
            <td>Class</td>
            <td><input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas ?>" required></td>
        </tr>

        <b>Address<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required></td>
          <td>
       
        <b>About<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="about" name="about" value="<?= $about ?>" required></td>
          <td>

        <b>Email<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required></td>
          <td>

        <b>Linkedln<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></td>
          <td>

        <b>Github<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></td>
          <td>

        <b>Twitter<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required></td>
          <td>

        <b>Facebook<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></td>
          <td>

        <tr>
            <td>Link Foto</td>
            <td> <input type="text" class="form-control" id="link_foto" name="link_foto" value="<?= $link_foto ?>" required>
            </td>
        </tr>

        <h2 class="bag"><center>My Awards</center></h2><hr class="garis_judul">
        <b>Awards<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
          <td>

        <h2 class="bag"><center>My Interest</center></h2><hr class="garis_judul">
        <b>Interest<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
          <td>

        <h2 class="bag"><center>My Skills</center></h2><hr class="garis_judul">
        <b>Skills<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
          <td>

        <br>
        <button name="submit" name="submit"><b>Update</b></button>

        <br>
        <br>
        <div><center><a class="btn btn-light" href="../index.php" style="color: #4b9cc2"><b>Back to Home</b></a><center></div>
      </form>
    </div>
  </body>
</html>
