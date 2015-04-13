<?php

namespace Application\Models;

use Application\Models\Player;

use Application\Controller\Log;

/**
 * A round in the game
 *
 * @author tdubois
 */
class Round {
    /**
     * @var integer
     */
    protected $roundNumber = 0;
    /**
     * @var \Application\Structures\Pile
     */
    protected $player1Hand;
    /**
     * @var \Application\Structures\Pile
     */
    protected $player2Hand;
    
    /**
     * @var integer
     */
    protected $victorNumber;
    
    /**
     * @var Boolean
     */
    protected $isWar;
    
    public function __construct() {
        $this->player1Hand = new \Application\Structures\Pile();
        $this->player2Hand = new \Application\Structures\Pile();
    }
    
    /**
     * @param integer $roundNumber
     * @return \Application\Models\Round
     */
    public function setRoundNumber($roundNumber) {
        $this->roundNumber = $roundNumber;
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getRoundNumber() {
        return $this->roundNumber;
    }
    
    /**
     * Get particular player pile
     * 
     * @param type $playerNumber
     * @return \Application\Structures\Pile
     */
    public function getPile($playerNumber) {
        $return = null;
        
        switch ($playerNumber) {
            case 1:
                $return = $this->player1Hand;
                break;
            case 2:
                $return = $this->player2Hand;
                break;
        }
        
        return $return;
    }
    
    /**
     * Get particular player pile's deck
     * 
     * @param type $playerNumber
     * @return \Application\Structures\CardStack
     */
    public function getPileDeck($playerNumber) {
        $return = null;
        
        switch ($playerNumber) {
            case 1:
                $return = $this->player1Hand->getPile();
                break;
            case 2:
                $return = $this->player2Hand->getPile();
                break;
        }
        
        return $return;
    }
    
    public function setVictorNumber($victorNumber) {
        $this->victorNumber = $victorNumber;
    }
    public function getVictorNumber() {
        return $this->victorNumber;
    }
    
    public function setWar($isWar) {
        $this->isWar = $isWar == true;
    }
    
    public function getWar() {
        return $this->isWar;
    }
    
    public function __toString() {
        $endString = [];
        
        $endString[] = 'Round ' . $this->getRoundNumber();
        
        if ($this->victorNumber) {
            if ($this->victorNumber == 1) {
                $endString[] = 'Player 1 Victor';
            } elseif ($this->victorNumber == 2) {
                $endString[] = 'Player 2 Victor';
            } else {
                $endString[] = 'Neither player victory';
            }
        }
        
        $endString[] = "Player 1" . $this->player1Hand;
        $endString[] = "Player 2" . $this->player2Hand;
        
        return implode("\n", $endString);
    }
}
