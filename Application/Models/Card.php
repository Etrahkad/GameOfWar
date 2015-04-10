<?php

namespace Application\Models;

use \Application\Types\Card as CardType;
use \Application\Types\Suit as CardSuit;

class Card {
    protected $type;
    protected $suit;
    
    /**
     * @return \Application\Models\Card
     */
    public function __construct(CardType $type = null, CardSuit $suit = null) {
        if ($type and $suit) {
            $this->setType($type);
            $this->setSuit($suit);
        }
        return $this;
    }
    
    /**
     * @param \Application\Types\Card $type
     * @return \Application\Models\Card
     */
    public function setType(CardType $type) {
        $this->type = $type;
        return $this;
    }
    
    /**
     * @return \Application\Types\Card
     */
    public function getType() {
        return $this->type;
    }
    /**
     * @param \Application\Types\Suit $suit
     */
    public function setSuit(CardSuit $suit) {
        $this->suit = $suit;
    }
    
    /**
     * @return \Application\Types\Suit
     */
    public function getSuit() {
        return $this->suit;
    }
    
    /**
     * Good ole "Ace of Hearts e.g."
     * @return String
     */
    public function __toString() {
        return $this->type . ' of ' . $this->suit;
    }
}
