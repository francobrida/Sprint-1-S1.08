<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/SpeedSensor.php';

class SpeedSensorTest extends TestCase {

    private $sensorTester1;
    private $sensorTester2;
    private $sensorTester3;
    private $sensorTester4;
    private $sensorTester5;


    function setUp(): void
    {
        $this->sensorTester1 = new SpeedSensor(27);
        $this->sensorTester2 = new SpeedSensor(40);
        $this->sensorTester3 = new SpeedSensor(61);
        $this->sensorTester4 = new SpeedSensor(90);
        $this->sensorTester5 = new SpeedSensor(120);
    }


    function testVerySlow() : void {
        $this->assertEquals("Very slow",$this->sensorTester1->rateSpeed());
    }

    function testSuitable() : void {
        $this->assertEquals("Suitable speed",$this->sensorTester2->rateSpeed());
    }

    function testSlightE() : void {
        $this->assertEquals("Slight excess",$this->sensorTester3->rateSpeed());
    }

    function testModerateE() : void {
        $this->assertEquals("Moderate excess",$this->sensorTester4->rateSpeed());
    }

     function testSeriousE() : void {
        $this->assertEquals("Serious excess",$this->sensorTester5->rateSpeed());
    }

}


?>