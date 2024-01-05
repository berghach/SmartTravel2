<?php

require_once "City.php";

class CityDAO {



    function getCities() {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/CitiesMorocco_List_of_Morroco_cities?limit=120&keys=asciiname,population');
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
            foreach ($data['results'] as $result) {
                // $cities[$result['objectId']] = $result['asciiname'];
                $cityId = $result['objectId'];
                $cityName = $result['asciiname'];
                $population = $result['population'];
                $cities[] = new City($cityId, $cityName, $population);
            }
        }


        return $cities;

    }


    

    function getCityById($id) {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/List_of_Morroco_cities/'. $id .'?keys=asciiname,population');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-Parse-Application-Id: 2ZOfB60kP39M5kE4WynRqyP7lNGKZ9MB8fVWqAM9',
            'X-Parse-Master-Key: Qq7lEIoEEzRris3IM6POE5ewvYuzACVyA6VKtiVb'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        
        // Check for cURL errors
        if (curl_errno($curl)) {
            echo 'Curl error: ' . curl_error($curl);
        }
        
        curl_close($curl);
        
        $data = json_decode($response, true);
        

        if ($data !== null && isset($data['objectId'], $data['asciiname'], $data['population'])) {
            $cityId = $data['objectId'];
            $cityName = $data['asciiname'];
            $population = $data['population'];
            // return new City($cityId, $cityName, $population);
            return $cityName;
        } else {
            return new City(null, null, null);
        }
        
    }



}


// $cityDAO = new CityDAO();

// $cityDAO->getCities();
// $cityDAO->getCityById("gjqc06cSGd");

// $result = $cityDAO->getCityById('gjqc06cSGd');

// // print_r("+++++++++++++");
// print_r($result->getName());


// $cities = $cityDAO->getCities();

// print_r($cities);

?>