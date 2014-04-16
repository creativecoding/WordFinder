<?php
/*
 * wordFinder
 * This script will generate an x-by-x grid full of random letters A-Z, then proceed to find all valid words in this grid going both horizontally and vertically.
*/
spl_autoload_register(function($class){
	include $class . ".class.php";
});

$grid = new Grid(10,10);
$solver = new Solver();
$solver->loadWordsFromFile("words.txt");
$found_words = $solver->solveGrid($grid);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>WordFinder</title>

	<style>
	table {
		border: 1px solid black;
	}

	td {
		padding: 5px 10px;
	}

	td.green {
		background-color: rgba(0,255,0,0.5);
	}

	td.yellow {
		background-color: rgba(255,255,0,0.2);
	}
	</style>
</head>
<body>

	<form>
		Width: <input type="text" 
	</form>

	<table>
		<tr><td><b>0</b></td><?php for($i=0; $i<$grid->width; $i++): echo '<td><b>' . ($i+1) . '</b></td>'; endfor; ?></tr>

		<?php foreach($grid->grid as $line_num => $line): ?>
			<tr><td><b><?php echo $line_num+1; ?></b></td><?php foreach($line as $letter): echo '<td>' . $letter . '</td>'; endforeach; ?></tr>
		<?php endforeach; ?>
	</table>

	<?php
	foreach($found_words as $found_word){
		echo 'Found word: ' . $found_word['word'] . ' (' . ($found_word['x']+1) . ', ' . ($found_word['y']+1) . ')<br/>';
	}
	?>
</body>
</html>