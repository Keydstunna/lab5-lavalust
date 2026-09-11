<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Management</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: #f4f5f7;
    color: #1a1a2e;
    padding: 30px;
  }
  .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 10px;
  }
  h1 { font-size: 1.5rem; }
  .actions a {
    text-decoration: none;
    padding: 10px 16px;
    border-radius: 6px;
    font-size: 0.9rem;
    margin-left: 8px;
  }
  .btn-add { background: #16213e; color: #fff; }
  .btn-logout { background: #e94560; color: #fff; }
  table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }
  th, td {
    padding: 12px 14px;
    text-align: left;
    border-bottom: 1px solid #eee;
    font-size: 0.9rem;
  }
  th { background: #16213e; color: #fff; }
  .row-actions a {
    margin-right: 10px;
    text-decoration: none;
    font-size: 0.85rem;
  }
  .edit-link { color: #2563eb; }
  .delete-link { color: #dc2626; }
</style>
</head>
<body>
  <div class="topbar">
    <h1>Product Management</h1>
    <div class="actions">
      <a href="<?= app_url('/products/create') ?>" class="btn-add">+ Add Product</a>
    <a href="<?= app_url('/logout') ?>" class="btn-logout">Logout</a>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product) : ?>
      <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['product_name'] ?></td>
        <td><?= $product['description'] ?></td>
        <td>₱<?= number_format($product['price'], 2) ?></td>
        <td><?= $product['quantity'] ?></td>
        <td><?= $product['created_at'] ?></td>
        <td class="row-actions">
          <a href="<?= app_url('/products/edit/' . $product['id']) ?>" class="edit-link">Edit</a>
        <a href="<?= app_url('/products/delete/' . $product['id']) ?>" class="delete-link" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>