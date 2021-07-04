<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faculty Profile</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="/assets/favicon.ico">
  <link rel="stylesheet" href="/assets/dcode.css">
  <link rel="stylesheet" href="Efacultyprofile.css">
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
<h1>Edit Faculty details </h1><br>
<div class="container">
<form action="" method="POST">
<input type="text" name="id" class="btn" placeholder="Enter Faculty Id" />
<input type="submit" name="search" class="btn" value="SEARCH BY ID">
</form><br><br>
<table>
<tr>
   <th>First_name</th>
   <th>Last_name</th>
   <th>Gender</th>
   <th>Branch</th>
   <th>Email</th>
   <th>Phone no</th>
   <th>Operation</th>
</tr><br>
<?php
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, 'college_automation');

if(isset($_POST['search']))
{
  $id = $_POST['id'];

  $query = "SELECT * FROM  add_facultyprofile where id='$id' ";
  $query_run = mysqli_query($conn,$query);

  while($row = mysqli_fetch_array($query_run))
  {
    ?>
    <tr>
         <td> <?php echo $row['first_name']; ?> </td>
         <td> <?php echo $row['last_name']; ?> </td>
         <td> <?php echo $row['gender']; ?> </td>
         <td> <?php echo $row['branch']; ?> </td>
         <td> <?php echo $row['email']; ?> </td>
         <td> <?php echo $row['phone']; ?> </td>
         <td class="button"><a href ='Ufacultyprofile.php?fn=$row[first_name] & ln=$row[last_name] & g=$row[gender]
           & b=$row[branch] & e=$row[email] & p=$row[phone]'> Edit </td>
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
