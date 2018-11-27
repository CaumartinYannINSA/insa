<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class Poneys2Test extends TestCase
{

    private $Poneys;

    public function setUp()
    {
        $this->Poneys = new Poneys();        

        $this->Poneys->setCount(8);
    }

    public function tearDown()
    {
        $this->Poneys = Null;
    }

    public function testRemovePoneyFromFieldNegativeValue()
    {
        $this->Poneys = new Poneys();

        $this->expectException(InvalidArgumentException::class);

        $this->Poneys->removePoneyFromField(-1);
    }

}
?>
