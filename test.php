<?php
require_once('function.php');


$test="I Love YOu do you love me we are happy family";

//$test2=contoarray($test);
//print_r($test2);
//echo PHP_EOL;
$word="I love you fuck";
//$word2=contoarray($word);
//print_r($word2);
//echo PHP_EOL;

 $table=kmptable($word);
//print_r($table);
// echo PHP_EOL;
// if(kmp($table, $word, $test))
// {
// 	echo "fuck";
// }else
// {
// 	echo "no f";
// }
$result=LCS($test,$word);

echo $result;



?>
