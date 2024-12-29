<?php
// Create a new DOMDocument instance
$dom = new DOMDocument();

// Suppress errors and load the XML file
libxml_use_internal_errors(true);  // Enable internal error handling
if ($dom->load('xml/Config.xml') === false) {
    echo "Error: Cannot load XML file.";
    foreach (libxml_get_errors() as $error) {
        echo "<br>Error: ", $error->message;
    }
    exit;
}

// Validate the XML against the DTD
if (!$dom->validate()) {
    echo "Error: XML does not validate against the DTD.<br>";
    foreach (libxml_get_errors() as $error) {
        echo "Line {$error->line}: {$error->message}<br>";
    }
    libxml_clear_errors(); // Clear errors after displaying
    exit;
}

// Proceed to parse the XML as you normally would
$header = $dom->getElementsByTagName('header')->item(0);
$nav = $dom->getElementsByTagName('nav')->item(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Guide</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="container">

        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <?php
            $students = $nav->getElementsByTagName('student');
            foreach ($students as $student):
            ?>
                <div class="student-info">
                    <h2>Etudiant</h2>
                    <p><strong>Nom:</strong> <?php echo $student->getElementsByTagName('nom')->item(0)->nodeValue; ?></p>
                    <p><strong>Prénom:</strong> <?php echo $student->getElementsByTagName('prenom')->item(0)->nodeValue; ?></p>
                    <p><strong>Spécialité:</strong> <?php echo $student->getElementsByTagName('specialite')->item(0)->nodeValue; ?></p>
                    <p><strong>Section:</strong> <?php echo $student->getElementsByTagName('section')->item(0)->nodeValue; ?></p>
                    <p><strong>Groupe:</strong> <?php echo $student->getElementsByTagName('groupe')->item(0)->nodeValue; ?></p>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo $student->getElementsByTagName('email')->item(0)->nodeValue; ?>"><?php echo $student->getElementsByTagName('email')->item(0)->nodeValue; ?></a></p>
                    <hr>
                </div>
            <?php endforeach; ?>
            <button class="btn add-city-btn" onclick="window.location.href='form.php';">
                <i class="fa fa-plus-circle"></i> Ajouter Ville
            </button>
        </nav>

        <!-- Main Content -->
        <div class="main-content">

            <!-- Header Section -->
            <header class="header">
                <img src="<?php echo $header->getElementsByTagName('img')->item(0)->getAttribute('src'); ?>" alt="Travel Site Banner" class="banner-image">
                <h1 class="site-title"><?php echo $header->getElementsByTagName('h1')->item(0)->nodeValue; ?></h1>
            </header>

            <!-- Search Section -->
            <section class="search-section">
                <h2 class="search-title"><em>Recherche</em></h2>
                <form id="search-form" class="search-form">
                    <div class="form-row">
                        <div class="input-group">
                            <label for="continent">Continent:</label>
                            <input type="text" id="continent" name="continent" placeholder="Entrez un continent">
                        </div>
                        <div class="input-group">
                            <label for="country">Pays:</label>
                            <input type="text" id="country" name="country" placeholder="Entrez un pays">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-group">
                            <label for="city">Ville:</label>
                            <input type="text" id="city" name="city" placeholder="Entrez une ville">
                        </div>
                        <div class="input-group">
                            <label for="site">Site:</label>
                            <input type="text" id="site" name="site" value="Cashbah" placeholder="Entrez un site">
                        </div>
                    </div>
                    <button type="submit" class="btn"><i class="fa fa-check"></i> Valider</button>
                </form>
            </section>

            <!-- Search Results Section -->
            <section class="results-section">
                <h2><em>Résultat de la recherche</em></h2>
                <ol class="city-list" id="results">
                    <!-- Results will be displayed here dynamically -->
                </ol>
            </section>

        </div>

    </div>

    <footer>
        <p>&copy; 2024 Travel Guide. Created by ghaith & hicham, M2-TI, UMBB.</p>
    </footer>

    <!-- JavaScript -->
    <script>
        document.getElementById('search-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Collect input values
            const continent = document.getElementById('continent').value;
            const country = document.getElementById('country').value;
            const city = document.getElementById('city').value;
            const site = document.getElementById('site').value;

            // Display results dynamically
            const results = document.getElementById('results');
            results.innerHTML = ''; // Clear previous results

            // Create a new list item with the search criteria
            const resultItem = document.createElement('li');
            resultItem.classList.add('city-item');
            resultItem.innerHTML = `
                <span><strong>Ville:</strong> ${city || 'N/A'} <strong>Pays:</strong> ${country || 'N/A'} <strong>Continent:</strong> ${continent || 'N/A'} <strong>Site:</strong> ${site || 'N/A'}</span>
                <div class="city-actions">
                    <a href="#" class="edit-btn"><i class="fa fa-edit"></i></a>
                    <a href="#" class="delete-btn"><i class="fa fa-trash"></i></a>
                </div>
            `;
            
            // Append the new result item to the list
            results.appendChild(resultItem);
        });
    </script>

</body>
</html>
