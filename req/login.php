<?php
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['password'])){
    include "../db_connector.php";

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname)){
        $em = "Matricola is Required";
        header("Location: ../templates/login.php?error=$em");
        exit;

    }else if (empty($password)){
        $em = "Password is required";
        header("Location: ../templates/login.php?error=$em");
        exit;

    }else{
        $sql = "SELECT * FROM users WHERE matricola='$uname' AND password='$password'";


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['matricola'] === $uname && $row['password'] === $password ) {
                $_SESSION['matricola'] = $row['matricola'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['id'] = $row['id'];
                header("Location: ../templates/home.php");
                exit();
            }else{
                $em = "Cannot Find User";
                header("Location: ../templates/login.php?error=$em");
                exit();
            }

        }else{
            $em = "Cannot Find User";
            header("Location: ../templates/login.php?error=$em");
            exit();
        }
    }


}else{
    header("Location: ../templates/login.php");
    exit;

}

