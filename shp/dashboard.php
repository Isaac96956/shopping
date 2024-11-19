<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Carousel with Text and Image</title>
    <link rel="stylesheet" href="dash.css">

</head>
<style>
    .slide{
            background-color: aquamarine;
            padding: 10px;
            margin-top: 10px;
            margin: 20px;
        }
        .card{
            background-color: aquamarine;
            padding: 10px;
            margin-top: 10px;
            margin: 20px;
        }
</style>
<body>
    <!-- nav date and time -->
    <nav class="card navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Shopping List</a>
    <div class="d-flex ms-auto align-items-center">
      <span class="navbar-text text-white me-3">
        Welcome, User!
      </span>
      <span id="current-time" class="navbar-text text-white">
        <!-- Time and Date will be inserted here -->
      </span>
    </div>
  </div>
</nav>
<!-- script for date and time -->
<script>
  // Function to update the time and date
  function updateTime() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
    const timeString = now.toLocaleDateString('en-US', options);
    document.getElementById('current-time').textContent = timeString;
  }

  // Call the updateTime function every second
  setInterval(updateTime, 1000);

  // Initial call to display the time immediately
  updateTime();
</script>

    <!-- navbar card -->
    <nav class="card">
    <div class="carousel" style="margin-top:50px;">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-text">
                    <h2>Fresh Cabbage</h2>
                    <p>Enjoy the freshness of organic cabbage. Perfect for salads, soups, and healthy meals.</p>
                </div>
                <div class="carousel-image">
                    <img src="./image/cabbage1.jpeg" alt="Fresh Cabbage">
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-text">
                    <h2>Juicy Apples</h2>
                    <p>Sweet and crisp apples, perfect for snacking or baking your favorite desserts.</p>
                </div>
                <div class="carousel-image">
                    <img src="./image/apple1.png" alt="Juicy Apples">
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-text">
                    <h2>Luxury Bugatti</h2>
                    <p>Sweet and crisp capsicum, perfect for snacking or baking your favorite desserts.</p>
                </div>
                <div class="carousel-image">
                    <img src="./image/capsicum.png" alt="Capsicum">
                </div>
            </div>
        </div>
        <!-- Controls -->
        <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
    </div>
    </nav>
    <script>
        let currentSlide = 0;

        function moveSlide(direction) {
            const slides = document.querySelectorAll(".carousel-item");

            // Remove 'active' class from the current slide
            slides[currentSlide].classList.remove("active");

            // Update the slide index
            currentSlide = (currentSlide + direction + slides.length) % slides.length;

            // Add 'active' class to the new slide
            slides[currentSlide].classList.add("active");

            // Adjust the position of the carousel-inner to show the active slide
            const carouselInner = document.querySelector(".carousel-inner");
            carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    </script>
<nav class="card">
    <div class="card-container">
        <!-- Card 1 -->
        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card text-end" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <!-- card 4 -->
        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>
</nav>

<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
  <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
    
    <!-- About Section -->
    <div class="row mb-4">
      <div class="col-lg-12">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="index.php?page=home" aria-label="Shopping List">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2" viewBox="0 0 118 94" role="img">
            <title>Shopping List</title>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508z" fill="currentColor"/>
          </svg>
          <span class="fs-5">Shopping List</span>
        </a>
        <ul class="list-unstyled small">
          <li class="mb-2">Plan, organize, and optimize your shopping experience with our dashboard.</li>
          <li class="mb-2">Built with care and efficiency to make grocery shopping effortless.</li>
          <li class="mb-2">Stay productive and never miss an item!</li>
        </ul>
      </div>
    </div>

    <!-- Quick Links Section -->
    <div class="row mb-4">
      <div class="col-lg-12">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="index.php?page=dashboard">Dashboard</a></li>
          <li class="mb-2"><a href="index.php?page=shopping_list">Create List</a></li>
          <li class="mb-2"><a href="index.php?page=home">Saved Lists</a></li>
          <li class="mb-2"><a href="/analytics">Analytics</a></li>
          <li class="mb-2"><a href="/contact">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <!-- Resources Section -->
    <div class="row mb-4">
      <div class="col-lg-12">
        <h5>Resources</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/help">Help Center</a></li>
          <li class="mb-2"><a href="/faq">FAQs</a></li>
          <li class="mb-2"><a href="/tutorials">Tutorials</a></li>
          <li class="mb-2"><a href="/blog">Blog</a></li>
        </ul>
      </div>
    </div>

    <!-- Legal Section -->
    <div class="row mb-4">
      <div class="col-lg-12">
        <h5>Legal</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/terms">Terms of Service</a></li>
          <li class="mb-2"><a href="/privacy">Privacy Policy</a></li>
          <li class="mb-2"><a href="/cookies">Cookie Policy</a></li>
        </ul>
      </div>
    </div>

    <!-- Community Section -->
    <div class="row">
      <div class="col-lg-12">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/shoppinglist" target="_blank" rel="noopener">GitHub</a></li>
          <li class="mb-2"><a href="https://twitter.com/shoppinglist" target="_blank" rel="noopener">Twitter</a></li>
          <li class="mb-2"><a href="https://facebook.com/shoppinglist" target="_blank" rel="noopener">Facebook</a></li>
          <li class="mb-2"><a href="/forum">Community Forum</a></li>
        </ul>
      </div>
    </div>

  </div>
</footer>




</body>
</html>
