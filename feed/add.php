<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<style type="text/css">
.phone {
  position: relative;
  width: 700px;
  height: 700px;
  z-index: 1000;
  margin: 0 auto;
  padding: 22px 5px;
  overflow: hidden;
  
}
.phone__background {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1001;
  width: 100%;
  height: 100%;
  background-image: url("https://www.searchpng.com/wp-content/uploads/2019/03/iPhone-Xs-Silver-PNG-1024x1024.png");
  background-size: cover;
  background-position: center;
  pointer-events: none;
}

.box{
	background-color: rgba(0,0,0,0.1);
	margin-left: -20px;
	margin-top: -200px;
	height: 300px;
	width: 300px;
}

.caption-container {
  position: absolute;
  width: 250px;
  left:215px;
  top:425px;
  height: 150px;
  z-index: 9999999;
}
.caption-container textarea {
  font-size: 1.0rem;
  width: 100%;
  height: 100%;
  padding: 10px;
  border: 1px solid #eeeeee;
}
.caption-container input {
	border:none;
  font-size: 1.0rem;
  width: 100%;
  padding: 10px;
  border-bottom: 1px solid #eeeeee;
}
.no-image{
	position: relative; 
	width: 300px; height: 300px; 
	font-size: 100px;
	margin-left: 100px;
	margin-top: 60px;
	color: rgba(0,0,0,0.4);

}
.no-image p{
	font-size: 16px;
	margin-left:-16px;
}
.input{
	opacity: 0.0; 
	position: absolute; 
	top:0; left: 0; bottom: 0; right:0; 
	width: 100%; height:100%;
}

</style>

<body>



	<div class="phone">
  <div class="phone__background"></div>
 
  <nav class="navbar">
    <div class="navbar__logos">
      <div class="ml-2 mt-2">
        <a href="index.php"><h4 class="font-weight-bold text-primary ">Cancel</h4></a>
      </div>
      <!-- <div class="navbar__divider"></div> -->
      <div class="navbar__logoContainer">
        <div class="navbar__logoText"></div>
      </div>
      <div class="ml-5 mt-2">
       <button form="post" style="background: transparent; border:none"><h4 class="font-weight-bold text-primary ml-2">Post</h4></button>
      </div>
    </div>
  </nav>

  <div class="box">
    <div class="preview"></div>
  	<div class="no-image">
  		<i class="far fa-images"></i>
  	<p>Click to add image</p>
<form method="post" action="insert.php" id="post" enctype="multipart/form-data">

    <input class="input" type="file" name="image" />
  	</div>
  	

</div>

  <div class="caption-container">
        <textarea name="text" class="caption-input" placeholder="Write a caption..."></textarea>
        <input class="caption-input" placeholder="Location" name="location"/>
        </form>
    </div>
</div>


<script type="text/javascript">

	$(".input").change(function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = $('<img>').attr('src', e.target.result);
            $('.preview').html(img);
        };

        reader.readAsDataURL(this.files[0]);
    }
});
</script>
	


</body>
</html>