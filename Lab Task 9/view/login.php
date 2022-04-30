<?php
include ("../view/header.php");
include ("../controller/logincheck.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;
        background-image: url('../assets/background.jpg'); }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validation()">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <p id="usernameErr"></p>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <p id="passErr"></p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="registration.php">Sign up now</a>.</p>
        </form>
    </div>
</body>

<script type="text/javascript">
    
    function validation()
     {

          var username= document.getElementById("username");
          var pass=document.getElementById("password");


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

}
</script>

</html>

<?php
include ("../view/footer.php");
?>
