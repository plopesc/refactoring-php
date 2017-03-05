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

      $thisAmount = $this->amountFor($each);

      // Add frequent points.
      $frequentRenterPoints++;
      // Add bonus for a two day new release rental.
      if (($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $each->getDaysRented() > 1) {
        $frequentRenterPoints++;
      }

      // Show figures for this rental.
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $thisAmount . PHP_EOL;
      $totalAmount += $thisAmount;
    }

    // Add footer lines.
    $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
    $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points';

    return $result;
  }

  /**
   * Determines amounts for each line.
   *
   * @param Rental $aRental
   * @return float|int
   */
  private function amountFor(Rental $aRental) {
    $result = 0;

    // Determine amounts for each line.
    switch ($aRental->getMovie()->getPriceCode()) {
      case Movie::REGULAR:
        $result += 2;
        if ($aRental->getDaysRented() > 2) {
          $result += ($aRental->getDaysRented() - 2) * 1.5;
        }
        break;
      case Movie::NEW_RELEASE:
        $result = $aRental->getDaysRented() * 3;
        break;
      case Movie::CHILDRENS:
        $result += 1.5;
        if ($aRental->getDaysRented() > 3) {
          $result += ($aRental->getDaysRented() - 3) * 1.5;
          return $result;
        }
        return $result;
    }
    return $result;
  }

}
