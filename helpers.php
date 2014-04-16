<?php
/*
 * helpers.php
 * useful functions and stuff
*/

/*
 * arrayGetStringRange(array, int, int)
 * Concats and returns all strings between start and finish in array
*/
function arrayGetRange($array, $start, $finish){
	return implode('', array_slice($array, $start, $finish-$start));
}