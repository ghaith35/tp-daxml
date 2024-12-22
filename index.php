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
            <div class="student-info">
                <h2>Etudiant</h2>
                <p><strong>Nom:</strong> Toto</p>
                <p><strong>Prénom:</strong> Tutu</p>
                <p><strong>Spécialité:</strong> TI</p>
                <p><strong>Section:</strong> 1</p>
                <p><strong>Groupe:</strong> 2</p>
                <p><strong>Email:</strong> <a href="mailto:t.toto@mail.dz">t.toto@mail.dz</a></p>
                <hr>
                <p>   
                </p>
            </div>
            <div class="student-info">
                <h2>Etudiant</h2>
                <p><strong>Nom:</strong> Toto</p>
                <p><strong>Prénom:</strong> Tutu</p>
                <p><strong>Spécialité:</strong> TI</p>
                <p><strong>Section:</strong> 1</p>
                <p><strong>Groupe:</strong> 2</p>
                <p><strong>Email:</strong> <a href="mailto:t.toto@mail.dz">t.toto@mail.dz</a></p>
                <hr>
                <p>   
                </p>
            </div>
            <button class="btn add-city-btn">
                        <i class="fa fa-plus-circle"></i> Ajouter Ville
                    </button>
        </nav>

        <!-- Main Content -->
        <div class="main-content">

            <!-- Header Section -->
            <header class="header">
                <img src="images/banner.jpg" alt="Travel Site Banner" class="banner-image">
                <h1 class="site-title">Le titre de votre site de voyage</h1>
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
        <p>&copy; 2024 Travel Guide. Created by Toto Tutu, M2-TI, UMBB.</p>
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
