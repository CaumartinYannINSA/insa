<?php
/**
 * Gestion de poneys
 */
class Poneys
{
    private $_count = 8;

    /**
     * Retourne le nombre de poneys
     *
     * @return void
     */
    public function getCount(): int
    {
        return $this->_count;
    }

    /**
     * Retire un poney du champ
     *
     * @param int $number Nombre de poneys à retirer
     *
     * @return void
     */
    public function removePoneyFromField(int $number): void
    {
        if($number <= 0)
        {
            throw new InvalidArgumentException('You cannot remove a negative amount of poneys');
        }

        $this->_count -= $number;
    }

    public function addPoneyToField(int $number): void
    {
        $this->_count += $number;
    }

    /**
     * Retourne les noms des poneys
     *
     * @return array
     */
    public function getNames(): array
    {
        return ['A', 'B', 'C'];
    }
}
?>
