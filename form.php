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
