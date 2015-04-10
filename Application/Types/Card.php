<?php

namespace Application\Types;

/**
 * Enumerate and provide Type Hinting for card types
 *
 * @author Tim Dubois
 */
class Card extends IntegerType {
    protected $stringTypes = ['Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Jack', 'Queen', 'King', 'Ace'];

    public function getTypeString() {
        return $this->stringTypes[$this->type];
    }
    
    public function getValue() {
        return $this->getType();
    }
}
