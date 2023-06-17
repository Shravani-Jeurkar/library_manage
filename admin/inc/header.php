<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-1 shadow-sm sticky-top" id="nav-bar">
  <div class="container-fluid">
    <a class="navbar-brand me-5 ms-2" href="index.php">
      <img src="../img/logo/Library.svg" alt="" width="60" height="48" class="ms-5 d-block align-text-top">
      <span class="font1 fs-4">Library By Shra</span>
    </a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fs-5 ms-5" id="navbarSupportedContent">

    <?php
      if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)
      {
        echo<<<data
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="books.php">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="feedback.php">Feedback</a>
          </li>
        </ul>
data;
}?>

      <ul class="navbar-nav me-auto mb-lg-0 mt-lg-0 mt-3 text-center">
        <li class="nav-item">
          <h4 class="font1 text-light">Welcome to the Admin Side!</h4>
        </li>
      </ul>

      <div class="d-flex text-dark me-4">
        <?php
            if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)
            {
              echo<<<data
              <a type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" href="logout.php">
              Logout
              </a>
data;
            }
            
        ?>
      </div>
    </div>

      <!-- <div class="btn-group">
          <button type="button" class="btn btn-outline-light shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <img src="$path$_SESSION[sPic]" style="width : 25px; height : 25px;" class="me-1 text-dark bg-light"></img>
              $_SESSION[sName]
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
      </div> -->
</nav>