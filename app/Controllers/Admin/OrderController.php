<?php
/**
 * Controller for managing product orders in the admin panel.
 * Handle listing, viewing detail, and updating status.
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Manajemen Pesanan',
            'orders' => $this->orderModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/shop/orders/index', $data);
    }

    public function show($id)
    {
        $order = $this->orderModel->find($id);

        if (!$order) {
            return redirect()->to(base_url('admin/shop/orders'))->with('error', 'Pesanan tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Pesanan #' . $order->order_number,
            'order' => $order,
        ];

        return view('admin/shop/orders/view', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $paymentStatus = $this->request->getPost('payment_status');

        $this->orderModel->update($id, [
            'status'         => $status,
            'payment_status' => $paymentStatus,
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
