<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student Profile</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="/assets/favicon.ico">
  <link rel="stylesheet" href="/assets/dcode.css">
  <link rel="stylesheet" href="Efacultyattendance.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  td{
    border: 2px solid black;
    width: auto;
    background-color:  #413C57;
    color: white;
  }
  .button{
    background-color: #413C57;
    color: white;
    border: 2px solid black;
    width: auto;
  }
  .button a{
    text-decoration: none;
    color: white;

  }
  </style>
</head>

<body>

  <div class="menu-bar">
<ul>
   <li><a href="home.html"><i class="fa fa-home"></i>Home</a></li>
   <li><a href="#Student profile"><i class="fa fa-graduation-cap"></i>Student Profile</a>
   <div class="menu1">
     <ul>
   <li><a href=Astudentprofile.html><i class="fa fa-address-book"></i>Add Student Profile</a></li>
   <li><a href="Vstudentprofile.php"><i class="fa fa-address-book"></i>View Student Profile</a></li>
   <li><a href="Estudentprofile.php"><i class="fa fa-address-book"></i>Edit Student Profile</a></li>
 </ul>
   </div>
 </li>
   <li><a href="#faculty Profile"><i class="fa fa-users"></i>Faculty Profile</a>
   <div class="menu2">
     <ul>
   <li><a href="Afacultyprofile.html"><i class="fa fa-address-book"></i>Add Faculty Profile</a></li>
   <li><a href="Vfacultyprofile.php"><i class="fa fa-address-book"></i>View Faculty Profile</a></li>
   <li><a href="Efacultyprofile.php"><i class="fa fa-address-book"></i>Edit Faculty Profile</a></li>
 </ul>
   </div>
 </li>
   <li><a href="#Faculty attendance"><i class="fa fa-address-book"></i>Faculty Attendance</a>
<div class="menu3">
  <ul>
<li><a href="Afacultyattendance.html"><i class="fa fa-address-book"></i>Add Attendance</a></li>
<li><a href="Vfacultyattendance.php"><i class="fa fa-address-book"></i>View Attendance</a></li>
<li><a href="Efacultyattendance.php"><i class="fa fa-address-book"></i>Edit Attendance</a></li>
</ul>
</div>
</li>
</ul>
</div>

<center>
<h1>Edit Faculty attendance </h1><br>
<div class="container">
<form action="" method="POST">
<input type="text" name="id" class="btn" placeholder="Enter Faculty Id" />
<input type="submit" name="search" class="btn" value="SEARCH BY ID">
</form><br><br>
<table>
<tr>
   <th>Date1</th>
   <th>Varsha_kinge</th>
   <th>Snehal_suryavanshi</th>
   <th>Niti_patel</th>
   <th>Rupali_patil</th>
   <th>Operation</th>
</tr><br>
<?php
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, 'college_automation');

if(isset($_POST['search']))
{
  $id = $_POST['id'];

  $query = "SELECT * FROM  add_facultyattendance where id='$id' ";
  $query_run = mysqli_query($conn,$query);

  while($row = mysqli_fetch_array($query_run))
  {
    ?>
    <tr>
         <td> <?php echo $row['Date1']; ?> </td>
         <td> <?php echo $row['Varsha_kinge']; ?> </td>
         <td> <?php echo $row['Snehal_suryavanshi']; ?> </td>
         <td> <?php echo $row['Niti_patel']; ?> </td>
         <td> <?php echo $row['Rupali_patil']; ?> </td>
         <td class="button"><a href ='Ufacultyattendance.php?d=$row[Date1] & v=$row[Varsha_kinge] & s=$row[Snehal_suryavanshi]
           & n=$row[Niti_patel] & r=$row[Rupali_patil]'> Edit </td>
    </tr>
    <?php
  }
}
?>
</table>
</div>
</center>
</body>
</html>
