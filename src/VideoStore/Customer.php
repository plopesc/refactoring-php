<?php

namespace VideoStore;

class Customer {

  /**
   * @var String
   */
  private $name;

  /**
   * @var Rental[]
   */
  private $rentals = [];

  /**
   * Customer constructor.
   *
   * @param String $name
   */
  public function __construct(String $name) {
    $this->name = $name;
  }

  /**
   * @param Rental $rental
   */
  public function addRental(Rental $rental) {
    $this->rentals[] = $rental;
  }

  /**
   * @return String
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Returns the customer statement.
   *
   * @return string
   */
  public function statement() {
    $rentals = $this->rentals;

    $result = 'Rental Record for ' . $this->getName() . PHP_EOL;
    foreach ($rentals as $each) {

      // Show figures for this rental.
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . PHP_EOL;
    }

    // Add footer lines.
    $result .= 'Amount owed is ' . $this->getTotalCharge() . PHP_EOL;
    $result .= 'You earned ' . $this->getTotalFrequentRenterPoints() . ' frequent renter points';

    return $result;
  }

  /**
   * Returns the customer statement in HTML format.
   *
   * @return string
   */
  public function htmlStatement() {
    $rentals = $this->rentals;

    $result = '<h1>Rentals for <em>' . $this->getName() . '</em></h1><p>' .PHP_EOL;
    foreach ($rentals as $each) {

      // Show figures for this rental.
      $result .= $each->getMovie()->getTitle() . ': ' . $each->getCharge() . '<br />' . PHP_EOL;
    }

    // Add footer lines.
    $result .= '<p>You owe <em>' . $this->getTotalCharge() . '</em><p>' . PHP_EOL;
    $result .= 'On this rental you earned <em>' . $this->getTotalFrequentRenterPoints() . '</em> frequent renter points<p>';

    return $result;
  }

  /**
   * Returns the client total charge value.
   *
   * @return float
   */
  private function getTotalCharge() {
    $result = 0;
    $rentals = $this->rentals;

    foreach ($rentals as $each) {
      $result += $each->getCharge();
    }

    return $result;
  }

  /**
   * Returns the client total frequent points.
   *
   * @return int
   */
  private function getTotalFrequentRenterPoints() {
    $result = 0;
    $rentals = $this->rentals;

    foreach ($rentals as $each) {
      $result += $each->getFrequentRenterPoints();
    }

    return $result;
  }

}
