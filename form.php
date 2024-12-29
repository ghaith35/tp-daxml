<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ville</title>
    <link rel="stylesheet" href="css/styles.css?v=1">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>Ajouter Ville</h1>
    </header>

    <main>
    <form action="submit_form.php" method="POST" class="add-city-form">
        <label for="city_name">City Name:</label>
        <input type="text" id="city_name" name="city_name" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>

        <label for="continent">Continent:</label>
        <input type="text" id="continent" name="continent" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit" class="btn">Submit</button>
    </form>
</main>

</body>
</html>