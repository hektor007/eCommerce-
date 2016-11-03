<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <html lang="en">
        <head>
  
    <meta charset="UTF-8">
    <title>Admin Login</title>   
        <link rel="stylesheet" href="../assets/css/style.css">  
  </head>

  <body>

    <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
     <img src="https://pbs.twimg.com/profile_images/554631714970955776/uzPxPPtr.jpeg" alt="Avatar" /> 
    </button>
      
      
    <div class="profile__form">
      <div class="profile__fields">
        <div class="field">
         <form method="post" action="login.php">
          <input type="text" name="username" id="fieldUser" class="input" required pattern=.*\S.* />
          <label for="fieldUser" class="label">Username</label>
        </div>
        <div class="field">
          <input type="password"  name="password" id="fieldPassword" class="input" required pattern=.*\S.* />
          <label for="fieldPassword" class="label">Password</label>
          
        </div>
        <div class="profile__footer">
          <button type="submit" name="submit" value="submit" class="btn">Login</button>
          </form>
        </div>
      </div>
     </div>
  </div>
</div>
    
        <script src="../assets/js/index.js"></script>

    
    
  </body>
</html>