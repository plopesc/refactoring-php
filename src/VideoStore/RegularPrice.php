<?php

namespace VideoStore;

class RegularPrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::REGULAR;
  }
}
