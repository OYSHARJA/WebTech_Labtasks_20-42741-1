<!DOCTYPE HTML>
<html>  
<head>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>
<?php
    $kk=0;
	$name=$email=$birth=$gender=$degree=$blood="";
	$nameErr=$emailErr=$birthErr=$genderErr=$degreeErr=$bloodErr="";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST["name"]))
		{
			$nameErr="Fill this part";
		}
		else
		{
			if(str_word_count($_POST["name"])<2)
			{
				$nameErr="Aleast two word needed";
			}
			else
			{
				if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"]))
				{
					$nameErr="Please enter valid name";
				}
				else
				{
					$name=$_POST["name"];
					$nameErr="";
				}
			}
		}
		
		if(empty($_POST["email"]))
		{
			$emailErr="Fill this part";
		}
		else
		{
			$email=$_POST["email"];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$emailErr="Email format is not validate";
			}
		}

		if(empty($_POST["birth"]))
		{
			$birthErr="Fill this part";
		}
		else
		{
			$birthErr="";
			$birth=$_POST["birth"];
		}

		if(empty($_POST["gender"]))
		{
			$genderErr="Fill this part";
		}
		else
		{
			$gender=$_POST["gender"];
			$genderErr="";
		}

		if(empty($_POST["degree"]))
		{
			$degreeErr="Fill this part";
		}
		else
		{
			foreach($_POST["degree"] as $value)
			{
				$kk++;
			}
			if($kk<2)
			{
				$degreeErr="At least check 2 degrees.";
			}
			else
			{
				$degreeErr="";
				foreach($_POST["degree"] as $value)
				{
					$value="";
				}
	        }
		}
		

		if(empty($_POST["blood"]))
		{
			$bloodErr="Fill this part";
		}
		else
		{
			$blood=$_POST["blood"];
			$bloodErr="";
		}		
	}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<fieldset>
		<legend>NAME</legend>
			<input type="text" name="name">
			<span class="error">* <?php echo $nameErr;?></span><br>
	</fieldset>
	<fieldset>
		<legend>EMAIL</legend>
			<input type="text" name="email"><span class="error">* <?php echo $emailErr;?></span><br>
	</fieldset>
	<fieldset>
		<legend>DATE OF BIRTH</legend>
			<input type="date" name="birth"><span class="error">* <?php echo $birthErr;?></span><br>
	</fieldset>
	<fieldset>
		<legend>GENDER<span class="error">* <?php echo $genderErr;?></span></legend>
			<input type="radio" name="gender" id="male" value="Male">
			<label for="male">Male</label><br>
			<input type="radio" name="gender" id="female" value="Female">
			<label for="female">Female</label><br>
			<input type="radio" name="gender" id="other" value="Other">
			<label for="other">Other</label><br>
	</fieldset>
	<fieldset>
		<legend>DEGREE<span class="error">* <?php echo $degreeErr;?></span></legend>
			<input type="checkbox" name="degree[]" value="SSC" id="ssc">
			<label for="ssc">SSC</label><br>
			<input type="checkbox" name="degree[]" value="HSC" id="hsc">
			<label for="hsc">HSC</label><br>
			<input type="checkbox" name="degree[]" value="BSc" id="bsc">
			<label for="bsc">BSc</label><br>
			<input type="checkbox" name="degree[]" value="MSc" id="msc">
			<label for="msc">MSc</label><br>
	</fieldset>
	<fieldset>
		<legend>BLOOD GROUP<span class="error">* <?php echo $bloodErr;?></span></legend>
			<select name="blood">
				<option>(Choose option)</option>
			  <option value="A+">A+</option>
			  <option value="A-">A-</option>
			  <option value="B+">B+</option>
			  <option value="B-">B-</option>
			  <option value="AB+">AB+</option>
			  <option value="AB-">AB-</option>
			  <option value="O+">O+</option>
			  <option value="O-">O-</option>
	</fieldset>
</select>
</fieldset>
	<br><input type="submit" name="submit" value="Submit"><br><br><br>
</form>

<?php
if(isset($_POST["submit"]))
{
	echo "Name is : ".$name;
	echo "<br>";
	echo "Email is : ".$email;
	echo "<br>";
	echo "Birth date is : ".$birth;
	echo "<br>";
	echo "Degrees are : ";
	if(empty($_POST["degree"]))
	{
		echo "";
	}
	else
	{
	foreach($_POST["degree"] as $value)
			{
				echo $value.",  ";
			}
	}
	echo "<br>";
	echo "Gender : ".$gender;
	echo "<br>";
	echo "Blood group is : ".$blood;
}

	?>
</body>
</html>