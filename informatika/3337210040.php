<?php

// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
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
    WHERE about.nim = 3337210040 AND interests.nim = about.nim  AND awards.nim = about.nim AND skills.nim = about.nim AND users.nim = about.nim
";
    $query = mysqli_query($conn, $sql);


}


$sql = "SELECT * FROM users WHERE nim=3337210040";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$nim = $row["nim"];
$kelas = $row["kelas"];

// update user data about
$sql = "SELECT about.*, users.nama, users.kelas FROM about INNER JOIN users WHERE about.nim=3337210040 AND users.nim=3337210040";
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
$sql = "SELECT * FROM awards WHERE nim=3337210040";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=3337210040";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=3337210040";
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
   <style>
      html, body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: rgb(255, 255, 255);
      }
      h1 {
      margin: 0 0 20px;
      font-weight: 400;
      color: #ffffff;
      }
      p {
      margin: 0 0 5px;
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
      box-shadow: 0 2px 5px #ffffff; 
      background: #000000; 
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
      color: #ffffff;
      }
      button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #ffffff; 
      font-size: 16px;
      font-weight: 400;
      color: rgb(0, 0, 0);
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

  <body style="background-image : url('https://bnz06pap001files.storage.live.com/y4mG9qGlxowvYyhXXWuq7lOzIHHdEOC9-CKH2eaIJ0FM1knnOdlXgAesMe2sV8Te1ICOYFlgh5rzqRj6AA12Z8zlOFic1WlJQ9rzI0dgqcRCA5eFW8g9IpCK8rLHTOQi5jdOmkV861KWwB5nItjEzcnjWAnVsOfjzNbuS0sCxc7kfdBp3F_-LO6xuOnqlV21aBb?width=2048&height=751&cropmode=none');"
   
      <div class="main-block"></div>
      <div class="center"></div>

      <form method="post" action='edit3337210040.php' enctype="multipart/form-data">

        <h1><b><center><p style="font-family: Gabriola">Edit Data User</center></b></h1>
        <td>
    
        <h2><p style="font-family: Gabriola" class="text-left">User</h2><hr class="garis_judul">

        <b>NIM<b>
        </td>
        <br>
        <br>
        <td>
        <input type="text" name="nim" value=<?= $nim ?> disabled></td>
          <td>

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

        <h2><p style="font-family: Gabriola" class="text-left">About Me</h2><hr class="garis_judul">

        <b>First Name<b>
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
            
        <b>Alamat<b>
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

        <b>Photo<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="link_foto" name="link_foto" value="<?= $link_foto ?>" required></td>
          <td>

        <br>

        <h2><p style="font-family: Gabriola" class="text-left">My Awards</h2><hr class="garis_judul">

        <b>Awards<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
          <td>

        <br>
        
        <h2><p style="font-family: Gabriola" class="text-left">My Interest</h2><hr class="garis_judul">

        <b>Interest<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
          <td>

        <br>

        <h2><p style="font-family: Gabriola" class="text-left">My Skills</h2><hr class="garis_judul">

        <b>Skills<b>
        </td>
        <br>
        <br>
        <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
          <td>

        </br>

        <button name="submit" name="submit"><b>Update!</b></button>

        <br>
        <br>

        <div><a class="btn btn-light" href="../index.php" style="color: #000000"><b>Back to Home</b></a></div> 

      </form>
    </div>
  </body>
</html>
