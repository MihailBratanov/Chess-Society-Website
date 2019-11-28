<?php include "header.php" ?>
<?php require_once('../private/initialise.php')?>
<?php
    function u($string="") {
      return urlencode($string); 
    }
    
    function raw_u($string="") {
      return rawurlencode($string);
    }
    
    function h($string="") {
      return htmlspecialchars($string);
    }
    
   //THIS  
    // function db_connect() {
    // $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // return $connection;
    // }
    
    // function db_disconnect($connection) {
    //     if(isset($connection)) {
    //       mysqli_close($connection);
    //     }
    //  }
     //TO THIS SHOULD BE COMMENTED OUT WHEN TESTING WITH REAL DATABASE
     
    function find_article_by_id($id) {
        $db = db_connect();
    
        $sql = "SELECT * FROM News ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject; // returns an assoc. array
      }
    function find_all_subjects() {
        $db = db_connect();
        $sql = "SELECT * FROM News ";
        $sql .= "ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        return $result;
      }
      
      $page_set = find_all_subjects();
    ?>
      <h1 class="font-weight-light">King's college London official chess society website</h1>
      <p class="lead">News page</p>
      <div class= "q">
            <div class="news">
                <?php while($page = mysqli_fetch_assoc($page_set)){ if(date('Y-m-d') < date($page['end_date'])){ ?>
                    <h2><a href= "<?php echo 'read-news.php?newsid=' . $page['id']; ?>"><?php echo $page['heading'];?></a></h2>
                    <p> <?php 
                    $pos=strpos($page['article'], '.');
                    echo substr($page['article'], 0, $pos);
                    
                    ?></p>
                    <span>published on <?php echo date("d/m/Y", strtotime($page['start_date']));?> by zooboole</span>
                    </br></br>
                <?php }}?>
            </div>
      </div>
      <p class="lead">Scroll down...</p>
      <div style="height: 700px"></div>
      <p class="lead mb-0">You've reached the end!</p>

<?php include "footer.php" ?>