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
     * @dataProvider removePoneyFromFieldProvider 
     *
     * @return void
     */
    public function testRemovePoneyFromField($number, $expected)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField($number);

        // Assert
        $this->assertEquals($expected, 8 - $number);
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

    public function removePoneyFromFieldProvider()
    {
        return [[3,5],[6,2],[8,0]];
    }

    public function testGetNames()
    {
        $Poneys = $this->createMock('Poneys');

        $array = ['A', 'B', 'C'];

        $Poneys
            ->expects($this->once())
            ->method('getNames')
            ->willReturn($array);

        $this->assertEquals(['A', 'B', 'C'], $Poneys->getNames());
    }
}
?>
