<?php

namespace Application\Structures;

use Application\Exception\DeckEmpty;

/**
 * Stack of cards (using the stack pattern of pop/push)
 *
 * @author tdubois
 */
class CardStack extends CardContainer {
    /**
     * @param \Application\Models\Card $card
     * @return \Application\Structures\CardStack
     */
    public function addCard(\Application\Models\Card $card) {
        array_push($this->cards, $card);
        return $this;
        // "Application\Structures\CardStack" Application/Structures/CardStack.php "Application\Structures\CardStackTest" tests/Application/Structures/CardStackTest.php
    }

    /**
     * @return \Application\Models\Card
     * @throws \Application\Exception\DeckEmpty
     */
    public function getCard() {
        if (!count($this->cards)) {
            throw new DeckEmpty('Unable to retrieve card');
        }
        return array_pop($this->cards);
    }
    
    /**
     * @return \Application\Models\Card
     */
    public function getTopCard() {
        $idxEnd = count($this->cards);
        return $this->cards[$idxEnd-1];
    }
}
