<?php

namespace VideoStore\Test;

use VideoStore\Customer;
use VideoStore\Movie;
use VideoStore\Rental;

class HtmlStatementTest extends \PHPUnit_Framework_TestCase {

  /**
   * @param string $name
   * @param Rental[] $rentals
   * @param string $expectedStatement
   *
   * @dataProvider providerTestHtmlStatement
   */
  public function testHtmlStatement(string $name, array $rentals, string $expectedStatement) {
    $customer = new Customer($name);

    foreach ($rentals as $rental) {
      $customer->addRental($rental);
    }

    $this->assertEquals($expectedStatement, $customer->htmlStatement());
  }

  /**
   * Data Provider for testStatement()
   *
   * @return array
   */
  public function providerTestHtmlStatement() {
    $regular = new Movie('Regular Movie', Movie::REGULAR);

    $new_release = new Movie('New Release Movie', Movie::NEW_RELEASE);

    $childrens = new Movie('Childrens Movie', Movie::CHILDRENS);

    $rental_1 = new Rental($regular, 1);
    $rental_2 = new Rental($new_release, 3);
    $rental_3 = new Rental($childrens, 2);
    $rental_4 = new Rental($regular, 5);
    $rental_5 = new Rental($childrens, 4);

    return array(
      array('Jhon Doe', [$rental_1], "<h1>Rentals for <em>Jhon Doe</em></h1><p>
Regular Movie: 2<br />
<p>You owe <em>2</em><p>
On this rental you earned <em>1</em> frequent renter points<p>"),
      array('Jhon Doe', [$rental_1, $rental_2], "<h1>Rentals for <em>Jhon Doe</em></h1><p>
Regular Movie: 2<br />
New Release Movie: 9<br />
<p>You owe <em>11</em><p>
On this rental you earned <em>3</em> frequent renter points<p>"),
      array('Jhon Doe', [$rental_1, $rental_2, $rental_3], "<h1>Rentals for <em>Jhon Doe</em></h1><p>
Regular Movie: 2<br />
New Release Movie: 9<br />
Childrens Movie: 1.5<br />
<p>You owe <em>12.5</em><p>
On this rental you earned <em>4</em> frequent renter points<p>"),
      array('Jhon Doe', [$rental_1, $rental_4, $rental_5], "<h1>Rentals for <em>Jhon Doe</em></h1><p>
Regular Movie: 2<br />
Regular Movie: 6.5<br />
Childrens Movie: 3<br />
<p>You owe <em>11.5</em><p>
On this rental you earned <em>3</em> frequent renter points<p>"),
    );
  }
}