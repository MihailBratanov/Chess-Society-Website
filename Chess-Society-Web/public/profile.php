<?php
session_start();
if (isset($_SESSION['user-id'])) {
  // get user data from database
} else {
  // redirect to the home page if user wasn't logged in
  /* header("Location: index.php"); */
  /* die(); */ }
?>
<html>

<head>
  <title>Profile</title>
  <?php include("header.php") ?>
</head>

<body>
  <?php include("navbar.php") ?>
  <?php
  $testData = ['name' => 'Amir', 'last' => 'Rad', 'email' => 'amir@test.amail', 'user' => 'username']
  ?>
  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <div class="row m-y-2">
          <!-- edit form column -->
          <div class="col-lg-4 text-lg-center">
            <h2>Edit Profile</h2>
          </div>
          <div class="col-lg-8">
            <?php
            /* if (!($data)) { */
            /* echo */
            /*   '<div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> */
            /*   This is an <strong>.alert</strong>. Use this to show important messages to the user. */
            /* </div>'; */
            /* } */
            ?>
          </div>
          <div class="col-lg-8 push-lg-4 personal-info">
            <form role="form">
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">First name</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" value="<?php echo $testData["name"] ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" value="<?php echo $testData["last"] ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                <div class="col-lg-9">
                  <input class="form-control" type="email" value="<?php echo $testData["email"] ?>" />
                </div>
              </div>
              <div class="form-group row">
                <!-- Date input -->
                <label class="col-lg-3 col-form-label form-control-label" for="date">Date of Birth</label>
                <div class="col-lg-9">
                  <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Membership Type</label>
                <div class="col-lg-9">
                  <select id="user_time_zone" class="form-control p-3" size="0">
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                <div class="col-lg-9">
                  <input class="form-control" type="text" value="<?php echo $testData['user'] ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                <div class="col-lg-9">
                  <input class="form-control" type="password" value="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                <div class="col-lg-9">
                  <input class="form-control" type="password" value="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label"></label>
                <div class="col-lg-9">
                  <input type="reset" class="btn btn-secondary" value="Cancel" />
                  <input type="button" class="btn btn-primary" value="Save Changes" />
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 pull-lg-8 text-xs-center">
            <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar" />
            <h6 class="m-t-2">Upload a different photo</h6>
            <label class="custom-file">
              <input type="file" id="file" class="custom-file-input">
              <span class="custom-file-control">Choose file</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <hr />

  <?php include("footer.php") ?>

  <body>

</html>
