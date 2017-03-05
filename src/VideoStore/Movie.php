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
   * @var Price
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
    $this->setPriceCode($priceCode);
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
    return $this->priceCode->getPriceCode();
  }

  /**
   * @param int $priceCode
   */
  public function setPriceCode(int $priceCode) {
    switch ($priceCode) {
      case Movie::REGULAR:
        $this->priceCode = new RegularPrice();
        break;
      case Movie::CHILDRENS:
        $this->priceCode = new ChildrensPrice();
        break;
      case Movie::NEW_RELEASE:
        $this->priceCode = new NewReleasePrice();
        break;
      default:
        throw new \InvalidArgumentException('Incorrect Price Code');
    }
  }

  /**
   * Determines the movie rental charge
   *
   * @param int $daysRented
   * @return float
   */
  public function getCharge(int $daysRented) {
    return $this->priceCode->getCharge($daysRented);
  }

  /**
   * Determines the movie Frequent Renter Points.
   *
   * @param int $daysRented
   * @return int
   */
  public function getFrequentRenterPoints(int $daysRented) {
    return $this->priceCode->getFrequentRenterPoints($daysRented);
  }

}
