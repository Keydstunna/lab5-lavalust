<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In — KWONN</title>
<link rel="stylesheet" href="<?= app_url('/assets/css/theme.css') ?>">
<style>
  /* Background image lives at public/assets/img/login-bg.jpg */
  .login-shell { --login-bg: url('<?= app_url('/assets/img/login-bg.jpg') ?>'); }
</style>
</head>
<body>
  <div class="bg-orbs"><span></span><span></span><span></span></div>

  <div class="login-shell">
    <div class="login-card glass">

      <div class="login-title">Welcome back</div>
      <div class="login-sub">Sign in to manage your inventory</div>

      <?php if (!empty($error)) : ?>
        <div class="error-banner"><?= $error ?></div>
      <?php endif; ?>

      <form action="<?= app_url('/login') ?>" method="POST">
        <div class="field">
          <label>Username</label>
          <div class="field-shell">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <input type="text" name="username" placeholder="Enter your username" required autofocus>
          </div>
        </div>
        <div class="field">
          <label>Password</label>
          <div class="field-shell">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" name="password" id="loginPassword" class="pass-field" placeholder="Enter your password" required>
            <button type="button" class="toggle-pass" data-target="loginPassword">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </form>
    </div>
  </div>

  <script src="<?= app_url('/assets/js/theme.js') ?>"></script>
</body>
</html>