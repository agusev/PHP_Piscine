#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$i = 0;
	while($i++ < $argc)
	{
		$string .= " ".$argv[$i]." ";
	}
	$trimmed = trim($string);
	while ((strpos($trimmed, "  ")) == TRUE)
		$trimmed = str_replace("  ", " ", $trimmed);
	$tab = explode(" ", $trimmed);
	sort($tab);
	foreach ($tab as $elem)
		echo "$elem\n";
}
?>