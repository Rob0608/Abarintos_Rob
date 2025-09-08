<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
     <link rel="stylesheet" href="<?=base_url();?>public/css/style2.css">
     <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #0f172a; /* dark background */
      font-family: Arial, sans-serif;
      color: #fff;
    }

    h1 {
      color: #f43f5e; /* red-pink */
      margin-bottom: 20px;
    }

    .form-container {
      background: #1e293b;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.5);
      width: 350px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 12px;
      text-transform: uppercase;
      color: #94a3b8;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: none;
      background: #0f172a;
      color: white;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #f43f5e;
      border: none;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #e11d48;
    }
  </style>
</head>
<body>
    <h1>Welcome to Update View</h1>
    <form action="<?=site_url('user/update/'.$student['id']);?>" method="post">
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($student['last_name']);?>"><br>
        
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($student['first_name']);?>"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?=html_escape($student['email']);?>"><br>
        
        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" value="<?=html_escape($student['Role']);?>"><br>
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>