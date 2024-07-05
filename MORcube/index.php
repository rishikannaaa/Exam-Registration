<?php 
$signerr="";
$infocolor="green";
$logerr="";
if(isset($_POST['signup'])){
$email=$_POST["email"];
$password=$_POST["password"];
$conn = mysqli_connect('localhost','root','hello','exam');
if(!$conn){
$signerr="Error: Unable to connect DBServer";
$infocolor="red";
}
else{
    if (strlen($password)<8||strlen($password)>25){
        $signerr="PASSWORD MUST BE IN 8-25 LETTERS ";
        $infocolor="red";
    }
    else{
        try{
        $query = "INSERT INTO users (email,password) VALUES ('$email','$password');";
        $execute=mysqli_query($conn,$query);
        if($execute)
        $signerr="USERNAME CREATED SUCCESSFULLY";
        $infocolor="green";
        }
        catch(Exception $e){
            if($e->getCode()==1062)
                $signerr="USER ALREADY EXISTS";
            else{
                $signerr="EXCEPTION: something else";
             }
            $infocolor="red";
        }
    }
}
}
    if(isset($_POST['login'])){
        $email2=$_POST["email2"];
        $password2=$_POST["password2"];
        $conn = mysqli_connect('localhost','root','hello','exam');
        if(!$conn){
        $logerr="Error: Unable to connect DBServer";
        }
        else{
            $query = "SELECT * FROM users WHERE email='$email2' ";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row["password"]!=$password2)
                    $logerr= "Password Incorrect";
                    else
                    header("Location:dashboard.php?email=".$email2);
                }
            }
            else{
                $logerr="No such User";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>MOR3 registration slide</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>



<!--style>
body {
margin: 0;
padding: 0;
background: grey;
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
</style-->


<body>





	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form  method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="email" name="email" placeholder="Email" veet="">
					<input type="password" name="password" placeholder="Password" veet="">
					<button type="submit" name="signup">Sign up</button>
					<center>
                    <span style="color: <?php echo $infocolor; ?>; background-color:white;"> <?php echo $signerr;  ?> </span></center>
				</form>
			</div>

			<div class="login">
				<form  method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email2" placeholder="Email" veet="">
					<input type="password" name="password2" placeholder="Password" veet="">
					<button type="submit" name="login">Login</button><b>
                    <center><span style="color: red; background-color:white; "><?php echo $logerr; ?></span></center></b>
				</form>
			</div>
	</div>
</body>
</html>