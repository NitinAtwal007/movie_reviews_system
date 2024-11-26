<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Review System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.carousel-item img{
      width:400px;
      height: 400px;}
</style>

</head>
<body style="background: linear-gradient(to left, rgb(150, 113, 113),rgb(34, 124, 124));">


<?php
    include "navbar.php"
?>


<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
          src="image1.jpg"
          width="200px" class="d-block w-100"
           height="900"
          />
        </div>
        <div class="carousel-item">
          <img src="image4.jpg" width="200px"
          class="d-block w-100"
          height="900 "
            
          />
        </div>
        <div class="carousel-item">
          <img src="image3.jfif  " width="200px"
          class="d-block w-100"
          height="900 "
            
          /></div>
        
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div></div>
    <br />

<hr style="border: 1px solid #000; width: 100%; margin: 20px 0;"><hr style="border: 1px solid #000; width: 100%; margin: 20px 0;">
<marquee behavior="alternate" direction="right" >
<h2><b>ADD REVIEW, SEE REVIEW AND MORE .</b> </h2></marquee>  

<div class="container mt-5" id="moviesSection">
    <h2>All Movies</h2>
    <div id="movies" class="row gy-3"></div>
</div>


<hr style="border: 1px solid #000; width: 100%; margin: 20px 0;">
<hr style="border: 1px solid #000; width: 100%; margin: 20px 0;">
<center>
<div class="container mt-5" id="addReviewSection" >
    <h2>Add a Review</h2>
    <div class="mb-3">
        <input type="text" style="width: 600px;" id="title" class="form-control" placeholder="Movie Title" required>
    </div>
    <div class="mb-3">
        <input type="number" style="width: 600px;"  id="year" class="form-control" placeholder="Release Year" required>
    </div>
    <div class="mb-3">
        <textarea id="review" style="width: 600px;"  class="form-control" placeholder="Your Review" required></textarea>
    </div>
    <div class="mb-3">
        <input type="number" style="width: 600px;" id="rating" class="form-control" placeholder="Rating (1-10)" required>
    </div>
    <button class="btn btn-primary" onclick="addReview()">Submit Review</button>
</div></center>
<hr style="border: 1px solid #000; width: 100%; margin: 20px 0;">
<hr style="border: 1px solid #000; width: 100%; margin: 20px 0;">


<center>
<div class="container mt-5">
    <h2>Search for a Movie</h2>
    <div class="mb-3">
        <input type="text"  style="width: 800px;" id="searchTitle" class="form-control" placeholder="Enter movie title" required>
    </div>
    <button class="btn btn-info" onclick="searchMovie()" >Search</button>
    <div id="searchResult" class="mt-3" style="width: 500px;"></div>
</div></center>


<footer class="bg-dark text-white mt-5 p-4 text-center">
    <p>&copy; 2024 Atwal CORP. All rights reserved.</p>
</footer>

<script>
function addReview() {
    const title = document.getElementById('title').value;
    const year = document.getElementById('year').value;
    const review = document.getElementById('review').value;
    const rating = document.getElementById('rating').value;

    // Validate input fields
    if (!title || !year || !review || !rating) {
        alert("Please fill in all fields.");
        return; // Don't proceed if any field is empty
    }

    fetch('add_review.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `title=${title}&year=${year}&review=${review}&rating=${rating}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        displayMovies();  // Refresh movies after adding a new review

        // Clear input fields
        document.getElementById('title').value = '';
        document.getElementById('year').value = '';
        document.getElementById('review').value = '';
        document.getElementById('rating').value = '';
    })
    .catch(error => console.error('Error:', error));
}



function displayMovies() {
    fetch('fetch_reviews.php')
        .then(response => response.json())
        .then(movies => {
            const movieContainer = document.getElementById('movies');
            movieContainer.innerHTML = '';
            movies.forEach(movie => {
                const movieCard = `
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${movie.title}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${movie.year}</h6>
                                <p class="card-text">${movie.review}</p>
                                <p class="card-text"><strong>Rating: ${movie.rating}/10</strong></p>
                            </div>
                        </div>
                    </div>
                `;
                movieContainer.innerHTML += movieCard;
            });
        })
        .catch(error => console.error('Error:', error));
}
function searchMovie() {
    const searchTitle = document.getElementById('searchTitle').value.trim(); // Trim to avoid leading/trailing spaces
    const resultContainer = document.getElementById('searchResult');

    if (searchTitle === "") {
        resultContainer.innerHTML = '<p class="text-warning">Please enter a movie title to search.</p>';
        return; // Don't proceed if the search input is empty
    }

    fetch('fetch_reviews.php')
        .then(response => response.json())
        .then(movies => {
            resultContainer.innerHTML = '';
            const foundMovies = movies.filter(movie => movie.title.toLowerCase().includes(searchTitle.toLowerCase()));

            if (foundMovies.length > 0) {
                foundMovies.forEach(movie => {
                    const movieCard = `
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">${movie.title}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${movie.year}</h6>
                                <p class="card-text">${movie.review}</p>
                                <p class="card-text"><strong>Rating: ${movie.rating}/10</strong></p>
                            </div>
                        </div>
                    `;
                    resultContainer.innerHTML += movieCard;
                });
            } else {
                resultContainer.innerHTML = '<p class="text-danger">No movies found.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
}



</script>
<script>
    document.addEventListener('DOMContentLoaded', displayMovies);
</script>

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
