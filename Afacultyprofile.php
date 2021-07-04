<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$branch = $_POST['branch'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (!empty($first_name) || !empty($last_name) || !empty($gender)
|| !empty($branch) || !empty($email) || !empty($phone))
{
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "college_automation";

  #create connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect Error('.mysqli_connect_errorno().')'. mysqli_connect_error());
  }
  else{
    $SELECT = "SELECT email From add_facultyprofile Where email = ? Limit 1";
    $INSERT = "INSERT Into add_facultyprofile (first_name, last_name, gender, branch, email, phone)
    values(?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssi", $first_name, $last_name, $gender, $branch, $email, $phone);
      $stmt->execute();
      echo "New record inserted successfully";
    }
    else{
      echo "someone already added using this email";
    }
      $stmt->close();
      $conn->close();
  }
}
else{
  echo "All field are required";
  die();
}

 ?>
