<?php
if (isset($_POST['title']) && isset($_POST['year']) && isset($_POST['review']) && isset($_POST['rating'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    // Open the CSV file for appending
    $file = fopen("reviews.csv", "a");

    // Write the review to the file
    fputcsv($file, [$title, $year, $review, $rating]);

    // Close the file
    fclose($file);

    echo "Review added successfully!";
} else {
    echo "Error: Missing fields!";
}
?>
