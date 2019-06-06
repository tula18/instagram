<?php 
$connect = mysqli_connect("127.0.0.1", "root", "Starkova24", "inst"); 
$query = mysqli_query($connect, "SELECT * FROM posts 
      INNER JOIN users ON posts.users_id = users.id 
      where posts.users_id = 3
      ")
    or die(mysqli_error($connect));
$rows = mysqli_num_rows($query);
$row=$query->fetch_assoc(); ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Instagram</title>
  
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sanitize.css/2.0.0/sanitize.min.css'>

      <link rel="stylesheet" href="css/style.css">
<style type="text/css">
  
  .phone {
  position: relative;
  width: 700px;
  height: 700px;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  margin: 0 auto;
  padding: 22px 5px;
}
.phone__background {
  position: absolute;
  left: -15px;
  top: 0;
  z-index: 1001;
  width: 750px;
  height: 700px;
  background-size: cover;
  background-position: center;
  pointer-events: none;
}
</style>
  
</head>

<body>
<div class="phone">
  <div class="phone__background"><img src="https://www.searchpng.com/wp-content/uploads/2019/03/iPhone-Xs-Silver-PNG-1024x1024.png"></div>
  
<div class="app-window" data-js-target-app="data-js-target-app">
  <div class="menu">
    <div class="menu-row"><a class="user" target="_blank"><?php echo $row['username'] ?></a>
      <div class="icon">
      </div>
    </div>
  </div>

  <div class="scroll">

    <div class="main-content">
      <div class="header-row">
        <div class="avatar">
            <div class="avatar-icon"><img class="icon" src=<?php echo '"'.$row['profpic'].'"'?>/></div></div>
        <div class="stats">
          <div class="stats-row">
            <div class="stats">
              <div class="stats-cell">
                <div class="data"><?php echo $rows ?></div>
                <div class="label">Posts</div>
              </div>
              <div class="stats-cell">
                <div class="data">415</div>
                <div class="label">Followers</div>
              </div>
              <div class="stats-cell">
                <div class="data">926 </div>
                <div class="label">Following</div>
              </div>
            </div>
            <div class="action"><a class="btn" target="_blank">Edit Profile</a></div>
          </div>
        </div>
      </div>
      <div class="description-row">
        <div class="headline"><?php echo $row['name'] ?></div>
        <div class="decription"><?php echo $row['about'] ?> </div><a class="link" target="_blank"><?php echo $row['website'] ?></a>
      </div>
      <div class="story-highlights">
        <div class="label">Story Highlights</div>
      </div>
      <div class="tabs-row">
        <div class="tab">
          <label class="icon-grid" data-js-icon-grid="data-js-icon-grid">
            <input class="control" type="checkbox" checked="checked"/>
            <div class="icon"></div>
          </label>
        </div>
        <div class="tab">
          <label class="icon-row" data-js-icon-row="data-js-icon-row">
            <input class="control" type="checkbox"/>
            <div class="icon"></div>
          </label>
        </div>
        <div class="tab">
          <div class="icon-tagged">
            <div class="avatar"></div>
          </div>
        </div>
      </div>
      <div class="display-tab" data-js-display-tab="data-js-display-tab">

        <?php $query = mysqli_query($connect, "
 SELECT * FROM posts 
      INNER JOIN users ON posts.users_id = users.id 
      where posts.users_id = 3
  ")or die(mysqli_error($connect));

while ($row = $query->fetch_assoc()) {
  ?>
        <div class="post -multiple" 
        style="background-image:url(../feed/<?php echo $row['image']?>);"></div>

<?php } ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>

</html>
