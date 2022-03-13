<?php
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $error = "";
    $specialChars = preg_match('@[^\w]@', $pass);

    if(isset($_POST['submit'])){
        if(strlen($uname) < 2){
            $error = 'Input a name at least 2 characters';
        }
        else{
            $error='';
        }
        if(strlen($pass) < 8){
            $error = 'Password must be at least 8 characters';
        }
        else{
            if(!specialChars){
                $error = 'Password should include one special character.';
            }
            else{
                $error = '';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        
        <fieldset>
          <legend>Login</legend>
        <form action="" method="post">
            <b>Username:</b><br>
            <input type="text" name="uname" placeholder='Enter Username' id="" required><br>
            <b>Password:</b><br>
            <input type="password" name="pass" placeholder='Enter Password' id="" required><br>
            <input type="checkbox" id="Remember Me" name="Remember Me" value="Remember Me">
<label for="Remember Me"> Remember Me</label><br>
            <input type="submit" value="LOGIN" name="submit"> 
            <a href="#">Forget password</a><br>
            <p class='error'> <?php echo $error; ?></p>

            </fieldset>
        </form>
    </div>
</body>
</html>
