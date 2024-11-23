<?php
$movies = [];

// Check if the file exists
if (($file = fopen("reviews.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $movies[] = [
            'title' => $data[0],
            'year' => $data[1],
            'review' => $data[2],
            'rating' => $data[3]
        ];
    }
    fclose($file);
}

// Return the movies in JSON format
echo json_encode($movies);
?>
