<?php
    // require 'config.php';
    // if (isset($_POST["submit"])){
    //     $firstname = $_POST["Firstname"];
    //     $lastname = $_POST["Lastname"];
    //     $email = $_POST["Email"];
    //     $password = $_POST["Password"];
    //     $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE firstname = '$firstname' OR email = '$email'");
    //     if(mysqli_num_rows($duplicate) > 0){
    //         echo "<script> alert('Username or Email has already taken'); </script>";
    //     }
    //     else{
    //         if($password == $password){
    //             $query = "INSERT INTO tb_user VALUES('', '$firstname', '$lastname', '$email', '$password')";
    //             mysqli_query($conn,$query);
    //             echo "<script> alert('Registration Success'); </script>";
    //         }
    //     }
    // }
    $conn = mysqli_connect("localhost", "root", "", "reglog");
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO tb_user (firstname, lastname, email, password) values ('$firstname','$lastname','$email', '$password')";
        if ($conn->query($sql)){
            echo "New record is inserted successfully";
        }
        else{
            echo "Error: ".$sql ."<br>". $conn->error;

        }
        $conn->close();
    }
?>