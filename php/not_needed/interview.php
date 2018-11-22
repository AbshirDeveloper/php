<?php



$array = array('a', 'b', 'c');

//remember that with array_shift you need to put the returned value in a variable

$a = array_shift($array);

//for this one, it only add the value to the array

array_unshift($array, 'a');

// the same to array_shift except that it's the end

$b = array_pop($array);

//the same as array_unshift except that it's the end

array_push($array, 'w');

// zero is january 1st 1970
//for times before 1970, i think you will need to use negative number to express that. the 32bit machines also provide 67 years before and after 1970. 

echo time()."</br />";

$abshir = mktime(1,1,1,1,1,2009);

echo date('M, d, Y', $abshir). "<br />";

$mid = strtotime('now');

echo date('M, d, Y', $mid);

//strstr return the string characters starting from the point you specify

echo strstr("hello world", "o");
?>