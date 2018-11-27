<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{

    private $Poneys;
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
        $this->Poneys = new Poneys();

        // Action
        $this->Poneys->removePoneyFromField($number);

        // Assert
        $this->assertEquals($expected, 8 - $number);
    }

    public function testRemovePoneyFromFieldNegativeValue()
    {
        $this->Poneys = new Poneys();

        $this->expectException(InvalidArgumentException::class);

        $this->Poneys->removePoneyFromField(-1);
    }
    
    public function testAddPoneyToField()
    {
        $this->Poneys = new Poneys();
        
        $this->Poneys->addPoneyToField(4);

        $this->assertEquals(12, $this->Poneys->getCount());
    }

    public function removePoneyFromFieldProvider()
    {
        return [[3,5],[6,2],[8,0]];
    }

    public function testGetNames()
    {
        $this->Poneys = $this->createMock('Poneys');

        $array = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

        $this->Poneys
            ->expects($this->once())
            ->method('getNames')
            ->willReturn($array);

        $this->assertEquals($array, $this->Poneys->getNames());
    }

    public function testIsNotFull()
    {
        $this->Poneys = new Poneys();

        $this->assertTrue($this->Poneys->isNotFull());
            
        $this->Poneys->addPoneyToField(7);

        $this->assertFalse($this->Poneys->isNotFull());
    }

    public function setUp()
    {
        $this->Poneys = new Poneys();        

        $this->Poneys->setCount(8);
    }

    public function tearDown()
    {
        $this->Poneys = Null;
    }
}
?>
