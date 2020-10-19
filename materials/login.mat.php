<?php

if (isset($_POST['loginBtn'])) {

    require 'dbhandler.mat.php';
    $mail = $_POST['loginEmail'];
    $pswrd = $_POST['loginPassword'];
    
    if (empty($mail) || empty($pswrd)) {
        # code...
        header("Location: ../login.php?error=emptyfieldsLoginPage");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerrorLoginPage");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mail, $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($pswrd, $row['pass']);
                if ($passCheck == false ) {
                    header("Location: ../login.php?error=ErrorWrongPass");
                    exit();
                }
                elseif ($passCheck == true) {
                    #-------------Password Benar
                    session_start();
                    $_SESSION['userSession'] = $row['username'];
                    header("Location: ../index.php?Login=success!");
                    exit();
                }
                else {
                    header("Location: ../login.php?error=ErrorWrongPass");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=ErrorNouserFoundLoginPage");
                exit();
            }
        }
    }
}
else {
    header("Location: ../login.php");
    exit();
}