<?php

namespace VideoStore;


abstract class Price {

  /**
   * @return int
   */
  abstract function getPriceCode();

  /**
   * @return float
   */
  abstract function getCharge(int $daysRented);

  /**
   * Determines the movie Frequent Renter Points.
   *
   * @param int $daysRented
   * @return int
   */
  function getFrequentRenterPoints(int $daysRented) {
    return 1;
  }

}
