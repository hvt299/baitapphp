<?php
require_once('database.php');

// Get IDs
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the category from the database
if ($category_id != false || $category_id != null) {
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Category List page
include('category_list.php');