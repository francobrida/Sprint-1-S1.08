<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

require_once __DIR__ . '/../src/SpeedSensor.php';

class SpeedSensorTest extends TestCase {

    public static function speedDataProvider() : array {

        return [
            [27, "Very slow"],
            [40, "Suitable speed"],
            [61, "Slight excess"],
            [90, "Moderate excess"],
            [120,"Serious excess"]
        ];
    }

    #[DataProvider('speedDataProvider')]

    public function testSpeedSensor(int $num, string $speed) : void {
        $speedSensor = new SpeedSensor($num);

        $this->assertEquals($speed, $speedSensor->rateSpeed());

    }

}

?>