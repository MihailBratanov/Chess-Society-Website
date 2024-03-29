<?php
include "officerHeader.php";
include "../private/initialise.php";


error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


$query = "SELECT * FROM Tournaments";
$result_set = mysqli_query($db, $query);


?>

<div class="page-content" id="content">
    <header class="page-header header container-fluid">
        <div class="overlay"></div>
    </header>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Review tournaments here. Select tournament to view details. </h1>
            </div>
            <br>
            <div class=container>
                <div class="row-fluid">
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Main organiser</th>
                                <th>Location</th>
                                <th>Date</th>
                            </tr>

                            <?php


                            while ($tournament = mysqli_fetch_assoc($result_set)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $tournament['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $tournament['main_organiser_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $tournament['location']; ?>
                                    </td>
                                    <td>
                                        <?php echo $tournament['tournament_date']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo ('../public/tournamentEdit.php?id=' . $tournament['id']); ?>">View</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>