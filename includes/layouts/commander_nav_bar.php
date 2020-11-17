<section class="top-bar">
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
      <div class="search-bar" style="display: flex;">
        <form class="form-row" action="commander_search_result.php" method="GET" onsubmit="return validate();">
          <div class="col-auto">
            <input class="form-control mb-2" id="search" type="text" name="search"placeholder="Search by subject...">
          </div>
          <div class="col-auto">
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
      <a class="navbar-brand" href="command.php">Voice Out</a>
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
              <a class="nav-link" href="command.php">Complaints
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admins.php">Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="../includes/raw_php/command_logout.php">Logout</a>
            </li>
          <?php
            }
          ?>

          <!-- admins page -->
          <?php
            if ($page == "admins") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="command.php">Complaints</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="admins.php">Admins
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Are you sure you want to leave?')" href="../includes/raw_php/command_logout.php">Logout</a>
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