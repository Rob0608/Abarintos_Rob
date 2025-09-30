<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valorant Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Rajdhani', sans-serif;
    }
  </style>
</head>
<body class="bg-[#0f1923] flex items-center justify-center min-h-screen">

  <div class="bg-[#1c252f] p-8 rounded-2xl shadow-2xl w-full max-w-sm border border-[#ff4655]">
    <h1 class="text-3xl font-bold text-center text-[#ff4655] mb-6 tracking-widest">CREATE ACCOUNT</h1>
    
    <form method="post" class="space-y-4">
      <!-- Username -->
      <input type="text" name="username" placeholder="Username" required
        class="w-full px-4 py-3 bg-[#0f1923] text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff4655] placeholder-gray-400">

      <!-- Password -->
      <div class="relative">
        <input type="password" id="register-password" name="password" placeholder="Password" required
          class="w-full px-4 py-3 bg-[#0f1923] text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff4655] placeholder-gray-400 pr-16">
        <button type="button" onclick="togglePassword('register-password', this)"
          class="absolute inset-y-0 right-2 px-2 text-sm text-[#ff4655] font-bold">Show</button>
      </div>

      <!-- Role -->
      <select name="role"
        class="w-full px-4 py-3 bg-[#0f1923] text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff4655]">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <!-- Register button -->
      <button type="submit"
        class="w-full py-3 bg-[#ff4655] text-white font-bold rounded-lg hover:bg-[#e03444] transition duration-300 tracking-wide">
        REGISTER
      </button>
    </form>

    <p class="text-center text-gray-400 mt-4">
      Already have an account? 
      <a href="<?= site_url('auth/login') ?>" class="text-[#ff4655] font-semibold hover:underline">Login</a>
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
