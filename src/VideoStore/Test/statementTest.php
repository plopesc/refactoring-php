<?php

namespace VideoStore\Test;

use VideoStore\Customer;
use VideoStore\Movie;
use VideoStore\Rental;

class statementTest extends \PHPUnit_Framework_TestCase {

  /**
   * @param string $name
   * @param Rental[] $rentals
   * @param string $expectedStatement
   *
   * @dataProvider providerTestStatement
   */
  public function testStatement(string $name, array $rentals, string $expectedStatement) {
    $customer = new Customer($name);

    foreach ($rentals as $rental) {
      $customer->addRental($rental);
    }

    $this->assertEquals($expectedStatement, $customer->statement());
  }

  /**
   * Data Provider for testStatement()
   *
   * @return array
   */
  public function providerTestStatement() {
    $regular = new Movie('Regular Movie', Movie::REGULAR);

    $new_release = new Movie('New Release Movie', Movie::NEW_RELEASE);

    $childrens = new Movie('Childrens Movie', Movie::CHILDRENS);

    $rental_1 = new Rental($regular, 1);
    $rental_2 = new Rental($new_release, 3);
    $rental_3 = new Rental($childrens, 2);
    $rental_4 = new Rental($regular, 5);
    $rental_5 = new Rental($childrens, 4);

    return array(
      array('Jhon Doe', [$rental_1], "Rental Record for Jhon Doe\n\tRegular Movie\t2\nAmount owed is 2\nYou earned 1 frequent renter points"),
      array('Jhon Doe', [$rental_1, $rental_2], "Rental Record for Jhon Doe\n\tRegular Movie\t2\n\tNew Release Movie\t9\nAmount owed is 11\nYou earned 3 frequent renter points"),
      array('Jhon Doe', [$rental_1, $rental_2, $rental_3], "Rental Record for Jhon Doe\n\tRegular Movie\t2\n\tNew Release Movie\t9\n\tChildrens Movie\t1.5\nAmount owed is 12.5\nYou earned 4 frequent renter points"),
      array('Jhon Doe', [$rental_1, $rental_4, $rental_5], "Rental Record for Jhon Doe\n\tRegular Movie\t2\n\tRegular Movie\t6.5\n\tChildrens Movie\t3\nAmount owed is 11.5\nYou earned 3 frequent renter points"),
    );
  }
}