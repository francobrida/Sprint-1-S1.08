<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

require_once __DIR__ . '/../src/NumberChecker.php';

class NumberCheckerTest extends TestCase {

	public static function NumberCheckerProvider(): array {
		return [
			[3, false, true], 
			[4, true, true], 
			[-5, false, false], 
			[-4, true, false]
		];
	}

	#[DataProvider('NumberCheckerProvider')]
	
	public function testNumberChecker(int $num, bool $even, bool $positive) : void {
		$numberChecker = new NumberChecker($num);

		$this->assertSame($even, $numberChecker->isEven());
		$this->assertSame($positive, $numberChecker->isPositive());
		
	}

}

?>

