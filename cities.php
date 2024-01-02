<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/CitiesMorocco_List_of_Morroco_cities?limit=120&keys=asciiname');
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'X-Parse-Application-Id: lH4yp7FsJM6eu60nBN1G8wvnMZ9sRrjW3rQ1zdoJ', // This is your app's application id
    'X-Parse-REST-API-Key: h3rpMSqm6VgsVemJYbNeFNWzB8vkJfkCLQcPIKGC' // This is your app's REST API key
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Added this line to return the response as a string

$response = curl_exec($curl);

if ($response === false) {
    die('Curl error: ' . curl_error($curl));
}

$data = json_decode($response, true);

if (json_last_error() != JSON_ERROR_NONE) {
    die('JSON decode error: ' . json_last_error_msg());
}

curl_close($curl);

$cities = array();

// Fill in the cities array
if (isset($data['results']) && is_array($data['results'])) {
    $i = 1;
    foreach ($data['results'] as $result) {
        $cities[$i] = $result['asciiname'];
        $i++;
    }
}

//IF you want to show the array content
// echo "<br><br>THE CONTENT OF THE ARRAY:<br>";
// foreach ($cities as $objectId => $city) {
//     echo "Object ID: $objectId, City: $city<br>";
// }

// ### If you want to use the cities array in your php page just add:
// include("cities.php");
// ### you can test this code:
// include("cities.php");
//print_r($cities); // Show a all the cities
//print_r($cities[2]); // Show a city

?>