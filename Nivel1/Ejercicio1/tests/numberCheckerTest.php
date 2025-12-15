<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/NumberChecker.php';

class NumberCheckerTest extends TestCase {

	private NumberChecker $numberCheck;
	private NumberChecker $numberCheck2;

	public function setUp(): void {
		$this->numberCheck = new NumberChecker(5);
		$this->numberCheck2 = new NumberChecker(-4);
	}

	public function testNumberCheckerEven() : void {
		$this->assertFalse($this->numberCheck->isEven());
	}

	public function testNumberCheckerEven2() : void {
		$this->assertTrue($this->numberCheck2->isEven());
	}

	public function testNumberCheckerPositive() : void {
		$this->assertTrue($this->numberCheck->isPositive());
	}

	public function testNumberCheckerPositive2() : void {
		$this->assertFalse($this->numberCheck2->isPositive());
	}

}

?>

