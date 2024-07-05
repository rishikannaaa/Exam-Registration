<?php
$email=$_GET["email"];
$exams=array("GROUP1","GROUP2","GROUP3","GROUP4","GROUP5");
?>

<!DOCTYPE html>
<html>
<head>
	<title>MOR3 registration slide</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>


<style>
body {
margin: 0;
padding: 0;
background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}
nav {
width: 100%;
background: black;
overflow: auto;
}
ul {
padding: 0;
marging: 0 0 0 150px;
list-style: none; 
}
li {
float: right;
}
.logo img {
height: 50px;
width: 50px;
position: absolute;
margin-top: 15px;
margin-left: 10px;
}
nav a{
width: 100px;
display: block;
padding: 20px 15px;
text-decoration: none;
font-family: Arial;
color: #f2f2f2;
text-align: center;
}
</style>


<body>


<div class="logo"><a href="#"><img src="mor3.jpg"></a></div>
<nav>
<ul><li><a href="#"><?php echo $email?></a></ul>
</nav>




<div class="card">
 <table style="color: white;">
  <caption>Exam Dashboard</caption>
  <thead>
    <tr>
      <th scope="col">NAME OF POST & SERVICE
</th>
<th scope="col">APPLICATION SUBMISSION STARTING DATE	</th>
      <th scope="col">APPLICATION SUBMISSION ENDING DATE	</th>
      <th scope="col">Apply now</th>
      <th scope="col">CANDIDATE CORNER
</th>
    </tr>
  </thead>
  <tbody>




    <tr>
      <td data-label="Exams"><?php echo $exams[0] ?></td>
      <td data-label="Due Date">04/01/2016</td>
<td data-label="Due Date">04/01/2016</td>
      <td data-label="Apply now"><button onclick=applynow(0)>ApplyNow</button>
</td>
      <td data-label="View"><button onclick=view(0)>view</button></td>
    </tr>




    <tr>
      <td scope="row" data-label="Exams"><?php echo $exams[1] ?></td>
     <td data-label="Due Date">04/01/2016</td>
 <td data-label="Due Date">03/01/2016</td>
      <td data-label="Apply now"><button onclick=applynow(1)>ApplyNow</button>
</td>
      <td data-label="View"><button onclick=view(1)>view</button></td>
    </tr>






    <tr>
      <td scope="row" data-label="Exams"><?php echo $exams[2] ?></td>
<td data-label="Due Date">04/01/2016</td>
      <td data-label="Due Date">03/01/2016</td>
      <td data-label="Apply now"><button onclick=applynow(2)>ApplyNow</button>
</td>
      <td data-label="View"><button onclick=view(2)>view</button></td>
    </tr>






    <tr>
      <td scope="row" data-label="Exams"><?php echo $exams[3] ?></td>
<td data-label="Due Date">04/01/2016</td>
      <td data-label="Due Date">02/01/2016</td>
      <td data-label="Apply now"><button onclick=applynow(3)>ApplyNow</button>
</td>
      <td data-label="View"><button onclick=view(3)>view</button></td>
    </tr>





  </tbody>
</table>
  <div class="container">
    <h4><b></b></h4> 
    <p></p> 
  </div>
</div>

<?php
echo "<script>var mail='$email';</script>"
?>
<script>
function applynow(exam){
	var email=mail;
	const exams=["GROUP1","GROUP2","GROUP3","GROUP4","GROUP5"];
	window.location="apply_check.php?email="+email+"&exam="+exams[exam];
}
function view(exam){
  var email=mail;
	const exams=["GROUP1","GROUP2","GROUP3","GROUP4","GROUP5"];
	window.location="view_check.php?email="+email+"&exam="+exams[exam];
}
</script>

</body>
</html>




<?php

/*
foreach($exams as $exam){
	echo "<p>$exam</p>";
	$query = "SELECT * FROM examregister WHERE email='$email' AND exam='$exam'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)==0){
		echo '<button onclick=applynow("'.$email.'","'.$exam.'") >Apply Now</button>'; 
		
	}
	else{
		echo '<button onclick=view("'.$email.'","'.$exam.'") >View Form</button>'; 		
	}
	echo "<br><br>";
}
*/

?>