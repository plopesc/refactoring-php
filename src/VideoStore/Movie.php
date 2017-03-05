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

}
