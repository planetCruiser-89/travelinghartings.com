<?php
    include 'database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="X-UA-compatible" content="ie=edge" />
    <title>The Traveling Hartings</title>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <div class="header-container">
      <header>
        <button class="hamburger hamburger--squeeze" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <a class="logo-container" href="index.php">
          <img class="header-logo" src="svg/logo.svg" alt="" />
        </a>
        <nav>
          <ul class="nav-links">
            <li><a href="index.php">home</a></li>
            <li><a href="travel.php">travel</a></li>
            <li><a href="photos.php">photos</a></li>
            <li><a href="wildflowers.php">wildflowers</a></li>
          </ul>
        </nav>
        <img class="searcher-icon" src="svg/search_icon.svg" />
        <div class="searchbar-wrapper">
          <div class="search-input-form">
            <form action="search.php" method="POST">
              <div class="input-holder">
              <input
                type="text"
                list="searchResults"
                autocomplete="off"
                name="search"
                placeholder="Search..."
                class="mySearch"
                id="searchbox"
              />
              <button class="hidden-button" type="submit" name="submit-search"></button>
              </div>
            </form>
          </div>
        </div>
      </header>
    </div>

    <div class="banner-img">
    <img
        class="polaroid-collection-banner"
        sizes="(max-width: 2800px) 100vw, 2800px"
        srcset="
          index_banner/polaroid_master_opczuy_c_scale,w_200.jpg   200w,
          index_banner/polaroid_master_opczuy_c_scale,w_1220.jpg 1220w,
          index_banner/polaroid_master_opczuy_c_scale,w_1833.jpg 1833w,
          index_banner/polaroid_master_opczuy_c_scale,w_2431.jpg 2431w,
          index_banner/polaroid_master_opczuy_c_scale,w_2800.jpg 2800w
        "
        src="index_banner/polaroid_master_opczuy_c_scale,w_2800.jpg"
        alt="Collection of polaroid images scattered, 'The Traveling Hartings' is written on three seperate polaroids creating a title"
      />
    </div>

    <!-- <div class="article-title-container polaroid-collection-banner-margin">
            <h1 class="place-open">Search Results</h1>
          </div> -->
    <div class="flex-wrapper search-page">
      <div class="centerizer">
      <h1 class="place-open search-page">Search<br> Results</h1>
        <article>
            <?php
              if (isset($_POST['submit-search'])) {         
              $search = $_POST["search"];         
              $stmt = $mysqli->prepare('SELECT * FROM article WHERE art_country LIKE ? OR art_city LIKE ?');          
              $search = '%'.$search.'%';          
              $stmt->bind_param('ss', $search, $search);
              if ($stmt->execute()) {
                $result = $stmt->get_result();{ 
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                      echo "
                      <div class='search-result-card'>
                        <div class='center-result-card'>
                          <a class ='search-link' href='".$row['art_URL']."'>
                          <img class='search-image' src=".$row['art_imageURL'].">
                          </a>
                          <a class ='search-link' href='".$row['art_URL']."'>
                          <h4 class='search-title'>".$row['art_title']."</h4>
                          </a>
                          <a class ='search-link' href='".$row['art_URL']."'>
                          <p class='search-description'>".$row['art_description']."</p>
                          </a>
                          <div class='description-container'>
                          <span><h3 class='index-page'>".$row['art_city']." | ".$row['art_country']." | ".$row['art_date']."</h3></span>
                          </div>
                          <div class='divider'></div>
                        </div>
                      </div>";
                    }
                    $result->free();
                    } else {
                    echo "No results, search again.";
                    }
                  } 
                }
              }
            ?>
        </article>
      </div>
    </div>
    <div class="footer-wrapper">
      <footer>
        <div class="icon-list">
          <ul class="icon">
            <li class="icon-logos">
              <a href="home.php"
                ><img class="iconic" src="svg/home.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="mailto:thetravelinghartings@gmail.com"
                ><img class="iconic" src="svg/mail.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="https://www.facebook.com/matthew.harting.1"
                ><img class="iconic" src="svg/facebook.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="https://www.instagram.com/matthew_harting/"
                ><img class="iconic" src="svg/instagram.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="https://www.amazon.com"
                ><img class="iconic" src="svg/amazon.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="https://www.airbnb.com"
                ><img class="iconic" src="svg/airbnb.svg" alt=""
              /></a>
            </li>
            <li class="icon-logos">
              <a href="https://www.twitter.com"
                ><img class="iconic" src="svg/twitter.svg" alt=""
              /></a>
            </li>
          </ul>
        </div>
        <div class="footer-text-container">
          <p class="footer-text">
            The Hartings would like to thank you for visiting our page.<br> This webpage was made entirely by Matthew Harting <br> © 2021 Planet Cruiser Media
          </p>
        </div>
      </footer>
    </div>
    <script src="apps/hamburger.js"></script>
  </body>
</html>
