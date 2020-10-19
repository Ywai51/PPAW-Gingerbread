<?php

if (isset($_POST['registerBtn'])) {
    require 'dbhandler.mat.php';

    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $password2 = $_POST['registerPassword2'];
    $roleID = rand(1, 11);
    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        header("Location: ../login.php?error=emptyfields&registerUsername=".$username."&registerEmail=".$email);
        exit();
    }
    elseif ($password2 !== $password) {
        header("Location: ../login.php?error=passwordcheck&registerUsername=".$username."&registerEmail=".$email);
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../login.php?error=takenUser");
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, pass, email, roleID) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashPass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssi", $username, $hashPass, $email, $roleID );
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
else {
    header("Location: ../login.php");
}