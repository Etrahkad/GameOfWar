<?php

namespace Application\Structures;

use \Application\Models\Card;
use \Application\Structures\CardStack;

/**
 * A Pile of cards
 *
 * @author tdubois
 */
class Pile {
    protected $deck;
    
    public function __construct() {
        $this->deck = new CardStack();
    }
    /**
     * @return \Application\Structures\CardStack
     */
    public function getPile() {
        return $this->deck;
    }
    
    /**
     * @param \Application\Models\Card $card
     * @return \Application\Structures\Pile
     */
    public function placeOnPile(Card $card) {
        $this->deck->addCard($card);
        return $this;
    }
}
