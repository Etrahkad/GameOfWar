<?php

namespace Application\Models;

use Application\Types\Suit as CardSuit;
use Application\Types\Card as CardType;
use Application\Models\Card;

/**
 * Description of Deck
 *
 * @author tdubois
 */
class Deck extends \Application\Structures\Container {
    protected $cards = array();
    
    public function createDeck() {
        $suits = [];
        $types = [];
        
        for ($suitType = 0; $suitType < 4; $suitType++) {
            $suits[] = new CardSuit($suitType);
        }
        for ($typeIndex = 0; $typeIndex < 13; $typeIndex++) {
            $types[] = new CardType($typeIndex);
        }
        foreach ($suits as $suit) {
            foreach ($types as $type) {
                $this->cards[] = new Card($type, $suit);
            }
        }
    }

    public function getArray() {
        return $this->cards;
    }

    public function setArray(\Application\Structures\Container $container) {
        $this->cards = $container->getArray();
    }

}
