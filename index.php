<?php

// Hamza Rachid
// https://www.instagram.com/hamzarachidya/
// https://hamzarachid.com

$ip = $_SERVER['REMOTE_ADDR'];

// API with IP address
$url = "http://www.geoplugin.net/json.gp?ip=" . $ip;

// Get requested data
$userInfo = file_get_contents($url);

// Convert JSON to array
$result = json_decode($userInfo, true);

// Define regions you will attend and their corresponding pages
$regions_to_attend = array(
    "Region1" => "page1.php",
    "Region2" => "page2.php",
    // Add more regions as needed
);

// Define restricted regions
$restricted_regions = array(
    "Morocco",
    // Add more restricted regions as needed
);

// Check if the region is one you will attend
$region = $result['geoplugin_countryName'];

// Check if the region is in the list of restricted regions
if (in_array($region, $restricted_regions)) {
    header("Location: https://hamzarachid.com/");
    exit();
}

// If the user's region is one you will attend, redirect them to the corresponding page
if (array_key_exists($region, $regions_to_attend)) {
    $redirect_page = $regions_to_attend[$region];
    header("Location: $redirect_page");
    exit();
}


?>