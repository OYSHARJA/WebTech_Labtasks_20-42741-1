<?php
include ("../view/header.php");
include "../controller/regcheck.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;
        background-image: url('../assets/background.jpg'); }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validation()">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id ="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                <p id="usernameErr"></p>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id ="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <p id="passErr"></p>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <p id="cpassErr"></p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>

<script type="text/javascript">

     function validation()
     {
          var username=document.getElementById("username");
          var pass=document.getElementById("password");
          var cpass=document.getElementById("confirm_password");




        if (username.value.trim()=="") {
          document.getElementById("usernameErr").innerHTML=  "* User Name is required";
          return false;
        }
        else {
          document.getElementById("usernameErr").innerHTML=  "";
        }


        if(pass.value.trim()=="")
        {
          document.getElementById("passErr").innerHTML= "*Password is required";
          return false;
        }
        else {
          if(pass.value.length<8)
          {
          document.getElementById("passErr").innerHTML= "*Password must not be less than eight (8) characters";
            return false;
          }
          else {
            document.getElementById("passErr").innerHTML= "";
          }
      }

       if(cpass.value.trim()=="")
       {
       document.getElementById("cpassErr").innerHTML= "*Confirm Password is required";
         return false;
       }
       else {
          if(!(pass.value==cpass.value))
          {
            document.getElementById("cpassErr").innerHTML= "*Password and confirm password have to be same";
          return false;
          }
          else {
            document.getElementById("cpassErr").innerHTML= "";
          }

      }

}



</script>
</html>

<?php
include ("../view/footer.php");
?>
