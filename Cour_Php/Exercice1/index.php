 <?php

 $firstname = "Antinea";
 $firstname = strtoupper($firstname);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title></title>
         <style media="screen">
             h1 {
                 color: red;
             }
         </style>
     </head>
     <body>
         <h1>
             Hello <?= $firstname; ?>
             <!-- équivaut à <?php print $firstname; ?> -->
         </h1>
     </body>
 </html>
