<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TestImport;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;
use Excel;

class TestController extends Controller
{
    public function index(Request $request) {
        return view('admin.imports.index');
    }

    public function datatables(Request $request) {
        $columns                   = [
            0 => 'id',
            1 => 'name',
            2 => 'slug',
            3 => 'code',
            4 => 'status',
            5 => 'created_at'
        ];
        $totalData = Province::count();
        $totalFiltered = $totalData;
        $limit         = $request->length ?? 20;
        $start         = $request->start ?? 0;
        $order         = $columns[$request->input('order.0.column') ?? 0];
        $dir           = $request->input('order.o.dir') ?? 'asc';
        $customers = Province::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query = Province::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('slug', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
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

    public function upload(Request $request)
    {
        if ($request->has('file_upload')) {
            Excel::queueImport(new TestImport, $request->file_upload);
        }
        return 'thành công';
    }
}
