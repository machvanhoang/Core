<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\CustomerCreateRequest;
use App\Http\Requests\Admin\Customer\CustomerUpdateRequest;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\CustomerStatus\CustomerStatusRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\Request;
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
        if (isset($result['error'])) {
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

    public function datatables(Request $request)
    {
        // dd($request->input('order.0.column'));
        $columns                   = [
            0 => 'id',
            1 => 'full_name',
            2 => 'email',
            3 => 'address',
            4 => 'created_at'
        ];
        $totalData = Customer::count();
        $totalFiltered = $totalData;
        $limit         = $request->length ?? 20;
        $start         = $request->start ?? 0;
        $order         = $columns[$request->input('order.0.column') ?? 0];
        $dir           = $request->input('order.o.dir') ?? 'asc';
        $customers = Customer::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query = Customer::where('id', 'LIKE', "%{$search}%")
                ->orWhere('full_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('username', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('created_at', 'LIKE', "%{$search}%")
                ->offset($start)->limit($limit)
                ->orderBy($order, $dir);
            $customers = $query->get();
            $totalFiltered = $query->count();
        }
        $jsonData = [
            'draw'              => intval($request->draw),
            'recordsTotal'      => intval($totalData),
            'recordsFiltered'   => intval($totalFiltered),
            'data'              => $customers
        ];
        return response()->json($jsonData);
    }
}
