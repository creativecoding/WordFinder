<?php
class Solver {
	public $words;

	public function __construct(){
		$words = array();
	}

	public function solveGrid($grid){
		$found_words = array();

		// How we're gonna do this is select all possible selections in the grid, then search the wordbank for them.
		for($y=0; $y<$grid->height; $y++){
			for($x=0; $x<$grid->width; $x++){
				$length = 1;
				while($length+$x !== $grid->width+1){
					$word = implode('', array_slice($grid->grid[$y], $x, $length));
					if(in_array($word, $this->words)){
						$found_words[] = array("word" => $word, "x" => $x, "y" => $y, "down" => false);
					}
					$length++;
				}
			}
		}
		for($x=0; $x<$grid->width; $x++){
			for($y=0; $y<$grid->height; $y++){
				$length = 1;
				while($length+$y !== $grid->height+1){
					$word = '';
					for($i=0; $i<$length; $i++){
						$word .= $grid->grid[$y+$i][$x];
					}
					
					if(in_array($word, $this->words)){
						$found_words[] = array("word" => $word, "x" => $x, "y" => $y, "down" => true);
					}
					$length++;
				}
			}
		}

		return $found_words;
	}

	public function loadWordsFromFile($words_file){
		if(file_exists($words_file)){
			$words_raw = file_get_contents($words_file);
			$this->words = explode("\n", str_replace("\r\n", "\n", $words_raw));
		} else {
			throw new Exception("Words file does not exist");
		}
	} 
}