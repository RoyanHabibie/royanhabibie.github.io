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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit CV Page</title>

		<!-- LINK BOOTSTRAP -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	    <!-- LINK JS -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

	    <!-- SweetAlert -->
    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600');

		body{
			background-color: #FCE2DB;
		}
		h1{
			color: #432C7A;
			font-family: 'Playfair Display', serif;
		}
		.kolom{
			color: #80489C;	
			font-family: 'Vidaloka', serif;
		}
		.btn_update{
		    height: 43px;
	        width: 40%;
	        border: 3px solid #FF8FB1;
	        outline: none;
	        background-color: #80489C;
	        color: white;
	        font-weight: 600;
	        border-radius: 10px;
	        float: right;
	    }
	    .btn_back{
	    	height: 43px;
	        width: 40%;
	        border: 3px solid #FF8FB1;
	        outline: none;
	        background-color: #80489C;
	        color: white;
	        font-weight: 600;
	        border-radius: 10px;
	        float: left;
	    }
	</style>
	
	<body>
		<div class="container">
			<div class="row my-3 text-center">
				<div class="col">
					<h1>Edit CV Page</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form class="kolom row g-3 mb-3" method="post" action='edit3337210004.php' enctype="multipart/form-data">
						<div class="col-md-6">
							<label for="firstname" class="form-label">First Name</label>
							<input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></input>
						</div>
            			<div class="col-md-6">
		          			<label for="alamat" class="form-label">Last Name</label>
			        		<input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></input>
			      		</div>
			      		<div class="col-md-6">
			        		<label for="lastname" class="form-label">Alamat</label>
              				<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required></input>
						</div>
						<div class="col-md-6">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required></input>
						</div>
						<div class="col-md-12">
							<label for="about" class="form-label">About Me</label>
							<input type="textarea" class="form-control" id="about" name="about" value="<?= $about ?>" required></input>
						</div>
						<div class="col-md-6">
							<label for="link_in" class="form-label">Linked in</label>
							<input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></input>
						</div>
						<div class="col-md-6">
							<label for="link_git" class="form-label">Link Github</label>
							<input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></input>
						</div>
						<div class="col-md-6">
							<label for="link_twit" class="form-label">Link Twitter</label>
							<input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required></input>
						</div>
						<div class="col-md-6">
							<label for="link_fb" class="form-label">Link Facebook</label>
							<input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></input>
						</div>
						<div class="col-md-12">
							<label for="award" class="form-label">Award</label>
							<input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></input>
						</div>
			      		<div class="col-md-12">
		          			<label for="interest" class="form-label">Interest</label>
	            			<input type="text" class="form-control" id="interes" name="interest" value="<?= $interest ?>" required></input>
			      		</div>
						<div class="col-md-12">
							<label for="skill" class="form-label">Skill</label>
							<input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></input>
						</div>
						<input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?>>
					</form>
					<button class="btn_back mb-3"><a href='../index.php' class="text-white"><i class="fas fa-edit"></i>Go To Home</a></button>
					<button class="btn_update mb-3" type="submit" name="submit"><i class="fas fa-edit"></i>Update</button>
				</div>
			</div>
		</div>
	</body>
</html>
