<?php
session_start();
if (isset($_POST['inputBtn'])) {
    require 'dbhandler.mat.php';

    $judul = $_POST['inputJudul'];
    $kategor = $_POST['kategori'];
    $kategori = (int)$kategor;
    $lokasi = $_POST['inputLokasi'];
    $notes = $_POST['inputNotes'];
    $tgl = $_POST['tanggal'];
    $genre = $_POST['inputGenre'];
    $user = $_SESSION['userSession'];

    if (empty($judul) || empty($kategori) || empty($lokasi) || empty($notes) || empty($genre)) {
        header("Location: ../inputStuff.php?error=emptyfields");
        exit();
    }
    else {
                $sq = "INSERT INTO `stuff_list` (`stuffID`, `kategoriID`, `judul`, `genre`, `lokasi`, `tanggalStuff`, `notes`) VALUES (NULL, '$kategori', '$judul', '$genre', '$lokasi' , '$tgl', '$notes');";
                mysqli_query($connect,$sq);
                $nextSQL = "INSERT INTO `user_stuff` (`stuffID`, `username`) VALUES (NULL, '$user');";
                mysqli_query($connect,$nextSQL);
                header("Location: ../inputStuff.php?success=ok");
                exit();
    }
}
