<!DOCTYPE html>
<html lang="en">
<head>
  <title>Work application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <center>
  	<h1>Work application</h1>
    <p>Add work</p>
  </center>
  <hr>
  <div class='row'>
  	<div class="col-md-4">
  	   <ul class="list-group">
		  <li class="list-group-item active">FUNCTION</li>
		  <li class="list-group-item"><a href="/DoCaoTu_MVC_TEST" title="">Finished requirement</a></li>
		  <li class="list-group-item"><a href="?page=Work&action=add" title="">Add</a></li>
		  <li class="list-group-item"><a href="?page=Work&action=show" title="">List work</a></li>
		</ul>
    </div>
  <div class="col-md-8">
  	<?php
        include './Core/request.php';
        $content = new Request();
        $content->setPageContent();
    ?>
  </div>
  </div>
</div>

</body>
</html>