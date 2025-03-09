<?php

require_once("hum_conn_no_login.php");

$alumniName = htmlspecialchars(strip_tags($_GET["input_alumni_name"]));
$connection = hum_conn_no_login();

$alumniQuery = oci_parse($connection, "
	select FIRST_NAME, 
		LAST_NAME, 
		CITY,
		STATE_PROVINCE 
	from users
	where FIRST_NAME = :input_alumni_Name OR LAST_NAME  = :input_alumni_Name
	");

oci_bind_by_name($alumniQuery, ":input_alumni_Name", $alumniName);
oci_execute($alumniQuery, OCI_DEFAULT);

if (!oci_fetch($alumniQuery)) {
	die("invalid");
}

$fname = oci_result($alumniQuery, 'FIRST_NAME');
$lname = oci_result($alumniQuery, 'LAST_NAME');
$city = oci_result($alumniQuery, 'CITY');
$state = oci_result($alumniQuery, 'STATE_PROVINCE');
?> 

<html lang="en"> 
        <head>
            <!-- 
                LINK: https://nrs-projects.humboldt.edu/~ny39/DellArte/bryan/index.html
            -->
            <meta charset="UTF-8" />
            <title></title>
            <meta name="viewport" content="width=device-width,
            initial-scale=1.0" />
            <link href="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.css" rel="stylesheet">
            <script src="https://api.mapbox.com/mapbox-gl-js/v3.10.0/mapbox-gl.js"></script>
            <link rel="stylesheet" href="https://nrs-projects.humboldt.edu/~ny39/DellArte/bryan/main.css"/>
            <link rel="stylesheet" href="https://nrs-projects.humboldt.edu/~ny39/DellArte/bryan/search_name.css"/>
            <link rel="shortcut icon" href="assets/favicon.jpg" type="image/x-icon"/>
        </head>

        <body>
            <nav class="navbar">

                <div class="logo">
                    <a id="nav_logo" href="index.html">
                        <img src="assets/logo.jpg" alt="Home" height="85px"/>
                    </a>
                </div>

                <div class="main_menu">
                    <ul class="navbar_menu">
                        <li>
                            <a href="index.html"><p>Home</p></a>
                        </li>
                        <li>
                            <a href="https://dellarte.com/about-dellarte-international/"><p>About Us</p></a>
                        </li>
                        <li>
                            <a href="login.html"><p>Login</p></a>
                        </li>
                        <li>
                            <a href="sign_up.html"><p>Sign Up</p></a>
                        </li>
                    </ul>

                </div>
                
            </nav>
            
            <div id= "searched_names_box">
                <table id=searched_names>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                    <tr>
                        <td><?php echo($fname); ?></td>
                        <td><?php echo($lname); ?></td>
                        <td><?php echo($city); ?></td>
                        <td><?php echo($state); ?></td>
                    </tr>
                </table>
            </div>

            <footer class="footer">
                <hr />
                <div class="container">
                    <div class="footer-grid">

                        <div class="card">
                            <h4> Dell'Arte Theatre </h4>
                            <address>
                                PO Box 816,
                                <br>
                                Blue Lake, CA 95525
                                <br>
                                <a href="info@dellarte.com">info@dellarte.com</a>
                                <br>
                                707-668-5663
                            </address>
                        </div>

                        <div class="card" id="email_ref">
                            <h4> Refer a Peer: </h4>
                            <p> 
                                Encourage fellow alumni to join the network 
                            </p>
                            <form>
                                <input type="email" name="refer" id="refer" placeholde="peername@email.com"/>
                                <button type="submit" class="btn" id="foot_btn">Refer</button>
                            </form>
                        </div>

                        <div>
                            <h4></h4>
                        </div>

                    </div>
                </div>
            </footer>
        </body>
    </html>

