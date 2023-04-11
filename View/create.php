<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>User form</h2>
  <form method="post">
  <div class="mb-3 mt-3">
   <label for="email">Name:</label>
   <input type="text" class="form-control" id="email" placeholder="Enter email" 
    name="name" value="<?php echo  $data[0]->name ?? '';?> ">
 </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo  $data[0]->email ?? '';?> ">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo  $data[0]->pass ?? '';?>" >
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
  </form>
</div>

</body>
</html>
