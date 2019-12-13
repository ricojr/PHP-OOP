<?php
class Card {
	public $suit;
	public $face; 
	public $value;
	public function createImgStr($basePathToImage) {
		$linkToImage = $basePathToImage . $this->face . $this->suit . '.jpg'; 
		return $linkToImage;
	}
}
?>