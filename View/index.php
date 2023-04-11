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
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <a href="<?php echo $this->baseurl.'create'?>" class="btn btn-primary">Add New</a>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        <?php
           foreach($data as $key){
            ?>
            <tr>
                <td><?php echo $key->name?></td>
                <td><?php echo $key->email?></td>
                <td><a href="<?php echo $this->baseurl;?>delete?id=<?php echo $key->userid?>" class="btn btn-danger">Delete</a></td>
                <td><a href="<?php echo $this->baseurl;?>edit?id=<?php echo $key->userid?>" 
                class="btn btn-success">Edit</a></td>
            </tr>

            <?php
           }
        
        ?>
    </tbody>
    
  </table>
</div>

</body>
</html>
