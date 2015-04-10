<?php

namespace Application\Types;

/**
 * Enumerate and provide Type Hinting for card suits
 *
 * @author Tim Dubois
 */
class Suit extends IntegerType {
    protected $suitTypes = ['Hearts', 'Diamonds', 'Spades', 'Clubs'];

    public function getTypeString() {
        return $this->suitTypes[$this->type];
    }
}
