<?php

namespace Application\Structures;

use Application\Models\Card;
use Application\Structures\Container;

/**
 * Description of CardContainer
 *
 * @author tdubois
 */
abstract class CardContainer extends Container {
    /**
     * @var \Application\Models\Card[]
     */
    protected $cards = array();
    
    /**
     * Get a card from the top or bottom of the structure
     */
    public abstract function getCard();
    
    /**
     * Add a Card to the structure
     * @param \Application\Models\Card $card
     */
    public abstract function addCard(Card $card);
    
    public function getArray() {
        return $this->cards;
    }

    public function setArray(Container $cards) {
        $this->cards = $cards->getArray();
    }
    
    public function getCount() {
        return count($this->cards);
    }
    
    public function shuffle() {
        shuffle($this->cards);
    }
    
    /**
     * 
     * @return true|false
     */
    public function isDeckEmpty() {
        return count($this->cards) == 0;
    }

}
