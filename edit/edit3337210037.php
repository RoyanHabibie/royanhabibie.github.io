<?php
// include database connection file
include_once("../config.php");
$nim = '3337210037';

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $fname = $_POST['nama-depan'];
    $lname = $_POST['nama-belakang'];
    $alamat = $_POST['alamat'];
    $tentang = $_POST['deskripsi-diri'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $link_in = $_POST['link-in'];
    $link_git = $_POST['link-git'];
    $link_twit = $_POST['link-twit'];
    $link_fb = $_POST['link-fb'];
    $link_foto = $_POST['foto-profil'];
    // $award = $_POST['award'];
    $interest = $_POST['ketertarikan'];
    // $skill = $_POST['kemampuan'];
    $add_skill = $_POST['kemampuan-baru'];
    $add_award = $_POST['awards-baru'];

    if ($add_skill != "") {
        // query add skill
        $sql = "INSERT INTO skills (nim, skill) VALUES ('$nim', '$add_skill')";
        $query = mysqli_query($conn, $sql);
    }
    if ($add_award != "") {
        // query add award
        $sql = "INSERT INTO awards (nim, award) VALUES ('$nim', '$add_award')";
        $query = mysqli_query($conn, $sql);
    }

    // $daptarr_skill = [];
    // $skills = mysqli_query($conn, "SELECT * FROM skills WHERE nim=$nim");
    // while ($data_skills = mysqli_fetch_array($skills)) {
    // $daptarr_skill = $data_skills['skill'];
    // if($skill != $daptarr_skill ){
    //     // query update skill
    //     $sql = "UPDATE skills SET skill = '$skill' WHERE nim = '$nim' AND skill = '$daptarr_skill'";
    //     $query = mysqli_query($conn, $sql);
    // }
    // }



    // query update
    $sql = "UPDATE about, interests, users SET
                about.fname = '$fname',
                about.lname = '$lname',
                about.alamat = '$alamat',
                about.about = '$tentang',
                users.kelas = '$class',
                users.email = '$email',
                about.email = '$email',
                about.link_in = '$link_in',
                about.link_git = '$link_git',
                about.link_twit = '$link_twit',
                about.link_fb = '$link_fb',
                about.link_foto = '$link_foto',
                interests.interest = '$interest'
                WHERE about.nim = $nim AND interests.nim = $nim AND users.nim = $nim
            ";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah
}

// Fetch user data based on id
$abouts = mysqli_query($conn, "SELECT * FROM about WHERE nim=$nim");
while ($about = mysqli_fetch_array($abouts)) {
    $nim = $about['nim'];
    $fname = $about['fname'];
    $lname = $about['lname'];
    $alamat = $about['alamat'];
    $tentang = $about['about'];
    $email = $about['email'];
    $link_in = $about['link_in'];
    $link_git = $about['link_git'];
    $link_twit = $about['link_twit'];
    $link_fb = $about['link_fb'];
    $link_foto = $about['link_foto'];
}

$skills = mysqli_query($conn, "SELECT * FROM skills WHERE nim=$nim");


$interests = mysqli_query($conn, "SELECT * FROM interests WHERE nim=$nim");
while ($data_interests = mysqli_fetch_array($interests)) {
    $interest = $data_interests['interest'];
}

$awards = mysqli_query($conn, "SELECT * FROM awards WHERE nim=$nim");

$users = mysqli_query($conn, "SELECT * FROM users WHERE nim=$nim");
while ($data_users = mysqli_fetch_array($users)) {
    $class = $data_users['kelas'];
    $name = $data_users['nama'];
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nauuu</title>
    <script>
        tailwind.config = {
            theme: {
                screens: {
                    'xs': '120px',
                    'sm': '640px',
                    'md': '768px',
                    'lg': '1024px',
                    'xl': '1280px',
                },
            }
        }
    </script>
</head>

<body>

    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!-- header start -->
    <header>
        <div class="bg-gray-900">
            <div class="max-w-7xl flex mx-auto py-6 px-3 sm:px-6 lg:px-8">
                <div class="w-1/2 shrink-0 flex flex-none flex-row">
                    <h1 class=" text-3xl font-bold text-white">
                        <?= $name ?>
                    </h1>
                </div>
                <div class="w-1/2 shrink-0 flex flex-none flex-row-reverse">
                    <a href="../index.php">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Home
                        </button>
                    </a>
                </div>

            </div>
            <div>

            </div>
        </div>
    </header>
    <!-- header end -->



    <!-- form start-->
    <div class="grid place-items-center h-fit">
        <form action="edit3337210037.php" method="POST">
            <div class="max-w-5x1">
                <div class="md:grid md:grid-cols-12 md:gap-5 mt-3">
                    <div class="lg:block xs:hidden mt-5 col-span-1 flex flex-none flex-col text-center">
                        <h2>P</h2>
                        <h2>E</h2>
                        <h2>R</h2>
                        <h2>F</h2>
                        <h2>E</h2>
                        <h2>C</h2>
                        <h2>T</h2>
                        <h2><br></h2>
                        <h2>R</h2>
                        <h2>E</h2>
                        <h2>S</h2>
                        <h2>P</h2>
                        <h2>O</h2>
                        <h2>N</h2>
                        <h2>S</h2>
                        <h2>I</h2>
                        <h2>V</h2>
                        <h2>E</h2>
                    </div>
                    <div class="mt-5 md:col-span-6 lg:col-span-5 md:mt-0">
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-3 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                        <div class="mt-1 flex rounded-md object-cover">
                                            <span
                                                class="inline-flex items-center rounded-l-md border border-transparent rounded-r-md bg-gray-50 px-4 text-sm ">3337210037</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 col-span-3 gap-3">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="nama-depan" class="block text-sm font-medium text-gray-700">Nama
                                            Depan</label>
                                        <input type="text" name="nama-depan" id="nama-depan" autocomplete="on"
                                            class="mt-1 block w-full rounded-md border border-zinc-300 shadow-sm sm:text-sm pl-1 py-1"
                                            placeholder="Nama Depan" value="<?= $fname ?>">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="nama-belakang" class="block text-sm font-medium text-gray-700">Nama
                                            Belakang</label>
                                        <input type="text" name="nama-belakang" id="nama-belakang" autocomplete="on"
                                            class="mt-1 block w-full rounded-md border border-zinc-300 shadow-sm sm:text-sm pl-1 py-1"
                                            placeholder="Nama Belakang" value="<?= $lname ?>">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                                    <div class="mt-1 flex items-center">
                                        <span
                                            class="shrink-0 inline-block h-16 w-16 overflow-hidden rounded-full bg-gray-100 ">
                                            <img src="<?= $link_foto ?>" alt="3337210037-1">
                                        </span>
                                        <label
                                            class="sm:shrink-1 lg:shrink-0 text-center ml-3 inline-flex justify-center rounded-md border border-transparent bg-gray-300 py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-offset-2"
                                            for="change-link">Link Foto</label>
                                        <input type="text" id="foto-profil" name="foto-profil" autocomplete="on"
                                            class="ml-2 rounded-md border border-zinc-300 w-full pl-1 pr-1 py-1"
                                            value="<?= $link_foto ?>">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="text" name="email" id="email" autocomplete="on"
                                        class="mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1"
                                        placeholder="Email" value="<?= $email ?>">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="class" class="block text-sm font-medium text-gray-700">Kelas</label>
                                    <input type="text" name="class" id="class" autocomplete="on"
                                        class="mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1"
                                        placeholder="class" value="<?= $class ?>">
                                </div>

                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <div class="mt-1">
                                        <textarea id="alamat" name="alamat" rows="3"
                                            class="mt-1 block w-full rounded-md border border-zinc-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-1 py-1"
                                            placeholder="Alamat"><?= $alamat ?></textarea>
                                    </div>
                                </div>

                                <div class='col-span-6 sm:col-span-3'>
                                    <label for='kemampuan' class='block text-sm font-medium
                                        text-gray-700'>Kemampuan</label>
                                    <?php
                                    while ($daftar_skill = mysqli_fetch_array($skills)) {
                                        echo "<input disabled type='text' name='kemampuan' id='kemampuan' autocomplete='on'
                                            class='mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1'
                                            placeholder='Kemampuan' value='$daftar_skill[skill]'>";
                                    }
                                    echo "<label for='kemampuan-baru'
                                        class='block text-sm font-medium text-gray-700'></label>";
                                    echo "<input type='text' name='kemampuan-baru' id='kemampuan-baru' autocomplete='on'
                                        class='mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1'
                                        placeholder='Tambahkan Kemampuan' value=''>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-5 md:col-span-6 lg:col-span-5 md:mt-0">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white space-y-2.5 px-4 py-5 sm:p-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="deskripsi-diri"
                                        class="block text-sm font-medium text-gray-700">Deskripsi Diri</label>
                                    <input type="text" name="deskripsi-diri" id="deskripsi-diri" autocomplete="on"
                                        class="mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1"
                                        placeholder="Deskripsi Diri" value="<?= $tentang ?>">
                                </div>

                                <div class="col-span-6 sm:col-span-3 mt-2">
                                    <label for="ketertarikan"
                                        class="block text-sm font-medium text-gray-700">Ketertarikan</label>
                                    <input type="text" name="ketertarikan" id="ketertarikan" autocomplete="on"
                                        class="mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1"
                                        placeholder="Ketertarikan" value="<?= $interest ?>">
                                </div>

                                <div class='col-span-6 sm:col-span-3 mt-2'>
                                    <label for='awards' class='block text-sm font-medium
                                        text-gray-700'>Awards & Certifications</label>
                                    <?php
                                    while ($daftar_awards = mysqli_fetch_array($awards)) {
                                        echo "<input disabled type='text' name='award' id='award'
                                            class='mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1'
                                            placeholder='Awards & Certifications' value='$daftar_awards[award]'>";
                                    }
                                    echo "<label for='awards-baru'
                                        class='block text-sm font-medium text-gray-700'></label>";
                                    echo "<input type='text' name='awards-baru' id='awards-baru' autocomplete='on'
                                        class='mt-1 block w-full rounded-md border border-zinc-300 sm:text-sm pl-1 py-1'
                                        placeholder='Tambahkan Awards & Certifications' value=''>";
                                    ?>
                                </div>

                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700">Link LinkedIn</label>
                                    <div class="mt-1 flex items-center">
                                        <svg class="w-6 h-6 text-blue-500 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                            </path>
                                        </svg>
                                        <input type="text" id="link-in" name="link-in" autocomplete="on"
                                            class="ml-2 rounded-md border border-zinc-300 w-full pl-1 pr-1 py-1"
                                            value="<?= $link_in ?>">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700">Link Github</label>
                                    <div class="mt-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="w-6 h-6">
                                            <path fill="currentColor"
                                                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                                        </svg>
                                        <input type="text" id="link-git" name="link-git" autocomplete="on"
                                            class="ml-2 rounded-md border border-zinc-300 w-full pl-1 pr-1 py-1"
                                            value="">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700">Link Twitter</label>
                                    <div class="mt-1 flex items-center">
                                        <svg class="w-6 h-6 text-blue-300 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                        <input type="text" id="link-twit" name="link-twit" autocomplete="on"
                                            class="ml-2 rounded-md border border-zinc-300 w-full pl-1 pr-1 py-1"
                                            value="">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label class="block text-sm font-medium text-gray-700">Link Facebook</label>
                                    <div class="mt-1 flex items-center">
                                        <svg class="w-6 h-6 text-blue-600 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                        <input type="text" id="link-fb" name="link-fb" autocomplete="on"
                                            class="ml-2 rounded-md border border-zinc-300 w-full pl-1 pr-1 py-1"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                                <button type="submit" name="submit"
                                    class="w-96  inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>