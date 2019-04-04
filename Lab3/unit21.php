<!DOCTYPE html>
<html>
<head>
  <title>Unit2-1 Basic PHP Programing - Tasks </title>
</head>

<body>
	<h1>Unit2-1 tasks</h1>

	<!-- Task 1: String-->
	<!-- write your solution to Task 1 here -->
	<div class="section">
		<h2>Task 1 : String</h2>
    <?php
      $programming = "I love programming";
      echo "<br>";
      echo "First letter is: " . substr($programming, 0,1);
      echo "<br>";
      echo "Length of string is: " . strlen($programming);
      echo "<br>";
      echo "Last letter is: " . substr($programming, 17,18);
      echo "<br>";
      echo "First 6 letters are: " . substr($programming, 0,6);
      echo "<br>";
      echo "In capital: " . strtoupper($programming);
    ?>


	</div>

	<!-- Task 2: Array and image-->
	<!-- write your solution to Task 2 here -->
	<div class="section">
		<h2>Task 2 : Array and image</h2>

<?php
    $images = array("earth.jpg", "flower.jpg", "plane.jpg", "tiger.jpg"); //create an array of images names
    $random = rand(0, 3);                                 //create a random number between 0 - 3
    $picked = $images[$random]; //pick an image $images array using $random value
    $path = "images/";          //get the file path
    $file = $path.$picked;     //final file = path + the image which was picked.

    echo '<img src="'.$file.'" alt="pic selected" width="20%">'; //output the image in html.
  ?>
	</div>

	<!-- Task 3: Function definition dayinmonth  -->
	<!-- write your solution to Task 3 here -->
	<div class="section">
		<h2>Task 3 : Function definition</h2>

<?php

    function daysInMonth($month) {

      switch ($month) { //this could be done with an if..elseif..else type statement
					case 1:
					case 3:
					case 5:
					case 7:
					case 8:
					case 10:
					case 12:
						return 31; //because there is no break between these statements, this returns true for cases 1,3,5,7,8,10 and 12.
						break;
					case 4:
					case 6:
					case 9:
					case 11:
						return 30;
					case 2:
						return 28;
					default:
						return -1;
				}
    }

    //print out the months from 1-12
    for ($x = 1; $x <= 12; $x++) {
				echo "<li> Month " . $x . " -> " . daysInMonth($x) . "</li>";
			}
 ?>
	</div>



	<!-- Task 4: Favorite Artists from a File (Files) -->
	<!-- write your solution to Task 4 here -->
  <div class="section">
  <h2>Task 4: My Favorite Artists from a file</h2>
  <ul>
  <?php
    //open the file
    $file = file("favorite.txt");
    //for each line in the file:
    foreach($file as $line) {
      //get the weblink version
      //step1: convert to lower case
      $strlower = strtolower($line); //convert each one to lower case.
      //explode into two parts to remove the space
      $strArray = explode(" ", $strlower); //break up into array, seperate by space.
      $webadd = implode("-", $strArray); //join up array into a string, connected by "-"

      //output it all
      echo "<li><a href = \"http://www.mtv.com/artists/" . $webadd . "\"/>" . $line . "</a><br />";
    }
  ?>
  </ul>
</div>

	<!-- Task 6: Directory operations -->
	<!-- write your solution to Task 6 here -->
  <div class="section">
  <h2>Task 6 : Directory operations</h2>
  <p>Files within a directory:</p>
  <ol>
  <?php
  foreach(scandir($_SERVER['DOCUMENT_ROOT']) as $filename){
    if (!is_dir($filename)){
      echo "<li>$filename </li> ";
    }
  }

  ?>
  </ol>
</div>

	<!-- Task 6 optional: Directory operations -->
	<!-- write your solution to Task 6 optional here -->
	<div class="section">
		<h2>Task 6 optional: Directory operations optional</h2>



	</div>
	</div



    <!-- Task 5: including external files -->
	<!-- write your solution to Task 5 here -->
	<div class="section">
		<h2>Task 5: including external files</h2>


	</div>

</body>
</html>
