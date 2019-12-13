<?php
require 'card.class.php'; 
 
//In this version of BJ Ace is 11 by default
//if it is paired with J, Q or K, it will become 1.
class Deck {
	public $_cards = array();
	private $_faces = array (2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K", "A");
	private $_suits = array ("d","h","c","s");
	public function __construct() {
		foreach ($this->_faces as $face) {
			foreach ($this->_suits as $suit) {
				
				switch ($face) {
					case "J":
						$value = 10;
						break;
					case "Q":
						$value = 10;
						break;
					case "K":
						$value = 10;
						break;
					case "A":
						$value = 11;
						break;
					default:
						if(is_numeric($face)) {
							$value = $face;
						} else { 
							$value = 1;
						}
				}
				$card = new Card();
				$card->face = $face;
				$card->suit = $suit;
				$card->value = $value; 
				array_push($this->_cards, $card);
			}
		}
		 
	}
	public function showDeckCards() {
		foreach ($this->_cards as $card) {
			$card->createImgStr('');
		}
	}
	public function showScoreCards() {
		foreach ($this->_cards as $card) {
			$card_value = $card->getTheCardValue();
		}
	}
}
?>