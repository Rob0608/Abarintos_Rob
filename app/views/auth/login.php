<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valorant Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Rajdhani', sans-serif;
      background: #0f1923;
      color: #ece8e1;
    }
    .valorant-input {
      background: #1c252f;
      border: 1px solid #2f3b45;
      color: #ece8e1;
      padding: 12px;
      border-radius: 0.5rem;
      width: 100%;
      outline: none;
      transition: 0.3s;
    }
    .valorant-input:focus {
      border-color: #ff4655;
      box-shadow: 0 0 8px #ff4655;
    }
    .valorant-btn {
      background: #ff4655;
      color: #ece8e1;
      font-weight: bold;
      letter-spacing: 1px;
      padding: 12px;
      border-radius: 0.5rem;
      width: 100%;
      transition: all 0.3s;
    }
    .valorant-btn:hover {
      background: #e03444;
      box-shadow: 0 0 10px #ff4655;
      transform: scale(1.05);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <div class="bg-[#131a22] p-8 rounded-xl shadow-lg w-full max-w-sm">
    <h1 class="text-3xl font-bold text-center text-[#ff4655] mb-6 tracking-widest">
      LOGIN
    </h1>
    <form method="post" class="space-y-4">
      <input type="text" name="username" placeholder="Username" required class="valorant-input">

      <div class="relative">
        <input type="password" id="login-password" name="password" placeholder="Password" required class="valorant-input pr-16">
        <button type="button" onclick="togglePassword('login-password', this)" 
          class="absolute inset-y-0 right-2 px-2 text-sm text-[#ff4655] font-bold">Show</button>
      </div>

      <button type="submit" class="valorant-btn">Login</button>
    </form>
    <p class="text-center text-gray-400 mt-4">
      Don't have an account?  
      <a href="<?= site_url('/') ?>" class="text-[#ff4655] font-semibold hover:underline">Register</a>
    </p>
  </div>

<script>
function togglePassword(id, btn) {
  const input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
    btn.textContent = "Hide";
  } else {
    input.type = "password";
    btn.textContent = "Show";
  }
}
</script>

</body>
</html>
