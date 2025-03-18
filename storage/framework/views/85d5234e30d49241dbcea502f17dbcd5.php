<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: rgb(14, 4, 58);
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #FFFFFF;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #FFFFFF;
  color: black;
}

/* Style the content */
.content {
  background-color: #FFFFFF;
  padding: 10px;
  height: 650px; /* Should be removed. Only for demonstration */
}

/* Style the footer */
.footer {
  background-color: rgb(14, 4, 58);
  padding: 10px;
}
</style>
</head>
<body>
<form action="<?php echo e(route('fetch.tablets')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    
<div class="topnav">
  <a href="/fetch-data">Tablets</a>
</div>

<div class="content">
  <h2>CSS Template</h2>
  <p>A topnav, content and a footer.</p>
</div>
<button type="submit">Fetch Tablets</button>
<div class="footer">
  <p>Footer</p>
</div>
</form>
</body>
</html>




<?php /**PATH C:\xampp\htdocs\Project\dev_atlas_project\resources\views/new1.blade.php ENDPATH**/ ?>