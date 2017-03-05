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
    $frequentRenterPoints = 0;
    $rentals = $this->rentals;

    $result = 'Rental Record for ' . $this->getName() . PHP_EOL;
    foreach ($rentals as $each) {

      // Add frequent points.
      $frequentRenterPoints += $each->getFrequentRenterPoints();

      // Show figures for this rental.
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . PHP_EOL;
    }

    // Add footer lines.
    $result .= 'Amount owed is ' . $this->getTotalCharge() . PHP_EOL;
    $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points';

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

}
