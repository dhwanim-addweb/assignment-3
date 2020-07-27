PHP and HTML
Echo a sentence onto the page, while fetching a URL parameters from the address bar.

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP and HTML</title>
  </head>
  <style>
    header
    {
      background-color: yellow;
      padding:2em;
      text-align:center;
    }

  </style>
  <body>
    <header>
    
    <h1><?php echo "Hello,". $_GET['name'];?></h1>

    </header>
  </body>
</html>
For running the program,write 
http://localhost/php/s4.php?name=Dhwani
in addressbar