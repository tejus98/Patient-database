<html>
<head>
<?php

$Connection = mysqli_connect("localhost","root","", "Patient");
if(mysqli_connect_errno())
{
  echo 'Failed to Connect To Database \n';
}
else
{
  echo 'Connection Successful'.'<br>';
}


extract($_POST);
if($sub=='Submit')
{

  $IQuery = "Insert into Patient Values('".$Fname."','".$Lname."','".$DOB."',".$Age.",'".$Sex."','".$PNo."','".$Message."')";
  $Valid = mysqli_query($Connection, $IQuery);

  $Query="Select * from Patient";
  $Res = mysqli_query($Connection, $Query);


  if((mysqli_num_rows($Res)>0))
  {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Age</th><th>Gender</th><th>Phone Number</th><th>Message</th></tr>";
    while($row=mysqli_fetch_assoc($Res))
    {
      echo "<tr><td>".$row["First_Name"]."</td><td>".$row["Last Name"]."</td><td>".$row['Date of Birth']."</td><td>".$row["Age"]."</td><td>".$row["Gender"]."</td><td>".$row["Phone Number"]."</td><td>".$row["Message"]."</td></tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "0 Results";
  }
}

else
{
  $Query = "SELECT * FROM Patient WHERE First_Name like '".$Fname."'";
  $Res = mysqli_query($Connection, $Query);

  if((mysqli_num_rows($Res)>0))
  {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Age</th><th>Gender</th><th>Phone Number</th><th>Message</th></tr>";
    while($row=mysqli_fetch_assoc($Res))
    {
      echo "<tr><td>".$row["First_Name"]."</td><td>".$row["Last Name"]."</td><td>".$row['Date of Birth']."</td><td>".$row["Age"]."</td><td>".$row["Gender"]."</td><td>".$row["Phone Number"]."</td><td>".$row["Message"]."</td></tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "0 Results";
  }

}
  mysqli_close($Connection);

?>
</head>
<body>
  <br /><br /><br />
  <form action = "Q1.php" method ="POST">

    <label>Search <input type="text" name="Fname" id ="I1"></label><br/><br/><br/>
    <input type="submit" name="sub" value="Search"/><br/><br/>

	</form><br/>
</body>
</html>
