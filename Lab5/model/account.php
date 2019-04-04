<?php
# An Account object corresponds to the columns in table savings

class Account {
  # declare two private fields: id and balance here
  private $id = null;
  private $balance = null;


  # constructor with two arguments: id and balance
private function __construct($id, $balance) {
  $this-> id = $id;
  $this-> balance = $balance;
}


  # magic getter method: __get()
public function __get($var) {
  return $this->$var;
  }
}
?>
