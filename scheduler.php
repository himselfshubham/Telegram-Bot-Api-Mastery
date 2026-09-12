<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Scheduler</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #F4F7F9; margin: 0; color: #17212B; }
  .content { padding: 40px 24px; max-width: 720px; margin: 0 auto; }
  .card { background: #fff; border: 1px solid #E3E8EC; border-radius: 12px; padding: 28px; }
</style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="content">
  <div class="card">
    <h2>Scheduler</h2>
    <p>Scheduler yahan add hoga — kis din/time quiz bhejna hai wo set karne ke liye. Bata do exact requirement (daily quiz time, specific question set, Telegram bot se link, etc.) toh isko fully build kar dete hain.</p>
  </div>
</div>

</body>
</html>
