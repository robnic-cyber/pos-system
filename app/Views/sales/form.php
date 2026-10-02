<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Record Sale</h1>

<form method="post" action="<?= site_url('sales/create') ?>">

    <label>Product</label>
    <select name="product_id" required>
        <option value="">Choose product</option>

        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>">
                <?= esc($product['name']) ?> —
                <?= number_format($product['price'], 2) ?>
                (<?= $product['stock_quantity'] ?> in stock)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Customer (optional)</label>
    <select name="customer_id">
        <option value="">Walk-in customer</option>

        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id'] ?>">
                <?= esc($customer['full_name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Quantity</label>
    <input type="number" name="quantity" min="1" required>

    <button type="submit">Record Sale</button>
</form>

<?= $this->endSection() ?>