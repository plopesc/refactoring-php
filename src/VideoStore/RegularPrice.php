<?php

namespace VideoStore;

class RegularPrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::REGULAR;
  }

  /**
   * @inheritdoc
   */
  function getCharge(int $daysRented) {
    $result = 2;
    if ($daysRented > 2) {
      $result += ($daysRented - 2) * 1.5;
    }

    return $result;
  }

}
