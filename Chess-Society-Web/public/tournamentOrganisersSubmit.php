<?php
include "officerHeader.php";
include "../private/initialise.php";


$tournamentId = $_GET['id'];

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
    $newOrganiserId = $_POST['newOrganiser'];

    if ($newOrganiserId != '') {
        //Insert Query of SQL

        $tournamentOrganisersAddQuery = mysqli_query($db, "insert into TournamentOrganisers(tournament_id, organiser) values ($newOrganiserId, $tournamentId)");

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
                <a href="<?php echo ('../public/tournamentEdit.php?id=' . $tournamentId); ?>" class="btn btn-primary" role="button">Go back</a>
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
                <a href="<?php echo ('../public/tournamentEdit.php?id=' . $tournamentId); ?>" class="btn btn-primary" role="button">Go back</a>
                <a href="tournamentsReview.php" class="btn btn-primary" role="button">Review tournaments</a>
            </div>
        </div>
<?php

    }
}
?>