<?php
 $thisStyle = 0;

 if (isset($_COOKIE["selectedStyle"])) { // has the cookie already been set
   $thisStyle = $_COOKIE["selectedStyle"];
 }

 if (isset($_POST["changeStyle"])) { // changing the style
   $thisStyle = $_POST["changeStyle"];
 }

 setcookie("selectedStyle", $thisStyle); // update or create the cookie
?>

 <html>
   <head>
     <title>Cookies - the style change page</title>
     <link rel="stylesheet" href="style<?= $thisStyle; ?>.css">
   </head>
   <body>
     <h1>Style Selector</h1>
     <form method="post" action="<?= $_SERVER["PHP_SELF"];?>">
       <input type="submit" name="changeStyle" value="0"><BR>
       <input type="submit" name="changeStyle" value="1"><BR>
       <input type="submit" name="changeStyle" value="2"><BR>
     </form>
     <p><a href="index.php">Back to homepage</a></p>
   </body>
 </html>