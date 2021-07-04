<?php
$Date1 = $_POST['Date1'];
$Varsha_kinge = $_POST['Varsha_kinge'];
$Snehal_suryavanshi = $_POST['Snehal_suryavanshi'];
$Niti_patel = $_POST['Niti_patel'];
$Rupali_patil = $_POST['Rupali_patil'];

if (!empty($Date1) || !empty($Varsha_kinge) || !empty($Snehal_suryavanshi) || !empty($Niti_patel)
|| !empty($Rupali_patil))
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
    $SELECT = "SELECT Date1 From add_facultyattendance Where Date1 = ? Limit 1";
    $INSERT = "INSERT Into add_facultyattendance (Date1, Varsha_kinge, Snehal_suryavanshi, Niti_patel, Rupali_patil)
    values(?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $Date1);
    $stmt->execute();
    $stmt->bind_result($Date1);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $Date1, $Varsha_kinge, $Snehal_suryavanshi, $Niti_patel, $Rupali_patil);
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
