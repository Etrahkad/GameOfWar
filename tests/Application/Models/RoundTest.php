<?php

namespace Application\Models;

class RoundTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Round
     */
    protected $object;
    
    /**
     *
     * @var array of cards
     */
    protected $deck;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Round;
        
        $deck = new Deck();
        $deck->createDeck();
        
        $this->deck = $deck->getArray();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Application\Models\Round::setRoundNumber
     * @todo   Implement testSetRoundNumber().
     */
    public function testSetRoundNumber() {
        $this->object->setRoundNumber(1);
    }

    /**
     * @covers Application\Models\Round::getRoundNumber
     * @todo   Implement testGetRoundNumber().
     */
    public function testGetRoundNumber() {
        $this->assertEquals(0, $this->object->getRoundNumber());
    }

    /**
     * @covers Application\Models\Round::getPile
     * @todo   Implement testGetPile().
     */
    public function testGetPile() {
        $pile1 = $this->object->getPileDeck(1);
        $pile2 = $this->object->getPileDeck(2);
        
        $pile1->addCard($this->deck[0]);
        $pile1->addCard($this->deck[1]);
        $pile1->addCard($this->deck[2]);
        
        $pile2->addCard($this->deck[4]);
        $pile2->addCard($this->deck[5]);
        $pile2->addCard($this->deck[6]);
        
        $this->assertNotEquals($pile2->getArray(), $pile1->getArray());
    }

    /**
     * @covers Application\Models\Round::setVictorNumber
     * @todo   Implement testSetVictorNumber().
     */
    public function testSetVictorNumber() {
        $this->object->setVictorNumber(1);
    }

    /**
     * @covers Application\Models\Round::getVictorNumber
     * @todo   Implement testGetVictorNumber().
     */
    public function testGetVictorNumber() {
        $this->assertEquals(0, $this->object->getVictorNumber());
    }

    /**
     * @covers Application\Models\Round::setWar
     * @todo   Implement testSetWar().
     */
    public function testSetWar() {
        $this->object->setWar(true);
    }

    /**
     * @covers Application\Models\Round::getWar
     * @todo   Implement testGetWar().
     */
    public function testGetWar() {
        $this->object->setWar(true);
        $this->assertTrue($this->object->getWar());
    }

}
