<?php
// Define the directory where the XML files will be saved
$xmlDirectory = 'xml/';

// Check if the directory exists, if not, create it
if (!is_dir($xmlDirectory)) {
    mkdir($xmlDirectory, 0777, true);  // Create the directory with the appropriate permissions
}

// Process form data when submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $city_name = $_POST['city_name'];
    $country = $_POST['country'];
    $continent = $_POST['continent'];
    $description = $_POST['description'];
    $sites = $_POST['sites'];
    $hotels = isset($_POST['hotels']) ? $_POST['hotels'] : [];
    $restaurants = isset($_POST['restaurants']) ? $_POST['restaurants'] : [];
    $stations = isset($_POST['stations']) ? $_POST['stations'] : [];
    $airports = isset($_POST['airports']) ? $_POST['airports'] : [];

    // Step 1: Create or update NomVille.xml (city-specific XML)
    $cityFile = $xmlDirectory . $city_name . '.xml';
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true; // Optional: formats the XML nicely

    $root = $dom->createElement('ville');
    $root->setAttribute('nom', $city_name);
    
    // Add descriptif
    $descriptif = $dom->createElement('descriptif', $description);
    $root->appendChild($descriptif);
    
    // Add sites
    $sitesElement = $dom->createElement('sites');
    foreach ($sites as $index => $site) {
        $siteElement = $dom->createElement('site');
        $siteElement->setAttribute('nom', $site);
        // Assuming the file upload for site photos is handled separately
        $photo = $_FILES['site_photos']['name'][$index];
        $photoElement = $dom->createElement('photo', $photo);
        $siteElement->appendChild($photoElement);
        $sitesElement->appendChild($siteElement);
    }
    $root->appendChild($sitesElement);

    // Add hotels
    $hotelsElement = $dom->createElement('hotels');
    foreach ($hotels as $hotel) {
        $hotelElement = $dom->createElement('hotel', $hotel);
        $hotelsElement->appendChild($hotelElement);
    }
    $root->appendChild($hotelsElement);

    // Add restaurants
    $restaurantsElement = $dom->createElement('restaurants');
    foreach ($restaurants as $restaurant) {
        $restaurantElement = $dom->createElement('restaurant', $restaurant);
        $restaurantsElement->appendChild($restaurantElement);
    }
    $root->appendChild($restaurantsElement);

    // Add stations
    $stationsElement = $dom->createElement('gares');
    foreach ($stations as $station) {
        $stationElement = $dom->createElement('gare', $station);
        $stationsElement->appendChild($stationElement);
    }
    $root->appendChild($stationsElement);

    // Add airports
    $airportsElement = $dom->createElement('aeroports');
    foreach ($airports as $airport) {
        $airportElement = $dom->createElement('aeroport', $airport);
        $airportsElement->appendChild($airportElement);
    }
    $root->appendChild($airportsElement);

    // Save the city-specific XML file in the xml directory
    $dom->appendChild($root);
    $dom->save($cityFile);

    // Step 2: Update Villes.xml (central registry XML)
    $villesFile = $xmlDirectory . 'Villes.xml';
    if (!file_exists($villesFile)) {
        // Create Villes.xml if it doesn't exist
        $villesDom = new DOMDocument('1.0', 'UTF-8');
        $villesDom->formatOutput = true;
        $rechercheElement = $villesDom->createElement('recherche');
        $villesDom->appendChild($rechercheElement);
    } else {
        $villesDom = new DOMDocument();
        $villesDom->load($villesFile);
    }

    $paysElement = $villesDom->createElement('pays');
    $paysElement->setAttribute('nom', $country);

    $villeElement = $villesDom->createElement('ville');
    $villeElement->setAttribute('nom', $city_name);

    // Add sites for search
    $sitesElement = $villesDom->createElement('sites');
    foreach ($sites as $site) {
        $siteElement = $villesDom->createElement('site', $site);
        $sitesElement->appendChild($siteElement);
    }
    $villeElement->appendChild($sitesElement);

    // Add the city to the country
    $paysElement->appendChild($villeElement);

    // Append country to the recherche element
    $villesDom->getElementsByTagName('recherche')->item(0)->appendChild($paysElement);

    // Save the updated Villes.xml in the xml directory
    $villesDom->save($villesFile);

    // Redirect or display success message
    echo "Ville ajoutée avec succès!";
}
?>
