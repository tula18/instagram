<?php 
session_start();
$connect = mysqli_connect("127.0.0.1", "root", "Starkova24", "inst"); 

 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Instagram</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


      <link rel="stylesheet" href="css/style.css">
<style type="text/css">

.add1 {
  background-position:-75px -224px;
  background-size: 282px 273px;
  width: 24px;
  height: 24px;

}
</style>
  
</head>

<body>

  <div class="navbar__buttons" style="position: fixed; height: 40px; padding-left: 20px; background-color: white; top:620px; left:37.5%; width: 280px;z-index: 1001; border-radius: 50px;">
              <div class="navbar__button feed"></div>
              <div class="navbar__button explore"></div>
              
              <a href="add.php" ><div class="navbar__button add1"></div></a>

        <div class="navbar__button likes"></div>
        <a href="../profile/me.php"><div class="navbar__button home"></div></a>
              </div>
<div class="phone">

  <div class="phone__background" style="z-index: 2000"></div>

  <nav class="navbar">

    <div class="navbar__logos">
      <div class="navbar__logoImage"></div>
      <!-- <div class="navbar__divider"></div> -->
      <div class="navbar__logoContainer">
        <div class="navbar__logoText"></div>
      </div>
      <div class="navbar__buttons">
        <div class="dm"></div>
      </div>
    </div>

  
  </nav>

  <div class="wiseHider"></div>
  <div id="app">

    <div class="container" id="scroll">
      <div class="stories">
        <div class="stories__container">
          <button class="stories__story">
            <div class="stories__image"><img src="https://instagram.fhel2-1.fna.fbcdn.net/vp/b5e491df28adb85a6a8a4ad39be4a977/5CFA7E47/t51.12442-15/e35/c11.180.636.636a/s150x150/35616805_1658710040894365_9113899973384077312_n.jpg?_nc_ht=instagram.fhel2-1.fna.fbcdn.net"/>
              <div class="stories__plus"></div>
            </div>
            <p>Your story</p>
          </button>
          <button class="stories__story" v-for="contact in contacts" :aria-label="&quot;Click to see&quot; + contact.name + &quot;'s story&quot;">
            <div class="stories__image"><img :src="contact.photo"/></div>
            <div class="stories__unread" v-if="contact.hasUnreadStory"></div>
            <p>{{shortenName(contact.name)}}</p>
          </button>
        </div>
      </div>
      <!-- <section class="disclaimer"><i>Disclaimer: This shamefully rude copy of Instagram was made for fun only. All photos and images belong to their respective owners.</i></section> -->
      <article class="post" v-for="post in feed">
        <form method="post" action="../profile/index.php">
          <input style="display: none" type="text" name="id" :value="post.author.id">
          <button style="background-color: transparent; border:none">
        <header><img class="post__authorPhoto" :src="post.author.photo"/>
          <div class="post__authorInfo"><b>{{post.author.name}}</b>
            <p>{{post.author.location}}</p>
          </div>
          <button class="post__options" aria-label="More options"></button>
        </header>
        </button>
        </form>
        <div class="post__photo">
          <div class="post__hearthAnimation" v-if="post.likedByYou"></div><img v-if="post.type === &quot;photo&quot;" v-on:dblclick="likePost(post)" :srcset="post.photos[0]" :alt="post.photoDescription"/>
        </div>
        <div class="post__description">
          <section class="post__buttons">
            <button aria-label="I like it!" @click="likePost(post)" :active="post.likedByYou"></button>
            <button aria-label="Comment"></button>
            <button aria-label="Share"></button>
            <button aria-label="Save" @click="post.saved = !post.saved" :active="post.saved"></button>
          </section>
          <section><b>Likes: {{post.likes}}</b></section>
          <section><span><b> {{post.author.name}} </b> {{post.description}}</span></section>
          <section class="post__tags"><span v-for="tag in post.tags">{{'#' + tag}}</span></section>
          <section class="post__comments"><span v-for="comment in post.comments"><b> {{comment.author}} </b> {{comment.content}}</span></section>
          <section class="post__time">{{post.time}}</section>
        </div>
      </article>
    </div>
  </div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js'></script>



<script type="text/javascript">
  
var app = new Vue({
  el: '#app',
  methods: {
    shortenName (name) {
      return name.length > 9 ? `${name.slice(0, 8)}...` : name
    },
    likePost (post) {
      if (post.likedByYou) {
        post.likes--;
      } else {
        post.likes++
      }
      post.likedByYou = !post.likedByYou
    }
  },
  data: {
    contacts: [
    <?php $query = mysqli_query($connect, "
 SELECT * from users where id!=3
  ")or die(mysqli_error($connect));

while ($row = $query->fetch_assoc()) {
 ?>
      {
        name: <?php echo "'".$row['username']."'" ?>,
        photo: <?php echo "'".$row['profpic']."'" ?>,
        hasUnreadStory: <?php echo $row['story'] ?>
      },
    <?php } ?>
    ],
    feed: [
    <?php $query = mysqli_query($connect, "SELECT * FROM posts 
      INNER JOIN users ON posts.users_id = users.id 
      ORDER BY posts.id DESC")
    or die(mysqli_error($connect));

while ($row = $query->fetch_assoc()) {
 ?>
      {
        author: {
          name: <?php echo "'".$row['username']."'" ?>,
          photo: <?php echo "'".$row['profpic']."'" ?>,
          location: <?php echo "'".$row['location']."'" ?>,
          id: <?php echo "'".$row['users_id']."'" ?>
        },
        type: 'photo',
        photos: [<?php echo "'".$row['image']."'"?>],
        likes: <?php echo $row['likes']?>,
        likedByYou: <?php echo $row['liked_by_me']?>,
        saved: <?php echo $row['saved_by_me']?>,
        description: <?php echo "'".$row['text']."'" ?>,
        tags: ['f4f', 'follow4follow', 'idk', 'whatever'],
        comments: [
          {
            author: 'admin',
            content: 'comment function is yet to be implemented hehe. btw great photo!'
          }
        ],
        time: '<?php echo rand(1, 5) ?> hours ago'
      },
    <?php } ?>
    ]
  }
})

document.getElementById('app').addEventListener('scroll', function (e) {
  var scroll = document.getElementById('app').scrollTop
  if (scroll > 16) {
    document.getElementsByClassName('navbar')[0].classList.add('navbar--scrolled')
  } else {
    document.getElementsByClassName('navbar')[0].classList.remove('navbar--scrolled')
  }
})
</script>


</body>

</html>
