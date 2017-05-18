<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<?php

function result($num)
		{
			if($num=='6')
					{header('location:res6.php');}
			else if($num=='2')
					{header('location:res2.php');}
			else if($num=='10')
					{header('location:res10.php');}
			else if($num=='9')
					{header('location:res9.php');}
			else if($num=='8')
					{header('location:res8.php');}
		}


session_start();
include 'pageTitle.html';

$knotErr = "";
	$slingtimeErr = "";
	$shapeErr = "";
	$volumeErr = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')

	{
	     $next= $_SESSION['next'] = $_POST['next'];


		if(isset($next))
		{
			if(!isset($_POST['knot']) || empty($_POST['knot']))
			{
				$knotErr = "Please enter your answer";
			}
			else
			{
				$_SESSION['knot'] = $_POST['knot'];
			}

		    if(!isset($_POST['slingtime']) || empty($_POST['slingtime']))
			{
				$slingtimeErr = "Please enter your answer";
			}
			else
			{
				$_SESSION['slingtime'] = $_POST['slingtime'];
			}

			if(!isset($_POST['shape']) || empty($_POST['shape']))
			{
				$shapeErr = "Please enter your answer";
			}
			else
			{
				$_SESSION['shape'] = $_POST['shape'];
			}

			if(!isset($_POST['volume']) || empty($_POST['volume']))
			{
				$volumeErr = "Please enter your answer";
			}
			else
			{
				$_SESSION['volume'] = $_POST['volume'];
			}

			if(isset($_POST['knot']) &&  !empty($_POST['knot']) && isset($_POST['slingtime']) && !empty($_POST['slingtime'])  && isset($_POST['shape']) && !empty($_POST['shape']) && isset($_POST['volume']) && !empty($_POST['volume']) )

			{

				if ($_POST['slingtime']=='quckly')
				{
					if ($_POST['shape']=='shivti')
					{result('2');}
					else
					{result('9');}
				}
				else
				{
						if ($_POST['shape']=='maaravit')
						{result('10');}
						else
						{
							if ($_POST['knot']=='yes')
							{result('6');}
							else
							{
								if ($_POST['volume']=='small')	
								{result('6');}
								else
								{result('8');}
							}
						}
						
				}

					exit();
			}
		}
		if(isset($_POST['previous']))
		{
			//if previous button is set(clicked) directs to index.php page
			header('location: page1.php');
			exit();
		}
	}

	?>
	<form method="post" >

			<label>?האם ישנה בעיה/פחד מקשירות</label>
			<br/><br/>
			<input type="radio" name="knot" value="yes" <?php if(isset($_SESSION['knot']) && $_SESSION['knot'] == 'yes'){echo "checked='checked'";} ?> />  yes
					<br/><br/>													<!--keeps it checked-->
			<input type="radio" name="knot" value="no" <?php if(isset($_SESSION['knot']) && $_SESSION['knot'] == 'no'){echo "checked='checked'";} ?>/>  no<span style="color:red">* <?php echo $knotErr;?></span>
			<br/><br/>

			<label>?מה הוא פרק זמן שימוש במנשא בממוצע</label>
			<br/><br/>
			<input type="radio" name="slingtime" value="quckly" <?php if(isset($_SESSION['slingtime']) && $_SESSION['slingtime'] == 'quckly'){echo "checked='checked'";} ?> />  קצר
						<br/><br/>												<!--keeps it checked-->
			<input type="radio" name="slingtime" value="long" <?php if(isset($_SESSION['slingtime']) && $_SESSION['slingtime'] == 'long'){echo "checked='checked'";} ?>/> ארוך <span style="color:red">* <?php echo $slingtimeErr;?></span>
			<br/><br/>

			<label>?האם ישנה העדפה לצורת המנשא</label>
			<br/><br/>
			<input type="radio" name="shape" value="shivti" <?php if(isset($_SESSION['shape']) && $_SESSION['shape'] == 'shivti'){echo "checked='checked'";} ?> /> שבטי (צעיף)
						<br/><br/>												<!--keeps it checked-->
			<input type="radio" name="shape" value="maaravit" <?php if(isset($_SESSION['shape']) && $_SESSION['shape'] == 'maaravit'){echo "checked='checked'";} ?>/>  מערבית (ילקוט)<span style="color:red">* <?php echo $shapeErr;?></span>
			<br/><br/>

			<label>?האם חשוב נפח המנשא</label>
			<br/><br/>
			<input type="radio" name="volume" value="small" <?php if(isset($_SESSION['volume']) && $_SESSION['volume'] == 'small'){echo "checked='checked'";} ?> />  קטן
								<br/><br/>										<!--keeps it checked-->
			<input type="radio" name="volume" value="nomether" <?php if(isset($_SESSION['volume']) && $_SESSION['volume'] == 'nomether'){echo "checked='checked'";} ?>/>  לא משנה <span style="color:red">* <?php echo $volumeErr;?></span>
			<br/><br/>
																		<!--keeps it checked-->
		<input id="prev" type="submit" name="previous" value="PREVIOUS"/>
		<input id="next" type="submit" name="next" value="NEXT" />
		      <div></div>
	</form>

</body>
</html>