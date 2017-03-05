<?php

namespace VideoStore;

class Movie {

  const CHILDRENS = 2;
  const REGULAR = 0;
  const NEW_RELEASE = 1;

  /**
   * @var string
   */
  private $title;

  /**
   * @var int
   */
  private $priceCode;

  /**
   * Movie constructor.
   *
   * @param string $title
   * @param int $priceCode
   */
  public function __construct(string $title, int $priceCode) {
    $this->title = $title;
    $this->priceCode = $priceCode;
  }

  /**
   * @return string
   */
  public function getTitle(): string {
    return $this->title;
  }

  /**
   * @return int
   */
  public function getPriceCode(): int {
    return $this->priceCode;
  }

  /**
   * @param int $priceCode
   */
  public function setPriceCode(int $priceCode) {
    $this->priceCode = $priceCode;
  }

  /**
   * Determines the movie rental charge
   *
   * @param int $daysRented
   * @return float
   */
  public function getCharge(int $daysRented) {
    $result = 0;
    switch ($this->getPriceCode()) {
      case Movie::REGULAR:
        $result += 2;
        if ($daysRented > 2) {
          $result += ($daysRented - 2) * 1.5;
        }
        break;
      case Movie::NEW_RELEASE:
        $result = $daysRented * 3;
        break;
      case Movie::CHILDRENS:
        $result += 1.5;
        if ($daysRented > 3) {
          $result += ($daysRented - 3) * 1.5;
          return $result;
        }
        return $result;
    }
    return $result;
  }

}
