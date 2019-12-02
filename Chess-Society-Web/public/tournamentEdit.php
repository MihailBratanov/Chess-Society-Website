<?php
include "officerHeader.php";
include "../private/initialise.php";

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$tournamentId = $_GET['id'];

//Get details from Tournmanents for current table
$queryForTournamnents = "SELECT * FROM Tournaments WHERE id=$tournamentId";
$result_set = mysqli_query($db, $queryForTournamnents);
$tournamentDetails = mysqli_fetch_assoc($result_set);

//Get details from TournamentOrganisers

$queryForTournamnentOrganisers = "SELECT * FROM TournamentOrganisers WHERE tournament_id=$tournamentId";
$organisers_set = mysqli_query($db, $queryForTournamnentOrganisers);


//Get details from TournamentParticipants

$queryForTournamnentParticipants = "SELECT * FROM TournamentParticipants WHERE tournament_id=$tournamentId";
$participants_set = mysqli_query($db, $queryForTournamnentParticipants);

?>
<div class="page-content" id="content">
    <header class="page-header header container-fluid">
        <div class="overlay"></div>
    </header>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Tournament details panel</h1>
            </div>
            <br>
            <dl class="row">
                <dt class="col-sm-3">Tournament id</dt>
                <dd class="col-sm-9"><?php echo $tournamentDetails['id']; ?></dd>
                <dt class="col-sm-3">Tournament main organiser</dt>
                <dd class="col-sm-9"><?php echo $tournamentDetails['main_organiser_id']; ?></dd>
                <dt class="col-sm-3">Tournament location</dt>
                <dd class="col-sm-9"><?php echo $tournamentDetails['location']; ?></dd>
                <dt class="col-sm-3">Date and time of tournament</dt>
                <dd class="col-sm-9"><?php echo $tournamentDetails['tournament_date']; ?></dd>
            </dl>
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
    <div class=container>
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <div class="row-fluid">
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <h1 class="font-weight-light">Tournament organisers</h1>
                            <tr>
                                <th>Organiser ID</th>
                            </tr>
                            <?php
                            while ($tournamentOrganiserDetails = mysqli_fetch_assoc($organisers_set)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $tournamentOrganiserDetails['organiser']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <a href="<?php echo ('tournamentOrganisersAdd.php?id=' . $tournamentDetails['id']); ?>" class="btn btn-primary" role="button">Edit</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class=container>
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <div class="row-fluid">
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <h1 class="font-weight-light">Tournament participants</h1>
                            <tr>

                                <th>Participant ID</th>
                            </tr>
                            <?php
                            while ($tournamentOrganiserDetails = mysqli_fetch_assoc($organisers_set)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $tournamentParticipantsDetails['participant']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <a href="<?php echo ('tournamentParticipantsAdd.php?id=' . $tournamentDetails['id']); ?>" class="btn btn-primary" role="button">Add participant</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>