<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product — KWONN</title>
<link rel="stylesheet" href="<?= app_url('/assets/css/theme.css') ?>">
</head>
<body>
  <div class="bg-orbs"><span></span><span></span><span></span></div>

  <div class="form-shell">
    <div class="form-card glass">
      <div class="brand" style="margin-bottom:22px;">
        <div class="brand-mark">K</div>
        <div>
          <div class="brand-name">KWONN</div>
          <div class="brand-sub">Edit Product</div>
        </div>
      </div>

      <form action="<?= app_url('/products/update/' . $product['id']) ?>" method="POST">
        <div class="field no-icon">
          <label>Product Name</label>
          <input type="text" name="product_name" value="<?= $product['product_name'] ?>" required>
        </div>
        <div class="field no-icon">
          <label>Description</label>
          <textarea name="description"><?= $product['description'] ?></textarea>
        </div>
        <div class="field no-icon">
          <label>Price</label>
          <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
        </div>
        <div class="field no-icon">
          <label>Quantity</label>
          <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
        </div>
        <div class="btn-row">
          <button type="submit" class="btn btn-primary">Update Product</button>
          <a href="<?= app_url('/products') ?>" class="btn btn-ghost">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <script src="<?= app_url('/assets/js/theme.js') ?>"></script>
</body>
</html>