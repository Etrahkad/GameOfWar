<?php

namespace Application\Models;

use Application\Controller\Log;

use Application\Models\Card;

use Application\Types\Card as CardType;
use Application\Types\Suit as CardSuit;

/**
 * The Typical Dealer of any game
 *
 * @author tdubois
 */
class Dealer {
    protected $deck;
    
    /**
     * @return \Application\Models\Dealer
     */
    public function __construct() {
        $this->deck = new \Application\Structures\CardStack();
        return $this;
    }
    
    /**
     * @return \Application\Structures\CardStack
     */
    public function getDeck() {
        return $this->deck;
    }
    
    /**
     * Shuffle the deck
     */
    public function shuffleDeck() {
        $deck_array = $this->deck->getArray();
        if (!$deck_array) {
            
            $deckOfCards = new Deck();
            $deckOfCards->createDeck();
            
            $this->deck->setArray($deckOfCards);
        }
        
        foreach (range(0, rand(1,3)) as $used) {
            $this->deck->shuffle();
        }
        
        Log::log('Cards Shuffled');
    }
    
    /**
     * @return \Application\Models\Card
     */
    public function dealCard() {
        return $this->deck->getCard();
    }
}
