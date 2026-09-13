<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Management — KWONN</title>
<link rel="stylesheet" href="<?= app_url('/assets/css/theme.css') ?>">
<style>
  /* Cover photo lives at public/assets/img/cover-bg.jpg */
  .cover-banner { --cover-bg: url('<?= app_url('/assets/img/cover-bg.jpg') ?>'); }
</style>
</head>
<body>
  <div class="bg-orbs"><span></span><span></span><span></span></div>

  <div class="app-shell">

    <!-- Cover banner + avatar + name (all flex-aligned together) -->
    <div class="cover-banner">
      <div class="cover-identity">
        <div class="cover-avatar">
          <!-- Swap this SVG for <img src="..."> once you add your profile photo -->
          <img src="<?= app_url('/assets/img/profile.jpg') ?>">
        </div>
        <div class="cover-id">
          <div class="name">KIER LAWRENCE IGNACIO</div>
        </div>
      </div>
    </div>

    <div class="app-header glass">
      <div class="brand">
        <div class="brand-mark">K</div>
        <div>
          <div class="brand-name">KWONN</div>
          <div class="brand-sub">Product Management</div>
        </div>
      </div>
      <div class="header-actions">
        <div class="search-box">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" id="productSearch" placeholder="Search products…">
        </div>
        <a href="<?= app_url('/products/create') ?>" class="btn btn-primary">+ Add Product</a>
        <a href="<?= app_url('/logout') ?>" class="btn btn-ghost">Logout</a>
      </div>
    </div>

    <div class="stat-strip">
      <div class="stat-chip glass">
        <div class="num"><?= count($products) ?></div>
        <div class="label">Total Products</div>
      </div>
      <div class="stat-chip glass">
        <div class="num"><?= array_sum(array_column($products, 'quantity')) ?></div>
        <div class="label">Units in Stock</div>
      </div>
      <div class="stat-chip glass">
        <div class="num">₱<?= number_format(array_sum(array_map(fn($p) => $p['price'] * $p['quantity'], $products)), 0) ?></div>
        <div class="label">Combined Value</div>
      </div>
    </div>

    <div class="table-card glass">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Created</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
          <tr class="product-row" data-name="<?= htmlspecialchars($product['product_name']) ?>">
            <td data-label="ID">#<?= $product['id'] ?></td>
            <td data-label="Product" class="product-name"><?= $product['product_name'] ?></td>
            <td data-label="Description"><?= $product['description'] ?></td>
            <td data-label="Price"><span class="price-pill">₱<?= number_format($product['price'], 2) ?></span></td>
            <td data-label="Qty"><?= $product['quantity'] ?></td>
            <td data-label="Created"><?= $product['created_at'] ?></td>
            <td data-label="Actions">
              <div class="row-actions">
                <a href="<?= app_url('/products/edit/' . $product['id']) ?>" class="btn btn-ghost btn-pill">Edit</a>
                <a href="<?= app_url('/products/delete/' . $product['id']) ?>" class="btn btn-danger-ghost btn-pill" onclick="return confirm('Delete this product?')">Delete</a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="empty-state" id="emptyState" style="display:none;">No products match your search.</div>
    </div>

    <!-- Quote + social links footer -->
    <div class="dash-footer">
      <div class="quote-card glass">
        <div class="quote-text">"You can't win at everything, but you can smile."</div>
        <div class="quote-author">— Eraserheads</div>
        <div class="quote-desc">Some days the numbers add up, some days they don't — but there's always something small worth being glad about. Keep building anyway.</div>
      </div>
      <div class="social-links glass">
        <a href="https://github.com/Keydstunna" target="_blank" rel="noopener" class="social-btn" aria-label="GitHub">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.78-.25.78-.55 0-.27-.01-1.17-.02-2.12-3.2.7-3.88-1.36-3.88-1.36-.52-1.33-1.28-1.69-1.28-1.69-1.04-.71.08-.69.08-.69 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.69 0-1.26.45-2.29 1.19-3.09-.12-.29-.52-1.47.11-3.06 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.64 1.59.24 2.77.12 3.06.74.8 1.18 1.83 1.18 3.09 0 4.42-2.69 5.39-5.25 5.68.41.36.78 1.06.78 2.14 0 1.55-.01 2.79-.01 3.17 0 .3.2.66.79.55A10.51 10.51 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5Z"/></svg>
        </a>
        <a href="https://www.facebook.com/share/1DWP6rnxw7/" target="_blank" rel="noopener" class="social-btn" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94Z"/></svg>
        </a>
        <a href="https://www.instagram.com/kwonbluu?igsh=MXZ3dzRqYmRkc3hqbA==" target="_blank" rel="noopener" class="social-btn" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
        </a>
      </div>
    </div>

  </div>

  <script src="<?= app_url('/assets/js/theme.js') ?>"></script>
</body>
</html>