//7<?php
$string = "KAK, DELA!";
for ($i = 0; $i < strlen($string); $i++) {
    echo $string[$i] . "\n";
}
?>
//8<?php
$string = "KAK, DELA!";
echo strrev($string);
?>
//9<?php
$string = "Анна";
if ($string == strrev($string)) {
    echo "Строка является палиндромом.";
} else {
    echo "Строка не является палиндромом.";
}
?>
//10<?php
$string = "KAK, DELA!";
$replaced_string = str_replace(" ", "_", $string);
echo $replaced_string;
?>
//11<?php
$string = "KAK, DELA!";
$words = explode(" ", $string);
$reversed_words = array_reverse($words);
echo implode(" ", $reversed_words);
?>