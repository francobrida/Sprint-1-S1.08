<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../vendor/autoload.php';

class NumberCheckerTest extends TestCase {

	private NumberChecker $numberCheck;

	public function setUp(): void {
		$this->numberCheck = new NumberChecker(5);
	}

	public function testNumberCheckerEven() {
		$this->assertFalse($this->numberCheck->isEven());
	}

	public function testNumberCheckerPositive() {
		$this->assertTrue($this->numberCheck->isPositive());
	}

}

?>

