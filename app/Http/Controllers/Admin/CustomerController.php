<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\CustomerCreateRequest;
use App\Http\Requests\Admin\Customer\CustomerUpdateRequest;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\CustomerStatus\CustomerStatusRepositoryInterface;
use App\Models\Customer;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct(
        private CustomerRepositoryInterface $customerRepository,
        private CustomerStatusRepositoryInterface $customerStatusRepository,
        private CustomerService $customerService
    ) {
    }
    public function index()
    {
        $customers = $this->customerRepository->paginate(10, [], ['id' => 'DESC'], [], ['status']);
        return view('admin.customer.index', compact('customers'));
    }
    public function create()
    {
        $customerStatus = $this->customerStatus();
        return view('admin.customer.create', compact('customerStatus'));
    }
    public function store(CustomerCreateRequest $request)
    {
        $data = $request->validated();
        $result = $this->customerService->create($data);
        if ($result['error']) {
            return back()->with($result);
        }
        return redirect()->route('admin.customer.index')->with($result);
    }
    public function edit(Customer $customer)
    {
        $customerStatus = $this->customerStatus();
        return view('admin.customer.edit', compact('customer', 'customerStatus'));
    }
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $data = $request->validated();
        $result = $this->customerService->updated($customer, $data);
        return redirect()->route('admin.customer.edit', $customer)->with($result);
    }
    public function delete(Customer $customer)
    {
        $result = $this->customerService->delete($customer);
        return redirect()->route('admin.customer.index', $customer)->with($result);
    }
    private function customerStatus()
    {
        return $this->customerStatusRepository->getAll();
    }
}
