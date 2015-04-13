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
    /**
     * @var \Application\Structures\CardStack
     */
    protected $deck;
    /**
     * @var \Application\Structures\CardStack
     */
    protected $deckPermCards;
    
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
    
    public function __toString() {
        $string_array = [];
        
        foreach($this->deck->getArray() as $card) {
            $string_array[] = "$card";
        }
        return "Pile: \n" . implode("\n", $string_array);
    }
}
