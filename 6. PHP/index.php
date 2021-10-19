<?php

$name = "Elijah"; //set a variable

echo "<p>My name is $name </p>"; //echo displays a variable on the page

$string1 = "<p>This is the first string ";
$string2 = "and this is the second string</p>";

echo $string1.$string2; //concatenate strings and variables

$myNumber = 45;

$calculation = $myNumber * 31 / 97 + 4; //carry out maths functions

echo "The result of the calculation is ".$calculation;

$myBool = true; //true and false are 1 and 0 respectively in php

echo "<p>This statement is true? ".$myBool."</p>";

$variableName = "name"; //Can store a variable's name in another variable

echo "<p>".$$variableName."</p>"; //compiles to $ $name which was defined earlier as Elijah

$family = array("Elijah","Caleb","Poppy","Tara","Mark"); //create an array

$family[] = "Loraine"; //append to end of an array

print_r($family); //print contenets of array

echo "<p>".$family[1]."</p>"; //print array index

$anotherArray[0] = "pizza";
$anotherArray[1] = "yoghurt";
$anotherArray[5] = "coffee";
$anotherArray["myFavouriteFood"] = "ice cream"; //assign associative index

print_r($anotherArray);

echo"<br><br>";

$thirdArray = array(
	
	"France" => "French",
	"Ireland" => "Irish",
	"Germany" => "German");

unset($thirdArray["France"]); //remove value from array

print_r($thirdArray);

echo "<p> The array contains ".sizeof($thirdArray)." elements</p>"; //sizeOf($array) gets the length of the array

$age = 14;

if ($age >= 18) {

	echo "Damn boy, you old!";

} else {

	echo "Lol you can't even drink scrub!";

}

// AND operator is && and OR operator is || as per Java, JavaScript etc

//Loops

echo "<br>";

for ($i = 2;$i <= 30; $i++) {

	if ($i%2 == 0) {

		echo $i."<br>";

	} else {

		echo "$i is not even <br>";

	}

}

echo "<br>";

foreach ($family as $key => $value) { //loops through array key => value pairs more easily

	$family[$key] = $value." Reid"; //Appends it at the same time it is echoed so won't appear edited until called outside this loop
	
	echo "Array item ".$key." is ".$value."<br>";

}

for ($i = 0; $i < sizeOf($family); $i++) {

	echo "<p>".$family[$i]."</p>";

}

$i = 1;

while ($i <= 10) {

	$j = $i*10;
	
	echo $j."<br>";

	$i++;

}

$i = 0;
$whileArray = array("Oingo","Boingo","Mr Fandango");

while ($i < sizeOf($whileArray)) {

	echo $whileArray[$i]." ";
	$i++;

}

// GET variables

echo "<br><br>";

print_r($_GET); //GET can be variables encoded in a URL such as Youtube.com/?id=45515&time=240s&timestamp=1.81012310

echo "<br><br>";

echo "Hi there ".$_GET["name"]."!";

echo "<br><br>";

//GET can also fetch variables from forms and inputs, with submit buttons passing them to the URL

$testNum = $_GET["number"];
$factors = 0;

if(is_numeric($testNum) && $testNum > 0 && $testNum == round($testNum, 0)) {

	for ($i = 1; $i <= $testNum; $i++) {
		
		if (($testNum % $i)==0) {

			$factors++;

		}

	}

	if ($factors < 3) {

		echo $testNum." is a prime";

	} else {

		echo $testNum." is not a prime";
	}

} else {

	echo $testNum." is not a numeric value, please re-enter it.";

}

// POST doesn't need to be encoded in URL making it more secure

//print_r($_POST);

if ($_POST) {

	$usernames = array("Elijah","Caleb","Poppy","Tara","Mark");


	$isKnown = false;

	foreach ($usernames as $value) {
            
		if ($value == $_POST['firstName']) {
			
			$isKnown = true;
			
		}  
		
	}
	
	if ($isKnown) {
		
		echo "<br><br>";
		echo "Hi there ".$_POST['firstName']."!";
		
	} else {
		
		echo "<br><br>";
		echo "I don't know you.";
		
	}      
	
}

?>

<p>What's your name?</p>

<form>
	<input name="name" type="text"> 

	<input type="submit" value="Go!">
</form>


<p>Is this number prime?</p>

<form>
	<input name="number" type="text">

	<input type="submit" value="Go!">
</form>

<p>What's your first name?</p>

<form method="post">
	<input name="firstName" type="text"> 

	<input type="submit" value="Go!">
</form>