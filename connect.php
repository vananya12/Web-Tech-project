<?php
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $cnumber = $_POST['cnumber'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $usrname = $_POST['usrname'];
    $psw = $_POST['psw'];

    //Database connection
    $conn = new mysqli('localhost','root','ananya');
    if($conn->connect_error){
        die('connection failed:' .$conn->connect_error);
    }
    else{
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO users (name, fname, mname, dob, gender, address, contact, cnumber, email, usrname, psw, course) VALUES (:name, :fname, :mname, :dob, :gender, :address, :contact, :cnumber, :email, :usrname, :psw, :course)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':mname', $mname);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $phone);
        $stmt->bindParam(':cnumber', $altphone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usrname', $usrname);
        $stmt->bindParam(':psw', $password);
        $stmt->bindParam(':course', $course);
        $stmt->execute();

        echo 'Registration successful!';

        $stmt->close();
        $conn->close();
    }
?>