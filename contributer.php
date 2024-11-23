<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contributors Page</title>
    <link rel="stylesheet" href="contri.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
    include "navbar.php"
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Movie Review System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html#moviesSection">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html#addReviewSection">Add Review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactus.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <header>
        <h1>Our Contributors</h1>
        <p>Our aim is to fasten  collaboration and innovation through shared knowledge.</p>
    </header>
    
    <main>
        <section class="aim">
          <marquee width="80%" direction="right" height="100px">
               <h5>Our aim is to bring together diverse talents and perspectives to create impactful projects that benefit the community. We believe in the power of collaboration and shared knowledge.
               </h5>   </marquee>
        </section>
        
        <section class="contributors">
            <div class="contributor">
                <img src="login.jpg" alt="Contributor 1">
                <h2>Vikas Thakur</h2>
                <p>student of hptu worked for both frontend and backend and a ML and data science enthusiast. Currently learning Deep Learning. </p>
            </div>
            <div class="contributor">
                <img src="bg.jpg" alt="Contributor 2">
                <h2>Nitn Atwal</h2>
                <p>He has GodLike capabilities to deal with the problems related to web.</p>
            </div>
            <div class="contributor">
                <img src="mmm.png" alt="Contributor 3">
                <h2>Mukul Rana</h2>
                <p>A muscular man from Jhaniara with high skills in web activities as well as driving.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Atwal CORP. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>