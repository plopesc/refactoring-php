<?php

namespace VideoStore;

class ChildrensPrice extends Price {

  /**
   * @inheritdoc
   */
  function getPriceCode() {
    return Movie::CHILDRENS;
  }
}
