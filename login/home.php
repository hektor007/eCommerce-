<?php include "homephp.php"; ?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <html lang="en">
        <head>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	         <meta charse7t ="utf-8"/>
		     <title> FIT</title>
		     <link rel="stylesheet" href="../assets/css/home.css"/>
		     <style>
                 a{text-decoration:none}
             </style>
        </head>   
        <title>
		   MEMBER
         </title>  
         </head>   
         <body>
             <div id="wrapper">
                    <div class="header">
                          <?php include "header1.php"; ?>  
                    </div>
                    <div id="user">
                       <p> USER : <?php echo $row['userName']; ?> </p>
                     </div>                       
                     <?php include "updateuser.php"; ?>  
                     <div id="footer">
                        <?php include "footer.html"; ?>  
                     </div>
             </div>
    </body>

</html>