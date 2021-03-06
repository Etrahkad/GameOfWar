<?php

namespace Application\Models;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-13 at 05:54:21.
 */
class DeckTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Deck
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Deck;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Application\Models\Deck::createDeck
     * @todo   Implement testCreateDeck().
     */
    public function testCreateDeck() {
        $this->object->createDeck();
    }

    /**
     * @covers Application\Models\Deck::getArray
     * @todo   Implement testGetArray().
     */
    public function testGetArray() {
        $this->object->createDeck();
        $arr = $this->object->getArray();
        $string_array = [];
        
        foreach ($arr as $card) {
            $string_array[] = "$card";
        }
        
        $this->assertEquals($this->getExpectedArray(), $string_array);
    }

    
    private function getExpectedArray() {
        return array (
            0 => 'Two of Hearts',
            1 => 'Three of Hearts',
            2 => 'Four of Hearts',
            3 => 'Five of Hearts',
            4 => 'Six of Hearts',
            5 => 'Seven of Hearts',
            6 => 'Eight of Hearts',
            7 => 'Nine of Hearts',
            8 => 'Ten of Hearts',
            9 => 'Jack of Hearts',
            10 => 'Queen of Hearts',
            11 => 'King of Hearts',
            12 => 'Ace of Hearts',
            13 => 'Two of Diamonds',
            14 => 'Three of Diamonds',
            15 => 'Four of Diamonds',
            16 => 'Five of Diamonds',
            17 => 'Six of Diamonds',
            18 => 'Seven of Diamonds',
            19 => 'Eight of Diamonds',
            20 => 'Nine of Diamonds',
            21 => 'Ten of Diamonds',
            22 => 'Jack of Diamonds',
            23 => 'Queen of Diamonds',
            24 => 'King of Diamonds',
            25 => 'Ace of Diamonds',
            26 => 'Two of Spades',
            27 => 'Three of Spades',
            28 => 'Four of Spades',
            29 => 'Five of Spades',
            30 => 'Six of Spades',
            31 => 'Seven of Spades',
            32 => 'Eight of Spades',
            33 => 'Nine of Spades',
            34 => 'Ten of Spades',
            35 => 'Jack of Spades',
            36 => 'Queen of Spades',
            37 => 'King of Spades',
            38 => 'Ace of Spades',
            39 => 'Two of Clubs',
            40 => 'Three of Clubs',
            41 => 'Four of Clubs',
            42 => 'Five of Clubs',
            43 => 'Six of Clubs',
            44 => 'Seven of Clubs',
            45 => 'Eight of Clubs',
            46 => 'Nine of Clubs',
            47 => 'Ten of Clubs',
            48 => 'Jack of Clubs',
            49 => 'Queen of Clubs',
            50 => 'King of Clubs',
            51 => 'Ace of Clubs',
        );
    }
}
