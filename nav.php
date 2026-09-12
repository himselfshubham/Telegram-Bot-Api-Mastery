<?php if (!isset($_SESSION)) { session_start(); } ?>
<style>
  .navbar {
    background: #17212B;
    padding: 0 24px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .navbar .brand {
    color: #fff;
    font-weight: 600;
    font-size: 16px;
  }
  .navbar .links {
    display: flex;
    gap: 8px;
  }
  .navbar .links a {
    color: #C6D0DA;
    text-decoration: none;
    font-size: 14px;
    padding: 8px 14px;
    border-radius: 8px;
  }
  .navbar .links a:hover {
    background: #29343F;
    color: #fff;
  }
  .navbar .links a.active {
    background: #2AABEE;
    color: #fff;
  }
  .navbar .logout a {
    color: #E53E3E;
  }
</style>
<div class="navbar">
  <div class="brand">Telegram Quiz Admin</div>
  <div class="links">
    <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : ''; ?>">Dashboard</a>
    <a href="question-creation.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'question-creation.php' ? 'active' : ''; ?>">Question Creation</a>
    <a href="scheduler.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'scheduler.php' ? 'active' : ''; ?>">Scheduler</a>
  </div>
  <div class="logout"><a href="logout.php">Log out</a></div>
</div>
