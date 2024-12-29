<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ville</title>
    <link rel="stylesheet" href="css/styles.css?v=1">
    <style>
        /* Your existing styles */
    </style>
</head>
<body>
    <header>
        <h1>Ajouter Ville</h1>
    </header>

    <main>
        <form action="submit_form.php" method="POST" class="add-city-form" enctype="multipart/form-data">
            <!-- City Name -->
            <label for="city_name">Ville:</label>
            <input type="text" id="city_name" name="city_name" required placeholder="Entrez le nom de la ville" size="40">

            <!-- Country -->
            <label for="country">Pays:</label>
            <input type="text" id="country" name="country" required placeholder="Entrez le pays" size="40">

            <!-- Continent -->
            <label for="continent">Continent:</label>
            <input type="text" id="continent" name="continent" required placeholder="Entrez le continent" size="40">

            <!-- Description -->
            <label for="description">Descriptif:</label>
            <textarea id="description" name="description" required placeholder="Entrez la description de la ville" rows="5" cols="40"></textarea>

            <!-- Sites -->
            <label for="sites">Sites (1 ou plusieurs):</label>
            <div id="sites-container">
                <div class="dynamic-field">
                    <input type="text" name="sites[]" placeholder="Entrez un site" required>
                    <input type="file" name="site_photos[]" accept="image/*" required>
                    <span class="add-more" onclick="addSiteField()">+ Ajouter un autre site</span>
                </div>
            </div>

            <!-- Hotels -->
            <label for="hotels">Hôtels (0 ou plusieurs):</label>
            <div id="hotels-container">
                <div class="dynamic-field">
                    <input type="text" name="hotels[]" placeholder="Entrez un hôtel" size="40">
                    <span class="add-more" onclick="addHotelField()">+ Ajouter un autre hôtel</span>
                </div>
            </div>

            <!-- Restaurants -->
            <label for="restaurants">Restaurants (0 ou plusieurs):</label>
            <div id="restaurants-container">
                <div class="dynamic-field">
                    <input type="text" name="restaurants[]" placeholder="Entrez un restaurant" size="40">
                    <span class="add-more" onclick="addRestaurantField()">+ Ajouter un autre restaurant</span>
                </div>
            </div>

            <!-- Gares -->
            <label for="stations">Gares (0 ou plusieurs):</label>
            <div id="stations-container">
                <div class="dynamic-field">
                    <input type="text" name="stations[]" placeholder="Entrez une gare" size="40">
                    <span class="add-more" onclick="addStationField()">+ Ajouter une autre gare</span>
                </div>
            </div>

            <!-- Airports -->
            <label for="airports">Aéroports (0 ou plusieurs):</label>
            <div id="airports-container">
                <div class="dynamic-field">
                    <input type="text" name="airports[]" placeholder="Entrez un aéroport" size="40">
                    <span class="add-more" onclick="addAirportField()">+ Ajouter un autre aéroport</span>
                </div>
            </div>

            <button type="submit">Soumettre</button>
        </form>
    </main>

    <script>
        // Add new site field
        function addSiteField() {
            const siteContainer = document.getElementById('sites-container');
            const newField = document.createElement('div');
            newField.classList.add('dynamic-field');
            newField.innerHTML = `
                <input type="text" name="sites[]" placeholder="Entrez un site" required>
                <input type="file" name="site_photos[]" accept="image/*" required>
                <span class="remove" onclick="removeField(this)">X</span>
            `;
            siteContainer.appendChild(newField);
        }

        // Add other dynamic field functions (similar to addSiteField) for hotels, restaurants, etc.

        // Remove the dynamic field
        function removeField(element) {
            element.parentElement.remove();
        }
    </script>
</body>
</html>
