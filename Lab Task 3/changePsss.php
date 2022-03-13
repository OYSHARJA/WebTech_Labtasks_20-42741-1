<?php
    $cpass = $_POST['cpass'];
    $npass = $_POST['npass'];
    $cnpass = $_POST['cnpass'];
    $success='';
    $error = "";
   

    if(isset($_POST['submit'])){
        if(strcmp($cpass,$npass) == 0){
            $error = 'New password should not be same as the current password';
        }
        else{
           
             if(!strcmp($npass,$cnpass == 0)){
                $error = 'New password must match with the Retyped password';
            }
            else{
                $error = '';
                $success ='Successfully changed';
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
       <legend>Change Password</legend>
        <p class='error'> <?php echo $error; ?></p><p class='success'> <?php echo $success; ?></p>
        <form action="" method="post">
            <b>Current Password:</b><br>
            <input type="password" name="cpass" placeholder='Enter Current Password' id="" ><br>
            <b>New Password:</b><br>
            <input type="password" name="npass" placeholder='Enter New Password' id="" ><br>
            <b>Confirm Password:</b><br>
            <input type="password" name="cnpass" placeholder='Confirm Password' id="" ><br>
            <a href="#">Forget password</a><br>
            
            <input type="submit" value="Change password" name="submit"> 
            </fieldset>   
        </form>
    </div>
</body>
</html>
