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
<title>Question Creation</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background: #F4F7F9; margin: 0; color: #17212B; }
  .content { padding: 40px 24px; max-width: 720px; margin: 0 auto; }
  .card { background: #fff; border: 1px solid #E3E8EC; border-radius: 12px; padding: 28px; }
  h2 { margin-top: 0; }
  .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 18px; }
  label { font-size: 13px; font-weight: 600; color: #6D7883; }
  textarea, input[type=text] {
    border: 1px solid #E3E8EC;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 15px;
    color: #17212B;
    outline: none;
    font-family: inherit;
  }
  textarea:focus, input[type=text]:focus { border-color: #2AABEE; }
  select {
    border: 1px solid #E3E8EC;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 15px;
    color: #17212B;
    outline: none;
    font-family: inherit;
    background: #fff;
  }
  select:focus { border-color: #2AABEE; }
  .options-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
  .option-row { display: flex; align-items: center; gap: 10px; border: 1px solid #E3E8EC; border-radius: 10px; padding: 10px 14px; }
  .option-row input[type=text] { border: none; flex: 1; padding: 0; }
  .option-row input[type=text]:focus { outline: none; }
  .btn {
    height: 46px;
    border: none;
    border-radius: 10px;
    background: #2AABEE;
    color: white;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    padding: 0 24px;
  }
  .btn:hover { background: #229ED9; }
  .success { background: #E6F7EC; color: #1E7E34; padding: 12px 16px; border-radius: 8px; margin-bottom: 18px; font-size: 14px; }
  .error { background: #FDEAEA; color: #E53E3E; padding: 12px 16px; border-radius: 8px; margin-bottom: 18px; font-size: 14px; }
  .hint { font-size: 12px; color: #A6B1BB; }
</style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="content">
  <div class="card">
    <h2>Create Question</h2>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
      <div class="success">Question added to the question bank successfully.</div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
      <div class="error">Something went wrong. Please fill all fields correctly.</div>
    <?php endif; ?>

    <form action="save-question.php" method="POST">

      <div class="field">
        <label for="question">Question (max 300 characters)</label>
        <textarea id="question" name="question" rows="3" maxlength="300" required></textarea>
        <span class="hint">Keep it under 300 characters.</span>
      </div>

      <div class="field">
        <label>Options (fill all 4)</label>
        <div class="options-grid">
          <input type="text" name="option1" placeholder="Option 1" maxlength="300" required>
          <input type="text" name="option2" placeholder="Option 2" maxlength="300" required>
          <input type="text" name="option3" placeholder="Option 3" maxlength="300" required>
          <input type="text" name="option4" placeholder="Option 4" maxlength="300" required>
        </div>
      </div>

      <div class="field">
        <label for="correct_option">Correct Answer</label>
        <select id="correct_option" name="correct_option" required>
          <option value="" disabled selected>Select the correct option</option>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
          <option value="4">Option 4</option>
        </select>
      </div>

      <div class="field">
        <label for="answer_description">Answer Description</label>
        <textarea id="answer_description" name="answer_description" rows="3" placeholder="Explain why this answer is correct" required></textarea>
      </div>

      <button type="submit" class="btn">Save Question</button>
    </form>
  </div>
</div>

</body>
</html>
