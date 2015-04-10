<?php

namespace Application\Structures;

use \Application\Models\Card;
use \Application\Structures\CardContainer;
use Application\Exception\DeckEmpty;

/**
 * Description of CardQueue
 *
 * @author tdubois
 */
class CardQueue extends CardContainer {
    /**
     * @param \Application\Models\Card $card
     * @return \Application\Structures\CardQueue
     */
    public function addCard(Card $card) {
        array_push($this->cards, $card);
        return $this;
    }

    /**
     * @return \Application\Models\Card
     */
    public function getCard() {
        if (!count($this->cards)) {
            throw new DeckEmpty();
        }
        return array_shift($this->cards);
    }
}
