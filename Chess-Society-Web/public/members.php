<!DOCTYPE html>
<html lang="en">

<head>
  <title>Testing page</title>
  <?php require_once("header.php") ?>
</head>


<body>
  <?php require_once("navbar.php") ?>
  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">

        <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand">Members</a>
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="dropdown show">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Admin</a>
              <a class="dropdown-item" href="#">Member</a>
              <a class="dropdown-item" href="#"></a>
            </div>
          </div>
        </nav>

        <div class="mt-2">
          <ul class="list-group list-unstyled">
            <?php
            class Member
            {
              public function __construct($name, $id, $type)
              {
                $this->name = $name;
                $this->id = $id;
                $this->type = $type;
              }
            }
            $names = [new Member("Mike", "1", "Admin"), new Member("Hruthik", "2", "Admin"), new Member("Ivan", "3", "Admin"), new Member("Jian", "4", "Member"), new Member("Amir", "5", "Member")];
            foreach ($names as $name) {
              echo '<li class="mb-2">
          <a href="profile.php?id=' . $name->id . '"" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex  justify-content-between">
              <h5 class="mb-1">' . $name->name . '</h5>
              <small>' . $name->type . '</small>
            </div>
          </a>
        </li>';
            }
            ?>
          </ul>
          <div>
          </div>
        </div>
      </div>

      <?php
      include("footer.php");
      ?>
</body>

</html>

