<?php
include "officerHeader.php";
include "../private/initialise.php";

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
    $mainOrganiserId = $_POST['mainOrganiser'];

    $location = $_POST['inputLocation'];
    $tournamentDate = $_POST['inputDate'];
    if ($location != '' || $tournamentDate != '') {
        //Insert Query of SQL

        $tournamentCreateQuery = mysqli_query($db, "insert into Tournaments(main_organiser_id, location, tournament_date) values ($mainOrganiserId, '$location', '$tournamentDate')");

        //Insert Query to update TournamentOragnisers

        $tournamentIdQuery = "SELECT id FROM Tournaments ORDER BY id DESC LIMIT 1";
        $newResult_set = mysqli_query($db, $tournamentIdQuery);
        $ids = mysqli_fetch_assoc($newResult_set);
        $realId = intval($ids['id']);


        $tournamentOragnisersCreateQuery = mysqli_query($db, "insert into TournamentOrganisers(tournament_id, organiser) values ($realId, $mainOrganiserId)");
        ?>
        <div class="page-content" id="content">
            <header class="page-header header container-fluid">
                <div class="overlay"></div>
            </header>
            <div class="container">
                <div class="card border-0 shadow my-5">
                    <div class="card-body p-5">
                        <h1 class="font-weight-light">Data inserted successfully!</h1>
                    </div>
                    <br>

                </div>
                <a href="tournamentCreate.php" class="btn btn-primary" role="button">Go back</a>
                <a href="tournamentsReview.php" class="btn btn-primary" role="button">Review tournaments</a>
            </div>
        </div>

    <?php echo "<span>Data Inserted successfully...!!</span>";
        } else { ?>
        <div class="page-content" id="content">
            <header class="page-header header container-fluid">
                <div class="overlay"></div>
            </header>
            <div class="container">
                <div class="card border-0 shadow my-5">
                    <div class="card-body p-2">
                        <h1 class="font-weight-light">Some fields are blank...!</h1>
                    </div>

                </div>
                <a href="tournamentCreate.php" class="btn btn-primary" role="button">Go back</a>
                <a href="tournamentsReview.php" class="btn btn-primary" role="button">Review tournaments</a>
            </div>
        </div>
<?php

    }
}
?>