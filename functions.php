<?php




// Displaying all the data from database
// Please do not modify
// Important
// promotions
$url          = "SELECT url FROM promotions";
$result_promo = mysqli_query($conn, $url);

if (mysqli_num_rows($result_promo) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result_promo)) {
        $promo_url = $row["url"];
        if($promo_url != ''){
        $empty_promo = FALSE;
        }
        else{
            $empty_promo = TRUE;
        }
    }
} else {
    $empty_promo = TRUE;
}


// portfolio selection
$portfolio = "SELECT e.title, e.category,e.description,e.album_cover, e.url FROM portfolio as e";

$result_port = mysqli_query($conn, $portfolio);
$portinfo    = array();
if (mysqli_num_rows($result_port) > 0) {
    while ($r1 = mysqli_fetch_assoc($result_port)) {
        $portinfo[] = $r1;
    }
} else {
    echo "<script> console.log(\"0 results\")</script>";
}

// photo gallery inside the portfolio
$gallery        = "SELECT u.url,u.photos,u.thumbs FROM portfolio AS e INNER JOIN gallery AS u ON e.url = u.url";
$result_gallery = mysqli_query($conn, $gallery);
$galleryinfo    = array();
if (mysqli_num_rows($result_gallery) > 0) {
    while ($r2 = mysqli_fetch_assoc($result_gallery)) {
        $galleryinfo[] = $r2;
        $empty_portfolio = FALSE;
    }
} else {
    $empty_portfolio = TRUE;
    echo "<script> console.log(\"0 results\")</script>";
}

// list the portfolio
function listPortfolio()
{
    global $empty_portfolio;
    global $portinfo;

    $i = 0;
    if ($empty_portfolio == FALSE){
        foreach ($portinfo as $r1) {
            echo "                     <div class=\"col-lg-12 top-buffer-20\">\n";
            echo "                        <div class=\"col-lg-4 text-justify\">\n";
            echo "                            <h4 class=\"section-subheading \">" . $r1['title'] . "</h4>\n";
            echo "                        </div>\n";
            echo "                        <div class=\"col-lg-2 text-center top-buffer\">\n";
            echo "                          <form method=\"POST\" name=\"edit_port\" action=\"admin.php\">\n";
            echo "                              <input type=\"hidden\" name=\"portfolio_edit_list\" value=\"" . $i .  "\">";
            echo "                              <input id=\"edit\" name=\"edit\" type=\"submit\" class=\"btn btn-xl\" value=\"Edit!\">\n";
            echo "                          </form>\n";
            echo "                        </div>\n";
            echo "                        <div class=\"col-lg-3 text-center top-buffer\">\n";
            echo "                          <form method=\"POST\" name=\"rem_port\" onsubmit=\"return confirmDelete()\" action=\"admin.php\">\n";
            echo "                              <input type=\"hidden\" name=\"portfolio_list\" value=\"" . $r1['url'] .  "\">";
            echo "                              <input id=\"remove\" name=\"remove_portfolio\" type=\"submit\" class=\"btn btn-xl\" value=\"Remove!\">\n";
            echo "                          </form>\n";
            echo "                        </div>\n";
            echo "                    </div>\n";
            $i++;
        }
    }
    else{
            echo "                     <div class=\"col-lg-12 wow fadeInUp\">\n";
            echo "                        <div class=\"col-lg-2 text-justify\">\n";
            echo "                            <h4 class=\"section-subheading \">No portfolio!</h4>\n";
            echo "                        </div>\n";
    }
}

function editPortfolio(){
   global $portinfo;
    if ($empty_portfolio == FALSE){
    }
}

// write pagination for index.php
function writePagination()
{
    global $portinfo;
    $pageno = ceil(count($portinfo) / 6);
    for ($x = 1; $x <= $pageno; $x++) {
        if ($x == 1) {
            echo " <li class=\"portfolio-gallery active\"><a class=\"page\" href=\"#grid" . $x . "\">" . $x . "</a></li>\n";
        }
        if ($x > 1) {
            echo " <li class=\"portfolio-gallery\"><a class=\"page\" href=\"#grid" . $x . "\">" . $x . "</a></li>\n";
        }
    }
    
}


// displaying the portfolio grid
function writeGrid()
{
    global $portinfo;
    $i      = 1;
    $pageno = 1;
    $flag   = FALSE;
    foreach ($portinfo as $r1) {
        // first item
        if ($i % 6 == 1 && $flag === FALSE) {
            echo "                  <div id=\"grid" . $pageno . "\" class=\"grid col-lg-8 col-lg-pull-4 wow fadeInUp text-center\">\n";
            $pageno++;
        }
        if ($i % 6 == 1 && $flag === TRUE) {
            echo "                  <div id=\"grid" . $pageno . "\" class=\"grid col-lg-8 col-lg-pull-4 text-center hide\">\n";
            $pageno++;
        }
        // second to fifth item
        if ($i % 6 >= 1 && $i % 6 <= 5) {
            
            echo "                        <div class=\"col-md-4 portfolio-item\">\n";
            echo "                            <a href=\"#portfolioModal" . $r1['url'] . "\" class=\"portfolio-link\" data-toggle=\"modal\">\n";
            echo "                                <div class=\"portfolio-hover\">\n";
            echo "                                    <div class=\"portfolio-hover-content\">\n";
            echo "                                        <h4>" . $r1['title'] . "</h4>\n";
            echo "                                        <p class=\"text-muted\">" . $r1['category'] . "</p>\n";
            echo "                                    </div>\n";
            echo "                                </div>\n";
            echo "                              <div class=\"center-cropped\" \n"; 
            echo "                                   style=\"background-image: url('" . $r1['album_cover'] . "');\">\n";
            echo "                              <img src=\"img/portfolio/blank.gif\" class=\"img-responsive opacity-0\" alt=\"" . $r1['title'] . "\">" ;
            echo "                              </div>\n";
            //echo "                                <img src=\"" . $r1['album_cover'] . "\" class=\"img-responsive\" alt=\"\">\n";
            echo "                            </a>\n";
            echo "                        </div>\n";
            
        }
        // last item
        if ($i % 6 == 0) {
            echo "                        <div class=\"col-md-4 portfolio-item\">\n";
            echo "                            <a href=\"#portfolioModal" . $r1['url'] . "\" class=\"portfolio-link\" data-toggle=\"modal\">\n";
            echo "                                <div class=\"portfolio-hover\">\n";
            echo "                                    <div class=\"portfolio-hover-content\">\n";
            echo "                                        <h4>" . $r1['title'] . "</h4>\n";
            echo "                                        <p class=\"text-muted\">" . $r1['category'] . "</p>\n";
            echo "                                    </div>\n";
            echo "                                </div>\n";
            echo "                              <div class=\"center-cropped\" \n"; 
            echo "                                   style=\"background-image: url('" . $r1['album_cover'] . "');\">\n"; 
            echo "                              <img src=\"img/portfolio/blank.gif\" class=\"img-responsive opacity-0\" alt=\"" . $r1['title'] . "\">" ;
            echo "                              </div>\n";
            echo "                            </a>\n";
            echo "                        </div>\n";
            echo "                        </div>\n";
            
        }
        // adding empty slots
        if ($i == count($portinfo)) {
            $pageno = ceil(count($portinfo) / 6);
            $slots  = (6 * $pageno) - count($portinfo);
            for ($x = 0; $x < $slots; $x++) {
                echo "                        <div class=\"col-md-4 portfolio-item\">\n";
                echo "                                <img src=\"img/portfolio/blank.gif\" class=\"img-responsive hide-if-mobile\" alt=\"\">\n";
                echo "                        </div>\n";
            }
            echo "                  </div>\n";
        }
        if ($i === 6) {
            $flag = TRUE;
        }
        $i++;
    }
}

function writeLightBox()
{
    global $portinfo;
    global $galleryinfo;
    foreach ($portinfo as $r1) {
        echo "        <div class=\"portfolio-modal modal fade clear-padding-left\" id=\"portfolioModal" . $r1['url'] . "\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">\n";
        echo "            <div class=\"modal-content\">\n";
        echo "                <div class=\"close-modal\" data-dismiss=\"modal\">\n";
        echo "                    <div class=\"lr\">\n";
        echo "                        <div class=\"rl\">\n";
        echo "                        </div>\n";
        echo "                    </div>\n";
        echo "                </div>\n";
        echo "                <div class=\"container\">\n";
        echo "                    <div class=\"row\">\n";
        echo "                        <div class=\"col-lg-8 col-lg-offset-2\">\n";
        echo "                            <div class=\"modal-body\">\n";
        echo "                                <!-- Project Details Go Here -->\n";
        echo "                                <h2>" . $r1['title'] . "</h2>\n";
        echo "                                <p class=\"item-intro text-muted\">" . $r1['category'] . "</p>\n";
        
        echo "                                <div class=\"row\"><div class=\"gallery\">\n";
        foreach ($galleryinfo as $r2) {
            if ($r1['url'] == $r2['url']) {
                echo "                             <div class=\"col-md-3 portfolio-item\">\n";
                echo "                                      <a href=\"" . $r2['photos'] . "\"><img class=\"img-responsive img-centered\" src=\"" . $r2['thumbs'] . "\"></a>\n";
                echo "                                  </div>\n";
                
            }
        }
        echo "                              </div></div>\n";
        echo "                                <p>" . $r1['description'] . "</p>\n";
        echo "                               \n";
        echo "                                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\"><i class=\"fa fa-times\"></i> Close Project</button>\n";
        echo "                            </div>\n";
        echo "                        </div>\n";
        echo "                    </div>\n";
        echo "                </div>\n";
        echo "            </div>\n";
        echo "        </div>\n";
        //echo $promo_url;
    }
}

// close the mysqli connection
//mysqli_close($conn);
?>
