<?php
declare(strict_types=1);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Placeholder: sambungkan ke pengesahan sebenar (sesi, pangkalan data, dll.)
    $error = 'Fungsi log masuk belum disambungkan. Sila cuba lagi kemudian.';
}
?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0d6efd">
  <title>Log masuk — Cikgu Tarmizi</title>
  <meta name="description" content="Log masuk ke akaun portfolio Cikgu Tarmizi.">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    :root {
      --glass-bg: rgba(255, 255, 255, 0.12);
      --glass-border: rgba(255, 255, 255, 0.38);
      --glass-shadow: 0 1.25rem 3rem rgba(0, 0, 0, 0.22), inset 0 1px 0 rgba(255, 255, 255, 0.22);
      --text-on-glass: rgba(255, 255, 255, 0.92);
      --text-muted-glass: rgba(255, 255, 255, 0.72);
    }

    .login-shell {
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: clamp(1rem, 4vw, 2rem);
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #0d6efd 0%, #6610f2 48%, #6f42c1 100%);
    }

    .login-shell::before {
      content: "";
      position: absolute;
      inset: -40% -20%;
      background:
        radial-gradient(ellipse 60% 50% at 20% 30%, rgba(255, 255, 255, 0.18) 0%, transparent 55%),
        radial-gradient(ellipse 50% 45% at 85% 70%, rgba(13, 110, 253, 0.35) 0%, transparent 50%),
        radial-gradient(ellipse 40% 40% at 50% 100%, rgba(102, 16, 242, 0.25) 0%, transparent 45%);
      pointer-events: none;
    }

    @media (prefers-reduced-motion: no-preference) {
      .login-shell::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          125deg,
          transparent 0%,
          rgba(255, 255, 255, 0.04) 45%,
          transparent 70%
        );
        animation: sheen 14s ease-in-out infinite;
        pointer-events: none;
      }
      @keyframes sheen {
        0%, 100% { opacity: 0.35; transform: translateX(-5%) translateY(0); }
        50% { opacity: 0.65; transform: translateX(5%) translateY(-3%); }
      }
    }

    .glass-card {
      position: relative;
      z-index: 1;
      width: min(100%, 26rem);
      padding: clamp(1.75rem, 4vw, 2.25rem);
      border-radius: 1.35rem;
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      box-shadow: var(--glass-shadow);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }

    .glass-card .form-label {
      color: var(--text-on-glass);
      font-weight: 500;
    }

    .glass-input {
      background: rgba(255, 255, 255, 0.14) !important;
      border: 1px solid rgba(255, 255, 255, 0.35) !important;
      color: #fff !important;
      border-radius: 0.65rem;
      padding: 0.65rem 0.9rem;
    }

    .glass-input::placeholder {
      color: rgba(255, 255, 255, 0.55);
    }

    .glass-input:focus {
      background: rgba(255, 255, 255, 0.2) !important;
      border-color: rgba(255, 255, 255, 0.55) !important;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.15);
      color: #fff !important;
    }

    .glass-card .text-muted {
      color: var(--text-muted-glass) !important;
    }

    .glass-card h1 {
      color: var(--text-on-glass);
    }

    .btn-glass-primary {
      background: rgba(255, 255, 255, 0.95);
      color: #0d6efd;
      border: none;
      font-weight: 600;
      border-radius: 0.65rem;
      padding: 0.65rem 1.25rem;
    }

    .btn-glass-primary:hover {
      background: #fff;
      color: #0a58ca;
    }

    .btn-glass-primary:focus-visible {
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.45);
    }

    .link-glass {
      color: rgba(255, 255, 255, 0.95);
      text-decoration: underline;
      text-underline-offset: 0.15em;
    }

    .link-glass:hover {
      color: #fff;
    }

    .alert-glass {
      background: rgba(220, 53, 69, 0.25);
      border: 1px solid rgba(255, 200, 200, 0.45);
      color: #fff;
      border-radius: 0.65rem;
    }
  </style>
</head>
<body>
  <a class="visually-hidden-focusable position-absolute top-0 start-0 p-3 text-white z-3" href="#login-main">Langkau ke borang</a>

  <div class="login-shell">
    <div class="glass-card" id="login-main">
      <div class="text-center mb-4">
        <p class="small text-uppercase letter-spacing text-white-50 mb-2" style="letter-spacing: 0.12em;">Portfolio</p>
        <h1 class="h3 fw-bold mb-0">Log masuk</h1>
        <p class="small mt-2 mb-0 text-muted">Cikgu Tarmizi</p>
      </div>

      <?php if ($error !== ''): ?>
        <div class="alert alert-glass py-2 px-3 small mb-4" role="alert">
          <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
        </div>
      <?php endif; ?>

      <form method="post" action="" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">E-mel</label>
          <input
            type="email"
            class="form-control glass-input"
            id="email"
            name="email"
            autocomplete="email"
            required
            placeholder="nama@contoh.com"
            <?php echo $error !== '' ? 'aria-invalid="true"' : ''; ?>
          >
        </div>
        <div class="mb-2">
          <label for="password" class="form-label">Kata laluan</label>
          <input
            type="password"
            class="form-control glass-input"
            id="password"
            name="password"
            autocomplete="current-password"
            required
            placeholder="••••••••"
          >
        </div>
        <div class="d-flex justify-content-end mb-4">
          <a class="small link-glass" href="#">Lupa kata laluan?</a>
        </div>
        <button type="submit" class="btn btn-glass-primary w-100 py-2">Log masuk</button>
      </form>

      <p class="text-center small mt-4 mb-0 text-muted">
        Belum ada akaun? <a class="link-glass fw-medium" href="#">Daftar</a>
      </p>
      <p class="text-center small mt-3 mb-0">
        <a class="link-glass text-white-50" href="index.html">← Kembali ke laman utama</a>
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
