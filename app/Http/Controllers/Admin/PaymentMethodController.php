<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentMethodRequest;
use App\Models\PaymentMethod;
use App\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function __construct(
        private PaymentMethodRepositoryInterface $paymentMethodRepository
    ) {
    }
    public function index(Request $request, PaymentMethod $paymentMethod = null)
    {
        $payments = $this->paymentMethodRepository->getAll();
        return view('admin.payment_method.index', compact('payments', 'paymentMethod'));
    }
    public function store(PaymentMethodRequest $request)
    {
        $data = $request->validated();
        $payment = $this->paymentMethodRepository->create($data);
        if (!$payment) {
            return back()->withInput()->with([
                'error' => true,
                'message' => 'Create payment method lỗi.'
            ]);
        }
        return redirect()->route('admin.payment_method.index')->with([
            'success' => true,
            'message' => 'Create payment method thành công.'
        ]);
    }
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $data = $request->validated();
        $payment = $this->paymentMethodRepository->update($paymentMethod->id, $data);
        if (!$payment) {
            return back()->withInput()->with([
                'error' => true,
                'message' => 'Update payment method lỗi.'
            ]);
        }
        return redirect()->route('admin.payment_method.index', $payment)->with([
            'success' => true,
            'message' => 'Update payment method thành công.'
        ]);
    }
    public function delete(PaymentMethod $paymentMethod)
    {
        try {
            $paymentMethod->delete();
            return redirect()->route('admin.payment_method.index')->with([
                'success' => true,
                'message' => 'Xóa phương thức thanh toán thành công.'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.payment_method.index')->with([
                'error' => false,
                'message' => 'Xóa phương thức thanh toán lỗi vì dữ liệu liên quan.'
            ]);
        }
    }
}
