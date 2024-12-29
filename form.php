<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ville</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>Ajouter Ville</h1>
    </header>

    <main>
        <form action="submit_form.php" method="POST">
            <label for="city_name">City Name:</label>
            <input type="text" id="city_name" name="city_name" required>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>

            <label for="continent">Continent:</label>
            <input type="text" id="continent" name="continent" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <!-- Add other fields for sites, hotels, etc. -->

            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>