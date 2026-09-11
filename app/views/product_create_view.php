<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: #f4f5f7;
    color: #1a1a2e;
    padding: 30px;
    display: flex;
    justify-content: center;
  }
  .form-box {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    width: 100%;
    max-width: 480px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }
  h1 { font-size: 1.3rem; margin-bottom: 20px; }
  .field { margin-bottom: 16px; }
  .field label {
    display: block;
    font-size: 0.85rem;
    margin-bottom: 6px;
    color: #444;
  }
  .field input, .field textarea {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 0.95rem;
  }
  .field textarea { resize: vertical; min-height: 70px; }
  .btn-row { display: flex; gap: 10px; margin-top: 8px; }
  button, .btn-cancel {
    padding: 10px 18px;
    border-radius: 6px;
    font-size: 0.9rem;
    border: none;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
  }
  button { background: #16213e; color: #fff; flex: 1; }
  .btn-cancel { background: #eee; color: #333; flex: 1; }
</style>
</head>
<body>
  <div class="form-box">
    <h1>Add New Product</h1>
    <form action="<?= app_url('/products/store') ?>" method="POST">
      <div class="field">
        <label>Product Name</label>
        <input type="text" name="product_name" required>
      </div>
      <div class="field">
        <label>Description</label>
        <textarea name="description"></textarea>
      </div>
      <div class="field">
        <label>Price</label>
        <input type="number" step="0.01" name="price" required>
      </div>
      <div class="field">
        <label>Quantity</label>
        <input type="number" name="quantity" required>
      </div>
      <div class="btn-row">
        <button type="submit">Save Product</button>
        <a href="<?= app_url('/products') ?>" class="btn-cancel">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>