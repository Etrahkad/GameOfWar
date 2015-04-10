<?php

namespace Application\Structures;

class PileTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Pile
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Pile;
        
        $two = new \Application\Types\Card(0);
        $ace = new \Application\Types\Card(12);
        
        $hearts = new \Application\Types\Suit(0);
        $diamonds = new \Application\Types\Suit(1);
        
        $this->firstCard = new \Application\Models\Card($two, $hearts);
        $this->secondCard = new \Application\Models\Card($ace, $diamonds);
        $this->thirdCard = new \Application\Models\Card($ace, $diamonds);
        $this->fourthCard = new \Application\Models\Card($ace, $diamonds);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Application\Structures\Pile::getPile
     * @todo   Implement testGetPile().
     */
    public function testGetPile() {
        $this->assertTrue($this->object->getPile()->isDeckEmpty());
    }

    /**
     * @covers Application\Structures\Pile::placeOnPile
     * @todo   Implement testPlaceOnPile().
     */
    public function testPlaceOnPile() {
        $this->object->placeOnPile($this->firstCard);
        $this->object->placeOnPile($this->secondCard);
        $this->assertEquals($this->secondCard, $this->object->getPile()->getCard());
    }

}
