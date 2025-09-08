<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="<?=base_url();?>public/css/style3.css">
</head>
<body>
  <div class="wrapper">
    <div class="form-container">
      <div class="logo">Create User</div>
      <form action="<?=site_url('user/create');?>" method="post">
        
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
        
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
        
        <input type="email" id="email" name="email" placeholder="Email" required>
        
        <input type="text" id="role" name="role" placeholder="Role" required>
        
        <input type="submit" value="Submit">
      </form>
      

    </div>
  </div>
</body>
</html>
