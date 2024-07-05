<?php
$error="";
if(isset($_POST['submit'])){
    $error="";
    $conn = mysqli_connect('localhost','root','hello','exam');
    $email=$_GET["email"];
    $candidate_name=$_POST["candidate_name"];
    $exam=$_GET["exam"];
    $dob = new DateTime($_POST["dob"]);
    $today = new DateTime(date("Y-m-d"));
    $interval=$today->diff($dob);
    if ($interval->y<17)
    $error="You should be atleast 17 to write this exam";
    if(strlen((string)$_POST["mobile"])==10)
    $mobile=$_POST["mobile"]; 
    else $error="Invalid Mobile Number";
    $dob=$_POST["dob"];
    $gender=$_POST["gender"]; 
    $father=$_POST["father"]; 
    if(strlen((string)$_POST["aadhaar"])==12)
    $aadhaar=$_POST["aadhaar"];
    else $error="Invalid Aadhaar Number";
    $cast=$_POST["cast"];
    $religion=$_POST["religion"]; 
    $state=$_POST["state"];
    #$bfile=fopen($_FILES["fileinput"],"rb");
    $photo= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $sign= addslashes(file_get_contents($_FILES['sign']['tmp_name']));
    if(strlen($error)==0){
    if(!$conn){
        $suberr="Error: Unable to connect DBServer";
    }
    else{
        $query="INSERT INTO EXAMREGISTER(
            email,candidate_name, exam,mobile, dob,gender, father, aadhaar,
            cast,religion, state,photo,sign)VALUES('$email','$candidate_name', 
            '$exam','$mobile', '$dob','$gender', '$father', '$aadhaar',
            '$cast', '$religion', '$state','$photo','$sign')";
    try{
        $execute=mysqli_query($conn,$query);
        header("Location:success.php?exam=".$exam);
        }
        catch(Exception $e){
            if($e->getCode()==1062)
                $error="ALREADY REGISTER ";
            else
                $error="EXCEPTION: something else";
                $error=$e;
        }
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width",initial-scale=1.0>
<title>document</title>
<link rel="stylesheet" href="apply.css"/>
</head>



<style>
body {
margin: 0;
padding: 0;
background: ;
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
<ul><li><a href="#"><?php echo $_GET["email"]; ?></a></ul>
</nav>


<form method="post" enctype="multipart/form-data" >
<div class='container'><div>
<h1 align="center" style="color:white">Register for <?php echo $_GET["exam"]; ?></h2>

</div><hr/>
<label for="fn"><b>Name</b></lable><br>
<input type="text" placeholder="name" name="candidate_name" id="fn" required/><br>
<label for="fn"><b>Father Name</b></lable><br>
<input type="text" placeholder="father name" name="father" id="fn" required/><br>
<label for="dob"><b>dob</b></lable>
<input type="date" value="2017-06-01" name="dob" id="dob" required/>
<input type="radio"  name="gender" id="gen" value="male" required/>male
<input type="radio"  name="gender" id="gen" value="female" required/>female
<br>
<br>

<label for="cast"><b>cast</b></lable>
<select name="cast" id="cast" required/>
<option value=' OC '> OC </option>
<option value=' BC '> BC </option>
<option value=' MBC '> MBC </option>
<option value=' SC '> SC </option>
<option value=' ST '> ST </option>
<option value=' Others '> Others </option>
</select>
<br><br>

<label for="re"><b>religion</b></lable><br>
<input type="text" placeholder="religion" name="religion" id="re" required/>
<br>



<label for="st"><b>state</b></lable>
<select name="state" id="st" required/>
<option value=' Andra Pradesh '> Andra Pradesh </option>
<option value=' Arunachal Pradesh '> Arunachal Pradesh </option>
<option value=' Assam '> Assam </option>
<option value=' Bihar '> Bihar </option>
<option value=' Chhattisgarh '> Chhattisgarh </option>
<option value=' Goa '> Goa </option>
<option value=' Gujarat '> Gujarat </option>
<option value=' Haryan '> Haryan </option>
<option value=' Himachal Pradesh '> Himachal Pradesh </option>
<option value=' Jharkhand '> Jharkhand </option>
<option value=' Karnataka '> Karnataka </option>
<option value=' Kerala '> Kerala </option>
<option value=' Madhya Pradesh '> Madhya Pradesh </option>
<option value=' Maharashtra '> Maharashtra </option>
<option value=' Manipur '> Manipur </option>
<option value=' Meghalaya '> Meghalaya </option>
<option value=' Mizoram '> Mizoram </option>
<option value=' Nagaland '> Nagaland </option>
<option value=' Odisha '> Odisha </option>
<option value=' Punjab '> Punjab </option>
<option value=' Rajasthan '> Rajasthan </option>
<option value=' Sikkim '> Sikkim </option>
<option value=' Tamil Nadu '> Tamil Nadu </option>
<option value=' Telangana '> Telangana </option>
<option value=' Tripura '> Tripura </option>
<option value=' Uttar Pradesh '> Uttar Pradesh </option>
<option value=' Uttarakhand '> Uttarakhand </option>
<option value=' West Bengal '> West Bengal </option>
</select>
<br><br>







<label for="an"><b>aadhaar</b></lable><br>
<input type="text" placeholder="aadhar number" name="aadhaar" id="an" required/>
<br>
<label for="mn"><b>mobile</b></lable>
<br>
<input type="text" placeholder="mobile number" name="mobile" id="mn" required/>
<br>
<p><b>UPLOAD YOUR PHOTO <h style="color: #000066">.....................................................</h>UPLOAD YOUR SIGNATURE</b><br> (note: width: 35mm,height: 45mm)<h style="color: #000066">...........................................</h>(note: width: 40mm,height: 20mm)</p>
<input type="file" id="my file" name="photo" accept="image/png,image/jpeg" required/><h style="color: #000066">...................................</h><input type="file" id="my file" name="sign" accept="image/png,image/jpeg" required/>
<!--p><b>UPLOAD YOUR SIGNATURE</b><br> (note: width: 40mm,height: 20mm)</p>
<input type="file" id="my file" name="sign" accept="image/png,image/jpeg" required/-->
<br>
<span style="color: red; background-color:white; padding: ; "> <?php echo $error; ?></span><br><br>
<button class='submitbtn' name="submit" type='submit'>submit</button>
</form></div></body></html>