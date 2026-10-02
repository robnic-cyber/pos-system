<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class Sales extends BaseController
{
    public function index()
    {
        $saleModel = new SaleModel();

        return view('sales/index', [
            'title' => 'Sales History',
            'rows' => $saleModel->history()->findAll()
        ]);
    }

    public function create()
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();

        if ($this->request->getMethod() === 'POST') {
            $productId = (int) $this->request->getPost('product_id');
            $customerId = $this->request->getPost('customer_id') ?: null;
            $quantity = (int) $this->request->getPost('quantity');

            $product = $productModel->find($productId);

            if (!$product || $quantity < 1) {
                return redirect()
                    ->back()
                    ->with('error', 'Choose a valid product and quantity.');
            }

            if ($quantity > $product['stock_quantity']) {
                return redirect()
                    ->back()
                    ->with('error', 'Sale rejected: requested quantity exceeds available stock.');
            }

            $saleModel = new SaleModel();

            $saleModel->insert([
                'product_id' => $productId,
                'customer_id' => $customerId,
                'sold_by' => session()->get('user_id'),
                'quantity' => $quantity,
                'total_price' => $quantity * $product['price'],
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $productModel->update($productId, [
                'stock_quantity' => $product['stock_quantity'] - $quantity
            ]);

            return redirect()
                ->to('/sales')
                ->with('success', 'Sale recorded successfully.');
        }

        return view('sales/form', [
            'title' => 'Record Sale',
            'products' => $productModel
                ->where('stock_quantity >', 0)
                ->findAll(),
            'customers' => $customerModel->findAll()
        ]);
    }
}