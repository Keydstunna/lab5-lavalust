<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Product Management</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: #1a1a2e;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .login-box {
    background: #16213e;
    padding: 40px 36px;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.4);
    width: 100%;
    max-width: 360px;
  }
  .login-box h1 {
    color: #fff;
    font-size: 1.4rem;
    margin-bottom: 24px;
    text-align: center;
  }
  .field { margin-bottom: 16px; }
  .field label {
    display: block;
    color: #ccc;
    font-size: 0.85rem;
    margin-bottom: 6px;
  }
  .field input {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #333;
    background: #0f172a;
    color: #fff;
    font-size: 0.95rem;
  }
  .field input:focus { outline: none; border-color: #e94560; }
  button {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    background: #e94560;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
  }
  button:hover { background: #d63852; }
  .error {
    background: #4a1f1f;
    color: #ff8080;
    padding: 10px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    margin-bottom: 16px;
  }
</style>
</head>
<body>
  <div class="login-box">
    <h1>Product Management Login</h1>
    <?php if (!empty($error)) : ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form action="<?= app_url('/login') ?>" method="POST">
      <div class="field">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>