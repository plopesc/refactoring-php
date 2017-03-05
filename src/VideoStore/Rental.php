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
    $result = 0;

    switch ($this->getMovie()->getPriceCode()) {
      case Movie::REGULAR:
        $result += 2;
        if ($this->getDaysRented() > 2) {
          $result += ($this->getDaysRented() - 2) * 1.5;
        }
        break;
      case Movie::NEW_RELEASE:
        $result = $this->getDaysRented() * 3;
        break;
      case Movie::CHILDRENS:
        $result += 1.5;
        if ($this->getDaysRented() > 3) {
          $result += ($this->getDaysRented() - 3) * 1.5;
          return $result;
        }
        return $result;
    }
    return $result;
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
