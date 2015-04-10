<?php

namespace Application\Models;

use Application\Structures\Container;
use Application\Structures\CardContainer;
use Application\Structures\CardQueue;

/**
 * Description of Player
 *
 * @author tdubois
 */
class Player {
    protected $deck;
    protected $name;
    
    /**
     * @return \Application\Models\Player
     */
    public function __construct() {
        $this->deck = new CardQueue();
        return $this;
    }
    
    /**
     * @return \Application\Structures\CardQueue
     */
    public function getDeck() {
        return $this->deck;
    }
    
    /**
     * @return Integer
     */
    public function numCards() {
        return $this->deck->getCount();
    }
    
    /**
     * @return \Application\Models\Card
     */
    public function playCard() {
        return $this->deck->getCard();
    }
    
    /**
     * 
     * @param \Application\Structures\CardContainer $cards
     * @return \Application\Models\Player
     */
    public function winCards(CardContainer $cards) {
        foreach ($cards->getArray() as $card) {
            $this->deck->addCard($card);
        }
        return $this;
    }
    
    /**
     * @param \Application\Structures\Container $cards
     * @return \Application\Models\Player
     */
    public function setDeck(Container $cards) {
        $this->deck->setArray($cards);
        return $this;
    }
    
    /**
     * @return String
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * @param String $name
     * @return \Application\Models\Player
     */
    public function setName($name) { 
        $this->name = $name;
        return $this;
    }
}
