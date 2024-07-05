<?php
$email=$_GET["email"];
$exam=$_GET["exam"];
$conn = mysqli_connect('localhost','root','hello','exam');

$query = "SELECT * FROM examregister WHERE email='$email' AND exam='$exam'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0){
    #echo '<button onclick=applynow("'.$email.'","'.$exam.'") >Apply Now</button>'; 
    header("Location:view_error.php");
}
else{
    #echo '<button onclick=view("'.$email.'","'.$exam.'") >View Form</button>'; 		
    header("Location:view.php?email=".$email."&exam=".$exam);
}

?>