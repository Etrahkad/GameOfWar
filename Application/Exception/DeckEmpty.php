<?php

namespace Application\Exception;

/**
 * Description of DeckEmpty
 *
 * @author tdubois
 */
class DeckEmpty extends \Exception {
    public function __construct() {
        parent::__construct('Deck is empty');
    }
}
