<?php
$servername = "localhost";
$username   = "root";
$password   = "123";
$database   = "twist";
// Create connection
$conn       = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

$url          = "SELECT url FROM promotions";
$result_promo = mysqli_query($conn, $url);

if (mysqli_num_rows($result_promo) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result_promo)) {
        $promo_url = $row["url"];
        //echo $promo_url;
    }
} else {
    echo "0 results";
}



$portfolio   = "SELECT * FROM portfolio";
$result_port = mysqli_query($conn, $portfolio);
$portinfo    = array();
if (mysqli_num_rows($result_port) > 0) {
    while ($r1 = mysqli_fetch_assoc($result_port)) {
        $portinfo[] = $r1;
    }
} else {
    echo "0 results";
}

function writeGrid()
{
    global $portinfo;

    foreach ($portinfo as $r1) {
            echo "                        <div class=\"col-md-4 portfolio-item\">\n";
            echo "                            <a href=\"#portfolioModal" . $r1[url] . "\" class=\"portfolio-link\" data-toggle=\"modal\">\n";
            echo "                                <div class=\"portfolio-hover\">\n";
            echo "                                    <div class=\"portfolio-hover-content\">\n";
            echo "                                        <h4>" . $r1[title] . "</h4>\n";
            echo "                                        <p class=\"text-muted\">" . $r1[category] . "</p>\n";
            echo "                                    </div>\n";
            echo "                                </div>\n";
            echo "                                <img src=\"" . $r1[album_cover] . "\" class=\"img-responsive\" alt=\"\">\n";
            echo "                            </a>\n";
            echo "                        </div>\n";
    }
}

function writeLightBox()
{
    global $portinfo;

    foreach ($portinfo as $r1) {
            echo "        <div class=\"portfolio-modal modal fade\" id=\"portfolioModal" . $r1[url] . "\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">\n";
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
            echo "                                <h2>" . $r1[title] . "</h2>\n";
            echo "                                <p class=\"item-intro text-muted\">" . $r1[category] . "</p>\n";
            echo "                                <img class=\"img-responsive img-centered\" src=\"" . $r1[album_big] . "\" alt=\"\">\n";
            echo "                                <p>" . $r1[description] . "</p>\n";
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
mysqli_close($conn);
?>