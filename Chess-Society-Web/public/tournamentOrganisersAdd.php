<?php
include "officerHeader.php";

include "../private/initialise.php";
$tournamentId = $_GET['id'];

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


$query = "SELECT id FROM Members WHERE membership='officer'";
$result_set = mysqli_query($db, $query);
$officers = mysqli_fetch_assoc($result_set);


?>
<div class="page-content" id="content">
    <header class="page-header header container-fluid">
        <div class="overlay"></div>
    </header>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Add an organiser to the tournament below.</h1>
            </div>
            <br>

        </div>
        <div class="form-row">
            <div class="card border-0 shadow my-5">
                <div class="card-body p-5">

                    
                    <form action="<?php echo ('tournamentOrganisersSubmit.php?id=' . $tournamentId); ?>" method="post">
                        <div class="form-row ">
                            <label for="newOrganiser">New organiser:</label>
                            <select id="newOrganiser" name="newOrganiser"  class="form-control">
                                <option id="newOrganiser" name="newOrganiser" selected>Please select...</option>
                                <?php foreach ($officers as $officer) { ?>
                                    <option><?php echo $officer; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            </body>

            </html>
           