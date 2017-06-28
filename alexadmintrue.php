<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>


<?php 






session_start();
if(!isset($_SESSION['access']) || $_SESSION['access']!=true){
header("location:alexadmin.php");}
else{ ?>


 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "slingsait";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else {
//echo "connecion sucsessful";
}

$link = mysqli_connect("localhost", "root", "", "slingsait");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = rand(7,40);

//$sql = "INSERT INTO slings (id, name, weight, capacity, ties, timeout, shape) VALUES ('$id', 'Parker', '3', '6', '1', '0', '1')";

	
	
if($_SERVER['REQUEST_METHOD'] == 'POST')

	{
	     $next= $_SESSION['done'] = $_POST['done'];


		if(isset($next))
		{

		
			if(isset($_POST['name']) &&  !empty($_POST['name']) && isset($_POST['age']) &&  !empty($_POST['age']) && isset($_POST['weight']) &&  !empty($_POST['weight']) && isset($_POST['knot']) &&  !empty($_POST['knot']) && isset($_POST['slingtime']) && !empty($_POST['slingtime'])  && isset($_POST['shape']) && !empty($_POST['shape']) && isset($_POST['volume']) && !empty($_POST['volume']) && isset($_POST['backpain']) &&  !empty($_POST['backpain']) && isset($_POST['chilphisprob']) &&  !empty($_POST['chilphisprob']))
			{
				$name = $_POST['name'];
				if ($_POST['age'] == '<6m'){$age = 0;}	else {$age = 0.5;}
				if ($_POST['weight'] == '<5'){$weight = 3;} else {$weight = 6;}
				if ($_POST['volume'] == 'small'){$capacity = 0;}else{$capacity = 1;}
				if ($_POST['knot'] == 'yes'){$ties = 1;}else{$ties = 0;}
				if ($_POST['slingtime'] == 'quick'){$timeout = 0;}else{$timeout = 1;}
				if ($_POST['shape'] == 'shivti'){$shape = 1;}else{$shape= 2;}
				if ($_POST['backpain'] == 'yes'){$backpain = 0;}else{$backpain = 1;}
				if ($_POST['chilphisprob'] == 'yes'){$chilphisprob = 1;}else{$chilphisprob=0;}
	
	
	
				$sql = "INSERT INTO slings(id, name, age, weight, capacity, ties, timeout, shape) VALUES ('$id', '$name', '$age', '$weight', '$capacity', '$ties', '$timeout', '$shape')";
	if(mysqli_query($link, $sql))
	{
		echo "sling added successfully.";
			}
	else
	{echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
	
				$sql = "INSERT INTO clientchoise (name, backpain, childphisprob) VALUES ('$name', '$backpain', '$chilphisprob')";
				if(mysqli_query($link, $sql))
	{
	echo "slingclient added successfully.";
			}
	else
	{echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}
	

				header('location:alexadmintrue2.php');
				exit();
			}
			else
			{
				header('location:error.php');
				exit();
			}
		}	
	}

	?>




<?php } ?>

<form method="post" >

			<label>name:</label>
			<input type="text" name="name" placeholder="name of new sling" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>"/><span style="color:red">*</span>
			<br/><br/>			
												    <!--this line maintains the value entered-->
			<label>for which age?</label> 
			<input type="radio" name="age" value="<6m" <?php if(isset($_SESSION['age']) && $_SESSION['age'] == '<6m'){echo "checked='checked'";} ?> />  <6m 
																		<!--keeps it checked-->
			<input type="radio" name="age" value=">6m" <?php if(isset($_SESSION['age']) && $_SESSION['age'] == '>6m'){echo "checked='checked'";} ?>/>  >6m<span style="color:red">*</span>
			<br/><br/>
			
												<!--this line maintains that value entered--> 
			<label>for which weight:</label> 
			<input type="radio" name="weight" value="<5" <?php if(isset($_SESSION['weight']) && $_SESSION['weight'] == '<5'){echo "checked='checked'";} ?> />  <5kg 
																		<!--keeps it checked-->
			<input type="radio" name="weight" value=">5" <?php if(isset($_SESSION['weight']) && $_SESSION['weight'] == '>5'){echo "checked='checked'";} ?>/>  >5kg<span style="color:red">* </span>
			<br/><br/>

			<label>have ties?</label>
			<br/><br/>
			<input type="radio" name="knot" value="yes" <?php if(isset($_SESSION['knot']) && $_SESSION['knot'] == 'yes'){echo "checked='checked'";} ?> />  yes
					<br/><br/>													<!--keeps it checked-->
			<input type="radio" name="knot" value="no" <?php if(isset($_SESSION['knot']) && $_SESSION['knot'] == 'no'){echo "checked='checked'";} ?>/>  no<span style="color:red">* </span>
			<br/><br/>

			<label>time of wearing</label>
			<br/><br/>
			<input type="radio" name="slingtime" value="quckly" <?php if(isset($_SESSION['slingtime']) && $_SESSION['slingtime'] == 'quick'){echo "checked='checked'";} ?> />  quick
						<br/><br/>												<!--keeps it checked-->
			<input type="radio" name="slingtime" value="long" <?php if(isset($_SESSION['slingtime']) && $_SESSION['slingtime'] == 'long'){echo "checked='checked'";} ?>/> long <span style="color:red">* </span>
			<br/><br/>

			<label>which shape?</label>
			<br/><br/>
			<input type="radio" name="shape" value="shivti" <?php if(isset($_SESSION['shape']) && $_SESSION['shape'] == 'shivti'){echo "checked='checked'";} ?> /> shivti
						<br/><br/>												<!--keeps it checked-->
			<input type="radio" name="shape" value="maaravit" <?php if(isset($_SESSION['shape']) && $_SESSION['shape'] == 'maaravit'){echo "checked='checked'";} ?>/>  maaravit <span style="color:red">* </span>
			<br/><br/>

			<label>which volume?</label>
			<br/><br/>
			<input type="radio" name="volume" value="small" <?php if(isset($_SESSION['volume']) && $_SESSION['volume'] == 'small'){echo "checked='checked'";} ?> />  small
								<br/><br/>										<!--keeps it checked-->
			<input type="radio" name="volume" value="nomether" <?php if(isset($_SESSION['volume']) && $_SESSION['volume'] == 'big'){echo "checked='checked'";} ?>/>  big <span style="color:red">* </span>
			<br/><br/>
			
			<label>good for backpain?</label>
			<br/><br/>
			<input type="radio" name="backpain" value="yes" <?php if(isset($_SESSION['backpain']) && $_SESSION['backpain'] == 'yes'){echo "checked='checked'";} ?> />  yes
					<br/><br/>													<!--keeps it checked-->
			<input type="radio" name="backpain" value="no" <?php if(isset($_SESSION['backpain']) && $_SESSION['backpain'] == 'no'){echo "checked='checked'";} ?>/>  no<span style="color:red">* </span>
			<br/><br/>
			
			<label>good for child with phisical problems?</label>
			<br/><br/>
			<input type="radio" name="chilphisprob" value="yes" <?php if(isset($_SESSION['chilphisprob']) && $_SESSION['chilphisprob'] == 'yes'){echo "checked='checked'";} ?> />  yes
					<br/><br/>													<!--keeps it checked-->
			<input type="radio" name="chilphisprob" value="no" <?php if(isset($_SESSION['chilphisprob']) && $_SESSION['chilphisprob'] == 'no'){echo "checked='checked'";} ?>/>  no<span style="color:red">* </span>
			<br/><br/>
																		<!--keeps it checked-->
		<input id="done" type="submit" name="done" value="done"/>
		      <div></div>
	</form>

</body>
</html>