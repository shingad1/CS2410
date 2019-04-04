<html>
<body>
<?php
    //Get the user inputs and store them into an array
    //The user input is stored into the $_REQUEST global variable
    //So to get the user input we get it from $_REQUEST

    $firstOperand = $_REQUEST["first"];
    $secondOperand = $_REQUEST["second"];

    //Form validation to check if the user provides a number
    if (isset($_GET['first'])) {
      $first = $_GET['first'];
    } else {
      echo "Please enter the first number";
    }

    if (isset ($_GET['second'])) {
      $second = $_GET['second'];
    } else {
      echo "Please enter the second number";
    }

    //Provide an error message if the number is 0.
    if ($_GET['second'] == 0) {
      echo '<h1> Cannot divide by 0! </h1>';
    }

    //Calculating the output
    $add_result = $firstOperand + $secondOperand;
    $subtraction_result = $firstOperand - $secondOperand;
    $multiplication_result = $firstOperand * $secondOperand;
    $division_result = $firstOperand / $secondOperand;

    //The output
    echo 'Your first input is: ' . "$firstOperand" . '<br />';
    echo 'Your second input is: ' . "$secondOperand"  . '<br />';
    echo 'Addition result: ' . "$add_result" . '<br />';
    echo 'Subtraction result: ' . $subtraction_result . '<br />';
    echo 'Multiplication result: ' . $multiplication_result . '<br />';
    echo 'Division result: ' . $division_result  . '<br />';
  ?>
</body>
</html>
