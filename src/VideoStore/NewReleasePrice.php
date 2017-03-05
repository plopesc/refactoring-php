<?php

namespace VideoStore;

class NewReleasePrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::NEW_RELEASE;
  }
}
