<section class="top-bar mt-3">
  <div class="container">
    <div class="top">
      <!-- Contact Info -->
      <div class="contact-info">
        <i class="fa fa-phone"></i><strong> +233 24 179 4214</strong>
        &nbsp;
        &nbsp;
        <i class="fa fa-envelope"></i><strong> example.info@gmail.com</strong>
      </div>

      <!-- Search Bar -->
      <div class="search-bar">
        <form class="form-row" action="search_result.php" method="GET" onsubmit="return validate();">
          <div class="col-auto">
            <input class="form-control mb-2" id="search" type="text" name="search"placeholder="Search by subject...">
          </div>
          <div class="col-auto form-group">
            <button style="background-color: #3f009b; color: #fff;" type="submit" class="btn mb-2" name="search-submit" value="submit">Search</button>
          </div>
        </form>
      </div>

      <div class="clr"></div>

    </div>
  </div>
</section>


<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Voice Out</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <!-- Home page -->
          <?php
            if ($page == "home") {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="make_complaint.php">Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>

          <!-- About page -->
          <?php
            if ($page == "about") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">About
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="make_complaint.php">Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>

          <!-- Complaint page -->
          <?php
            if ($page == "complaint") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="make_complaint.php">Complaint
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>

          <!-- FAQ page -->
          <?php
            if ($page == "faq") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="make_complaint.php">Complaint</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="faq.php">FAQ
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>

          <!-- Contact page -->
          <?php
            if ($page == "contact") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="make_complaint.php">Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="includes/raw_php/logout.php">Logout</a>
            </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>


<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>

<script type="text/javascript">
  function validate(){
    var search = document.getElementById("search").value;
    if (search.trim() == ""){
      alert("Search query cannot be empty!");
      return false;
    }
    return true;
  }
  
</script>