<?php
/*
 * grid.class.php
 * This class will create a new random grid when initiated.
*/
class Grid {
	public $grid;
	public $width, $height;

	public function __construct($width, $height){
		if($width <= 0 || $height <= 0){
			throw new Exception("Grid cannot be smaller than 1 both vertically and horizontally");
		}
		$this->grid = array();
		$this->width = $width;
		$this->height = $height;
		$this->generateGrid();
	}

	/*
	 * generateGrid()
	 * This will generate a new grid
	 * Warning: will overwrite previous grid.
	*/
	public function generateGrid(){
		$a_z = "abcdefghijklmnopqrstuvwxyz";
		for($vertical_i=0; $vertical_i<$this->height; $vertical_i++){
			for($horizontal_i=0; $horizontal_i<$this->width; $horizontal_i++){
				$random_letter = $a_z[mt_rand(0,21)];
				$this->grid[$vertical_i][$horizontal_i] = $random_letter;
			}
		}
	}
}