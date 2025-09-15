<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Showdata</title>
  
  <style>
    body {
      font-family: 'Segoe UI', Roboto, Arial, sans-serif;
      background: #0f1923; /* Valorant dark bg */
      color: #fff;
      margin: 0;
      padding: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 25px;
      color: #ff4655; /* Valorant red */
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    table {
      width: 90%;
      border-collapse: collapse;
      background: #1b2735;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.4);
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
    }

    th {
      background: #111820;
      color: #ff4655;
      font-size: 0.95rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    tr:nth-child(even) {
      background: #16212d;
    }

    tr:hover {
      background: rgba(255, 70, 85, 0.1);
    }

    td {
      font-size: 0.9rem;
      color: #e5e5e5;
    }

    a {
      display: inline-block;
      margin-right: 8px;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
    }

    a[href*="update"] {
      background: #3b82f6; /* Blue for Update */
      color: #fff;
    }

    a[href*="update"]:hover {
      background: #2563eb;
    }

    a[href*="soft-delete"] {
      background: #ff4655; /* Valorant red for Delete */
      color: #fff;
    }

    a[href*="soft-delete"]:hover {
      background: #e63946;
    }

    /* ✅ Styled Create Record button */
    .create-btn {
      margin-top: 25px;
      background: #ff4655;
      color: #0f1923;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 700;
      text-transform: uppercase;
      text-decoration: none;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      border: 2px solid #ff4655;
      box-shadow: 0 0 12px rgba(255, 70, 85, 0.6);
    }

    .create-btn:hover {
      background: #0f1923;
      color: #ff4655;
      box-shadow: 0 0 20px #ff4655, 0 0 40px #ff4655 inset;
      transform: scale(1.05);
    }

    /* ✅ Pagination */
    .pagination {
      margin: 20px 0;
      display: flex;
      justify-content: center;
      gap: 8px;
      list-style: none;
      padding: 0;
    }

    .pagination li {
      display: inline-block;
    }

    .pagination a, 
    .pagination strong {
      padding: 8px 14px;
      border: 2px solid #ff4655;
      background: #0f1923;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .pagination a:hover {
      background: #ff4655;
      color: #0f1923;
      box-shadow: 0 0 10px #ff4655;
    }

    .pagination strong {
      background: #ff4655;
      color: #0f1923;
      cursor: default;
    }

    /* ✅ Search bar styling */
    .search-box {
      margin-bottom: 15px;
      text-align: right;
      width: 90%;
    }

    .search-box input[type="text"] {
      padding: 6px 12px;
      border: 2px solid #ff4655;
      border-radius: 6px;
      background: #0f1923;
      color: #fff;
      outline: none;
    }

    .search-box button {
      padding: 6px 14px;
      margin-left: 5px;
      background: #ff4655;
      color: #0f1923;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-box button:hover {
      background: #fff;
      color: #ff4655;
      box-shadow: 0 0 10px #ff4655;
    }
  </style>
</head>
<body>
  <h1>Showdata</h1>

  <!-- ✅ Search form -->
  <div class="search-box">
      <form method="get" action="<?=site_url('user/show');?>">
          <input type="text" name="q" placeholder="Search..." value="<?=isset($_GET['q']) ? html_escape($_GET['q']) : '';?>">
          <button type="submit">Search</button>
      </form>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Lastname</th>
      <th>Firstname</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
    <?php if (!empty($students)): ?>
        <?php foreach(html_escape($students) as $student): ?>
        <tr>
          <td><?=$student['id'];?></td>
          <td><?=$student['last_name'];?></td>
          <td><?=$student['first_name'];?></td>
          <td><?=$student['email'];?></td>
          <td><?=$student['Role'];?></td>
          <td>
            <a href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
            <a href="<?=site_url('user/soft-delete/'.$student['id']);?>">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
          <td colspan="6">No records found.</td>
        </tr>
    <?php endif; ?>
  </table>

  <!-- ✅ Pagination Links -->
  <?php if (!empty($page)): ?>
    <ul class="pagination">
        <?= $page; ?>
    </ul>
  <?php endif; ?>

  <!-- ✅ Valorant-st
