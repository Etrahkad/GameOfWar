<?php

namespace Application\Structures;

use Application\Models\Dealer;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-10 at 09:32:51.
 */
class CardStackTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Container
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new CardStack();
        $this->dealer = new Dealer();
        $this->dealer->shuffleDeck();
        
    }
    
    /**
     * @covers Application\Structures\CardStack::addCard
     * @todo   Implement testAddCard().
     */
    public function testAddCard() {
        $card = $this->dealer->dealCard();
        $this->object->addCard($card);
    }
    
    /**
     * @covers Application\Structures\CardStack::getCard
     * @todo   Implement testGetCard().
     */
    public function testGetCard() {
        $card = $this->dealer->dealCard();
        $this->object->addCard($card);
        $this->assertEquals($card, $this->object->getCard());
    }
    
    /**
     * @covers Application\Structures\CardStack::getTopCard
     * @todo   Implement testGetTopCard().
     */
    public function testGetTopCard() {
        $card = $this->dealer->dealCard();
        $this->object->addCard($card);
        $this->assertEquals($card, $this->object->getTopCard());
    }
    
    /**
     * @covers Application\Structures\CardStack::getCard
     * @expectedException Application\Exception\DeckEmpty
     */
    public function testGetEmptyDeck() {
        $card = $this->dealer->dealCard();
        $this->object->addCard($card);
        $this->object->getCard();
        $this->object->getCard();
    }
    
    public function testIsDeckEmpty() {
        $this->assertTrue($this->object->isDeckEmpty());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

}
