 Functions
 s10.php
 
 <?php
      function checkAge($age) {
       return ($age < 21) ? false : true;
      };

      if(checkAge(21)) {
         echo 'welcome to the club';
      }
      else {
        echo 'sorry! you are younger than 21';
      }
 ?>