<?php
$conn = mysqli_connect('localhost','root','hello','exam');
$email=$_GET["email"];
$exam=$_GET["exam"];

$query = "SELECT * FROM examregister WHERE email='$email' AND exam='$exam'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
    $registerno= $row["id"];
    $email= $row["email"];
    $candidate_name =$row["candidate_name"];
    $exam =$row["exam"];
    $mobile =$row["mobile"];
    $dob =$row["dob"]; 
    $gender=$row["gender"];
    $father=$row["father"];
    $aadhaar=$row["aadhaar"];
    $cast=$row["cast"]; 
    $religion =$row["religion"];
    $state =$row["state"]; 
    $photo = $row["photo"];
    $sign = $row["sign"];
}
#header("Content-Type: image/png");
#echo $registerno;
?>






<!DOCTYPE html>
<html>
<head>
  <script src="window.js"	></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>




<style>
div.polaroid {
  width: 50%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  margin-left: auto;
  margin-right: auto;
}

div.container {
  text-align: left;
  padding: 10px 20px;

}

.image {
height: 200px;
width: 150px;

}
p {
font-family: Arial, Helvectica, sans-serif;	
}
h2 {
	padding: 10px;
}


</style>

<body >
  <div id="form">
<center>
<h2 >Applied User Details</h2>
</center>

<div class="polaroid"  align="right">
<center><h2>  MORcube <?php echo $exam ?></h2>

<h2>Exam Date: 04/01/2016, <br>Place: VELLORE.</h2>
</center>
<?php
echo '<img alt="shah" class="image"  src="data:image/png;base64,'.base64_encode($photo).'"/>';
?>
  <div class="container">
  <p> <b>CANDIDATE NAME:</b> <?php echo $candidate_name ?></p>
    <p><b>REGISTER NO: </b><?php echo $registerno ?></p>
<p><b>FATHER NAME:</b> <?php echo $father ?></p>
<p><b>DOB:</b> <?php echo $dob ?></p>
  <p><b>CASTE:</b> <?php echo $cast ?></p>
  <p><b>RELIGION:</b> <?php echo $religion ?></p>
  <p><b>STATE:</b> <?php echo $state ?></p>
  <p><b>AADHAAR:</b> <?php echo $aadhaar ?></p>
  <p><b>MOBILE:</b> <?php echo $mobile ?></p>

<div align="right">
<h2>signature</h2>
<?php
echo '<img  src="data:image/png;base64,'.base64_encode($sign).'"/>';
?>
</div>
  </div>
</div>
</div>
<center>
<button style="padding: 10px;" id="download">
  DOWNLOAD  
</button>
</center>
<script>

</script>


</body>
</html>



