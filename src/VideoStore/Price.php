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

}
