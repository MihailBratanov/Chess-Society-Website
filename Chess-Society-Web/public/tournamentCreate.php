<?php
include "officerHeader.php";

include "../private/initialise.php";


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
                <h1 class="font-weight-light">Create a new tournament below.</h1>
            </div>
            <br>

        </div>
        <div class="form-row">
            <div class="card border-0 shadow my-5">
                <div class="card-body p-5">


                    <form action="submitTournament.php" method="post">
                        <div class="form-row ">
                            <label for="mainOrganiser">Main organiser:</label>
                            <select id="mainOrganiser" name="mainOrganiser"  class="form-control">
                                <option id="mainOrganiser" name="mainOrganiser" selected>Please select...</option>
                                <?php foreach ($officers as $officer) { ?>
                                    <option><?php echo $officer; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLocation">Location</label>
                                <input type="text" class="form-control" name="inputLocation">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="inputDate">Date</label>
                                <input type="text" class="form-control" name="inputDate" placeholder="YYYY-MM-DD 00:00:00">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            </body>

            </html>
           