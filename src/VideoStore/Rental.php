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

}
