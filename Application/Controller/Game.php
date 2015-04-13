<?php

namespace Application\Controller;

use Application\Models\Player;
use Application\Models\Dealer;
use Application\Models\Round;

/**a
 * Description of Game
 *
 * @author tdubois
 */
class Game {
    /**
     * @var \Application\Models\Player 
     */
    protected $player1;
    /**
     * @var \Application\Models\Player 
     */
    protected $player2;
    /**
     * @var \Application\Models\Dealer 
     */
    protected $dealer;
    /**
     * @var array
     */
    protected $rounds = array();
    /**
     * @var integer
     */
    protected $roundNumber = 1;
    
    public function __construct() {
        $this->player1 = new Player();
        $this->player2 = new Player();
        $this->dealer = new Dealer();
    }
    
    protected function setupStage() {
        $this->player1->setName('Player 1');
        $this->player2->setName('Player 2');
        $this->dealer->shuffleDeck();
    }
    
    /**
     * 
     * @param type $playerNum
     * @return \Application\Models\Player 
     */
    public function getPlayer($playerNum) { 
        $player = null;
        switch ($playerNum) {
            case 1:
                $player = $this->player1;
                break;
            case 2:
                $player = $this->player2;
                break;
        }
        return $player;
    }
    
    protected function dealCards() {
        while ($this->dealer->getDeck()->getCount()) {
            $this->player1->getDeck()->addCard($this->dealer->dealCard());
            $this->player2->getDeck()->addCard($this->dealer->dealCard());
        }
    }
    
    public function run() {
        ini_set('memory_limit', '500M');
        Log::clearLog();
        
        $this->setupStage();
        $this->dealCards();
        
        $continueGame = true;
        while($continueGame && $this->roundNumber < 100000) {
            $continueGame = $this->playRound();
        };
        
        Log::outputLog(__DIR__ . '/gameoutput.txt');
    }
    
    
    public function calculateRoundWinner(Round $round) {
        $playerVictor = 0;
        
        $player1Pile = $round->getPile(1);
        $player2Pile = $round->getPile(2);
        
        $player1CardValue = $player1Pile->getPile()->getTopCard()->getType()->getValue();
        $player2CardValue = $player2Pile->getPile()->getTopCard()->getType()->getValue();
        
        if ($player1CardValue > $player2CardValue) {
            $playerVictor = 1;
        } else if ($player1CardValue < $player2CardValue) {
            $playerVictor = 2;
        }
        
//        echo "\ncalculateRoundWinner\n";
//        echo "Round = ", $round->getRoundNumber(), "\n";
//        echo 'Player 1 top card = ', $player1Pile->getPile()->getTopCard(), "\n";
//        echo 'Player 2 top card = ', $player2Pile->getPile()->getTopCard(), "\n";
//        echo 'Player victor = ', $playerVictor, " ", $player1CardValue, " ", $player2CardValue, "\n";
        
        return $playerVictor;
    }
    
    public function doWar(Round $round) {
        $round->setRoundNumber($round->getRoundNumber() + 0.1);
//        echo "\n", 'DoWar', "\n";
//        echo 'Round ', $round->getRoundNumber(), "\n";
        
        $round->setWar(true);
        $victorNumber = 0;
        
        $player1Pile = $round->getPile(1);
        $player2Pile = $round->getPile(2);
        
//        echo 'Player 1 Pile before card count = ', $player1Pile->getPile()->getCount(), "\n";
//        echo 'Player 2 Pile before card count = ', $player2Pile->getPile()->getCount(), "\n";
        
        $player1RunOutOfCards = false;
        $player2RunOutOfCards = false;
        
        try {
            $player1Pile->placeOnPile($this->player1->playCard());
            $player1Pile->placeOnPile($this->player1->playCard());
        } catch (\Application\Exception\DeckEmpty $ex) {
            $player1RunOutOfCards = true;
        }
        try {
            $player2Pile->placeOnPile($this->player2->playCard());
            $player2Pile->placeOnPile($this->player2->playCard());
        } catch (\Application\Exception\DeckEmpty $ex) {
            $player2RunOutOfCards = true;
        }
        
//        echo 'Player 1 Pile after card count = ', $player1Pile->getPile()->getCount(), "\n";
//        echo 'Player 2 Pile after card count = ', $player2Pile->getPile()->getCount(), "\n";
        
        $victorNumber = $this->calculateRoundWinner($round);
        
        if (!$player1RunOutOfCards and !$player2RunOutOfCards) {
//            echo "\n", "Player Victor = ", $victorNumber, "\n";
            
            if ($victorNumber === 0) {
                return $this->doWar($round);
            }
        }
        
        if ($player1RunOutOfCards and !$player2RunOutOfCards) {
            $victorNumber = 2;
        } else if (!$player1RunOutOfCards and $player2RunOutOfCards) {
            $victorNumber = 1;
        } else if ($player1RunOutOfCards and $player2RunOutOfCards) {
            $victorNumber = -1;
        }
        
//        echo "\nReturning victor number = ", $victorNumber, "\n";
        
        return $victorNumber;
    }
    
    public function playRound(Round $round = null) {
        if (!$round) {
            $round = new Round();
        }
        $round->setRoundNumber($this->roundNumber++);
        
        $rounds[] = $round;
        
        $player1Pile = $round->getPile(1);
        $player2Pile = $round->getPile(2);
        
        $isRoundOver = false;
        $continueGame = true;
        
        Log::log('Player 1 Card Count = ' . $this->player1->getDeck()->getCount());
        Log::log('Player 2 Card Count = ' . $this->player2->getDeck()->getCount());
        
        
        try {
            $player1Pile->placeOnPile($this->player1->playCard());
            //Log::log('Placing From Player 1 leaving cardCount = ' . $this->player1->getDeck()->getCount());
            //Log::log($player1Pile->getPile()->getTopCard());

        } catch (\Application\Exception\DeckEmpty $ex) {}

        try {
            $player2Pile->placeOnPile($this->player2->playCard());

            //Log::log('Placing From Player 2 leaving cardCount = ' . $this->player2->getDeck()->getCount());
            //Log::log($player2Pile->getPile()->getTopCard());

        } catch (\Application\Exception\DeckEmpty $ex) {}

        $player1CardValue = $player1Pile->getPile()->getTopCard()->getType()->getValue();
        $player2CardValue = $player2Pile->getPile()->getTopCard()->getType()->getValue();

        $victor = $this->calculateRoundWinner($round);
        if ($victor == 0) {
            Log::log('Starting war');
//            echo "\n", 'Starting war', "\n";
            
            $victor = $this->doWar($round);
            
//            echo "\nVictor = ", $victor, "\n";

            if ($victor) {
                $round->setVictorNumber($victor);
            } elseif ($victor === 0) {
                throw new Exception('The round had an error');
            } elseif ($victor === -1) {
                $continueGame = false;
            }
        } else if ($victor) {
            $round->setVictorNumber($victor);
        }
        
        if ($continueGame) {
            // Lets do calculations
            switch ($round->getVictorNumber()) {
                case 1:
                    $this->player1->winCards($player1Pile->getPile());
                    $this->player1->winCards($player2Pile->getPile());
                    break;
                case 2:
                    $this->player2->winCards($player1Pile->getPile());
                    $this->player2->winCards($player2Pile->getPile());
                    break;
            }
            Log::log($round);
        } else {
            Log::log('The Game is a Draw');
        }
        
        if ($this->player1->getDeck()->getCount() === 0 || $this->player2->getDeck()->getCount() === 0) {
            $continueGame = false;
        }
        
        return $continueGame;
    }
}
