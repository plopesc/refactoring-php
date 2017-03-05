<?php

namespace VideoStore;

class Rental {

  /**
   * @var Movie
   */
  private $movie;

  /**
   * @var int
   */
  private $daysRented;

  /**
   * Rental constructor.
   *
   * @param Movie $movie
   * @param int $daysRented
   */
  public function __construct(Movie $movie, int $daysRented) {
    $this->movie = $movie;
    $this->daysRented = $daysRented;
  }

  /**
   * @return Movie
   */
  public function getMovie(): Movie {
    return $this->movie;
  }

  /**
   * @return int
   */
  public function getDaysRented(): int {
    return $this->daysRented;
  }

  /**
   * Determines the rental charge.
   *
   * @return float
   */
  public function getCharge() {
    return $this->getMovie()->getCharge($this->getDaysRented());
  }

  /**
   * Determines the rental Frequent Renter Points.
   *
   * @return int
   */
  public function getFrequentRenterPoints() {
    // Add bonus for a two day new release rental.
    if (($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $this->getDaysRented() > 1) {
      return 2;
    }
    else {
      return 1;
    }
  }

}
