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
    $totalAmount = 0;
    $frequentRenterPoints = 0;
    $rentals = $this->rentals;

    $result = 'Rental Record for ' . $this->getName() . PHP_EOL;
    foreach ($rentals as $each) {

      // Add frequent points.
      $frequentRenterPoints += $each->getFrequentRenterPoints();

      // Show figures for this rental.
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . PHP_EOL;
      $totalAmount += $each->getCharge();
    }

    // Add footer lines.
    $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
    $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points';

    return $result;
  }

}
