<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?php
	
	
	function choice($age, $weight)
	{
		if(($age==true) && ($weight==true))
				{				
				//directs to page2.php page
					header('location:page2.php');
				}
				else if(($age==false) && ($weight==true))
				{
					header('location:page3.php');
				}
				else if(($age==true) && ($weight==false))
				{
					header('location:page2.php');
				}
				else if(($age==false) && ($weight==false))
				{
					header('location:page5.php');
				}
				
	}
	//starts session
	session_start();
	// $_SESSION['name'] = "temp";
	 
	include 'button.html';
	include 'pageTitle.html';
	//stores error messages 
	

	$nameErr = "";
	$ageErr = "";
	$weightErr = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	
	{
	       $next= $_SESSION['next'] = $_POST['next'];
		   

		if(isset($next))
		{
			if(!isset($_POST['fullname']) || empty($_POST['fullname']))
			{
				$nameErr = "Please enter your fullname";
			}
			else
			{
				$_SESSION['fullname'] = $_POST['fullname'];
			}
			 
		    if(!isset($_POST['age']) || empty($_POST['age']))
			{
				$ageErr = "Please enter your baby age";
			}
			else
			{
				$_SESSION['age'] = $_POST['age'];
			}
			 
			if(!isset($_POST['weight']) || empty($_POST['weight']))
			{
				$weightErr = "Please select your weight";
			}
			else
			{
				$_SESSION['weight'] = $_POST['weight'];
			}
			 
			if(isset($_POST['fullname']) &&  !empty($_POST['fullname']) && isset($_POST['age']) && !empty($_POST['age'])  && isset($_POST['weight']) && !empty($_POST['weight']) )
				
			{				
				//directs to page2.php page
				//	header('location:page2.php');
				
				if (($_POST['weight']=='<5') && ($_POST['age']=='<6m'))
				{
					choice(true,true);
				}
				else if (($_POST['weight']=='<5') && ($_POST['age']=='>6m'))
				{
				choice(true,false);
				}
				else if (($_POST['weight']=='>5') && ($_POST['age']=='<6m'))
				{
				choice(false,true);
				}
				else if (($_POST['weight']=='>5') && ($_POST['age']=='>6m'))
				{
				choice(false,false);
				}
					exit();
			}
		} 
		if(isset($_POST['previous']))
		{
			//if previous button is set(clicked) directs to index.php page
			header('location: index.php');
			exit();
		}
		
		
		
	}
	
	
	
	?>

		<form method="post" >
		
			<label>Fullname:</label>
			<input type="text" name="fullname" placeholder="Enter your fullname" value="<?php if(isset($_SESSION['fullname'])){echo $_SESSION['fullname'];} ?>"/><span style="color:red">* <?php echo $nameErr;?></span>
			<br/><br/>			
												    <!--this line maintains the value entered-->
			<label>Baby Age(in mounth please):</label> 
			<input type="radio" name="age" value="<6m" <?php if(isset($_SESSION['age']) && $_SESSION['age'] == '<6m'){echo "checked='checked'";} ?> />  <6m 
																		<!--keeps it checked-->
			<input type="radio" name="age" value=">6m" <?php if(isset($_SESSION['age']) && $_SESSION['age'] == '>6m'){echo "checked='checked'";} ?>/>  >6m<span style="color:red">* <?php echo $ageErr;?></span>
			<br/><br/>
			
												<!--this line maintains that value entered--> 
			<label>weight:</label> 
			<input type="radio" name="weight" value="<5" <?php if(isset($_SESSION['weight']) && $_SESSION['weight'] == '<5'){echo "checked='checked'";} ?> />  <5kg 
																		<!--keeps it checked-->
			<input type="radio" name="weight" value=">5" <?php if(isset($_SESSION['weight']) && $_SESSION['weight'] == '>5'){echo "checked='checked'";} ?>/>  >5kg<span style="color:red">* <?php echo $weightErr;?></span>
			<br/><br/>
																		<!--keeps it checked-->
		<input id="prev" type="submit" name="previous" value="PREVIOUS"/>
		<input id="next" type="submit" name="next" value="NEXT" />
		      <div>
	 
</div>
	</form>
</body>
</html>
