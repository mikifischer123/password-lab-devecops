<?php

declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Password Lab Form</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/clean-blog.min.css" rel="stylesheet">
</head>

<body style="background-image: url('img/background.jfif'); background-size: cover; min-height: 100vh">
  <main class="container py-5">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">
      <form class="p-4 shadow bg-light" method="post" action="pass_accept.php">
        <h1 class="h3 mb-4">Password Lab</h1>

        <div class="form-group">
          <label for="fName">First name</label>
          <input class="form-control" id="fName" name="fName" type="text" required>
        </div>

        <div class="form-group">
          <label for="pws">Password</label>
          <input class="form-control" id="pws" name="pws" type="password" required>
        </div>

        <div class="form-group">
          <label for="srt">Secret code</label>
          <input class="form-control" id="srt" name="srt" type="text" required>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>
  </main>
</body>

</html>
