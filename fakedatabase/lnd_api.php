<?php 
header ('Content-Type: application/json');

//Simulated database data for LADS characters
//This is a 2d array

$Li = [
    ["id"=>1, "name"=>"Xavier","age"=> "Uknown","DOB"=>"October 16", "Occupation"=>"DeepSpace Hunter", "Evol"=>"Light"], 
    ["id"=>2, "name"=>"Zayne","age"=> "27","DOB"=>"September 5", "Occupation"=>"Cardiac Surgeon", "Evol"=>"Ice"], 
    ["id"=>3, "name"=>"Rafayellli","age"=> "24","DOB"=>"March 6", "Occupation"=>"Artist", "Evol"=>"Fire"], 
    ["id"=>4, "name"=>"Sylus","age"=> "28","DOB"=>"April 18", "Occupation"=>"OnychinusLeader", "Evol" => "Energy Manipulation"], 
    ["id"=>5, "name"=>"Caleb","age"=> "25","DOB"=>"June 13", "Occupation"=>"Farspaspace Fleet Colonel", "Evol"=>"Gravity Manipulation" ],
];
//api logic

$name = $_GET['name'] ?? null; 
//$_GET is a superglobal variable in PHP that is used to collect data sent in the URL query string.

if ($name) { 
    $filteredLi = array_filter ($Li, fn ($c) => strtolower($c['name'])=== strtolower($name));
    //we made $filteredLi variable to store the filtered results
    //array_filter is a built-in PHP function that filters elements of an array using a callback function.
    //fn means function
    //($c) here represents each character ('name) in the $Li array
    //strtolower is a built-in PHP function that converts a string to lowercase
    //$c['name'] accesses the 'name' attribute of the current character being evaluated in the array
    //=== is a strict comparison operator that checks for both value and type equality
    /* If it matches, this function returns true → array_filter keeps this character
       If it doesn’t match 
            → returns false → array_filter ignores this character*/
    echo json_encode (array_values($filteredLi));
    //$filteredLi = all characters whose name matches the URL parameter
    //array_values is a built-in PHP function that returns all the values from an array and indexes them numerically
} else {
    echo json_encode ($Li);
    //this returns the entire $Li array as a JSON response
    //json_encode is a built-in PHP function that converts a PHP array or object into a JSON string
    //JSON (JavaScript Object Notation)- a lightweight data-interchange format that is easy for humans to read and write, and easy for machines to parse and generate.
}
//
?>
