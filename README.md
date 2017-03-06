Code Examples from Chapter 1
======

This branch contains the 1st example where a Vide Store system is refactored step by step.
Each step is represented by a specific git tag:

1. [original](https://github.com/plopesc/refactoring-php/tree/original): Original to start to iterate
1. [basic-tests](https://github.com/plopesc/refactoring-php/tree/basic-tests): Add PHPUnit tests to avoid regerssions along the refactoring process
1. [extract-thisAmount](https://github.com/plopesc/refactoring-php/tree/extract-thisAmount): Extract the $thisAmount calculation to a separate method
1. [rename-variable](https://github.com/plopesc/refactoring-php/tree/rename-variable): Rename variables whitin the extracted method to improve readability
1. [move-amountFor](https://github.com/plopesc/refactoring-php/tree/move-amountFor): Move the amountFor() method to Rental class
1. [remove-amountFor](https://github.com/plopesc/refactoring-php/tree/remove-amountFor): Remove the original amountFor method from the Customer class
1. [replace-thisAmount](https://github.com/plopesc/refactoring-php/tree/replace-thisAmount): Replace temporal variable $thisAmount with calls to Rental::amountFor()
1. [extract-getFrequentRenterPoints](https://github.com/plopesc/refactoring-php/tree/extract-getFrequentRenterPoints): Extract logic to calculate Frequent Renter Points to a separate Rental method
1. [replace-totalAmount](https://github.com/plopesc/refactoring-php/tree/replace-totalAmount): Replace $totalAmount temporary variable with a specific Customer method
1. [replace-getFrequentRenterPoints](https://github.com/plopesc/refactoring-php/tree/replace-getFrequentRenterPoints): Replace 
$frequentRenterPoints variable wit a specific Customer method
1. [htmlStatement](https://github.com/plopesc/refactoring-php/tree/htmlStatement): Create htmlStatement Method and related tests
1. [move-getCharge](https://github.com/plopesc/refactoring-php/tree/move-getCharge): Move getCharge() method to Movie class
1. [move-getFrequentRenterPoints](https://github.com/plopesc/refactoring-php/tree/move-getFrequentRenterPoints): Move getFrequentRenterPoints() method to Movie class
1. [state-prices](https://github.com/plopesc/refactoring-php/tree/state-prices): Introduce state pattern to manage prices **key step**
1. [polimorphysm-getCharge](https://github.com/plopesc/refactoring-php/tree/polimorphysm-getCharge): Replace conditional with Polimorphysm in Movie::getCharge()
1. [polimorphysm-getFrequentRenterPoints](https://github.com/plopesc/refactoring-php/tree/polimorphysm-getFrequentRenterPoints): Replace conditional with Polimorphysm in Movie::getFrequentRenterPoints()

