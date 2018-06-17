<?php
  //Make variables
  if(isset($_POST['name'])){
    $name = $_POST['name'];
  }
  if(isset($_POST['email'])){
    $email =$_POST['email'];
  }
  if(isset($_POST['guest'])){
    $guest = $_POST['guest'];
  }
  if(isset($_POST['message'])){
    $message = $_POST['message'];
  }
  if(isset($_POST['attend'])){
    $attend = $_POST['attend'];
  }


  $servername = "127.0.0.1";
  $username = "root";
  $password = "Wedding$1234";
  $dbname = "rsvp";

  //Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO rsvp (guest_name, email, guest,attend,message)
        VALUES ('$name', '$email', '$guest','$attend','$message')";

  #$return = new stdClass;
  if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
    $response_array['status'] = 'success';
    echo json_encode($response_array);
  } else {
    echo "Error: " . $sql . mysqli_error($conn);
    $response_array['status'] = 'error';
    echo json_encode($response_array);
  }

  ?>
