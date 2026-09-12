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
<title>Dashboard</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #F4F7F9; margin: 0; color: #17212B; }
  .content { padding: 40px 24px; max-width: 900px; margin: 0 auto; }
  .card { background: #fff; border: 1px solid #E3E8EC; border-radius: 12px; padding: 28px; }
</style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="content">
  <div class="card">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?> 👋</h2>
    <p>Use the navigation bar above to create questions for the question bank or manage the scheduler.</p>
  </div>
</div>

</body>
</html>
