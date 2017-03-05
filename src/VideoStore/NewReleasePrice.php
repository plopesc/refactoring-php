<?php

namespace VideoStore;

class NewReleasePrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::NEW_RELEASE;
  }

  /**
   * @inheritdoc
   */
  function getCharge(int $daysRented) {
    return $daysRented * 3;
  }

}
