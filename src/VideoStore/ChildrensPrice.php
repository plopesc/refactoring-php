<?php

namespace VideoStore;

class ChildrensPrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::CHILDRENS;
  }

  /**
   * @inheritdoc
   */
  function getCharge(int $daysRented) {
    $result = 1.5;
    if ($daysRented > 3) {
      $result += ($daysRented - 3) * 1.5;
    }

    return $result;
  }

}
