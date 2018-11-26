<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRemovePoneyFromField()
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField(3);

        // Assert
        $this->assertEquals(5, $Poneys->getCount());
    }

    public function testRemovePoneyFromFieldNegativeValue()
    {
        $Poneys = new Poneys();

        $this->expectException(InvalidArgumentException::class);

        $Poneys->removePoneyFromField(-1);
    }
    
    public function testAddPoneyToField()
    {
        $Poneys = new Poneys();
        
        $Poneys->addPoneyToField(4);

        $this->assertEquals(12, $Poneys->getCount());
    }
}
?>
