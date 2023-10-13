<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TestImport;
use App\Jobs\ExportJob;
use App\Models\Province;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TestController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.imports.index');
    }

    public function datatables(Request $request)
    {
        $columns       = [
            0 => 'id',
            1 => 'name',
            2 => 'slug',
            3 => 'code',
            4 => 'status',
            5 => 'created_at'
        ];
        $totalData     = Province::count();
        $totalFiltered = $totalData;
        $limit         = $request->length ?? 20;
        $start         = $request->start ?? 0;
        $order         = $columns[$request->input('order.0.column') ?? 0];
        $dir           = $request->input('order.o.dir') ?? 'asc';
        $customers     = Province::offset($start)->limit($limit)->orderBy($order, $dir)->get();
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');

            $query         = Province::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('slug', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('created_at', 'LIKE', "%{$search}%")
                ->offset($start)->limit($limit)
                ->orderBy($order, $dir);
            $customers     = $query->get();
            $totalFiltered = $query->count();
        }
        $jsonData = [
            'draw'            => intval($request->draw),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data'            => $customers
        ];
        return response()->json($jsonData);
    }

    public function upload(Request $request)
    {
        if ($request->has('file_upload')) {
            Excel::queueImport(new TestImport, $request->file_upload)->chain([
                Mail::to('dinhcongthong97y@gmail.com')->queue(new ImportEmail())
            ]);
        }
        return redirect()->back()->with(['success' => 'Đã nhận file import. Vui lòng đợi mail báo thành công!']);
        // return 'thành công';
    }

    public function export(Request $request)
    {
        $total      = Province::count();
        $chunkSize  = 1000;
        $chunkTimes = ceil($total / $chunkSize);
        $fileName   = 'export_' . time() . '.csv';
        for ($i = 400; $i < $chunkTimes; $i++) {
            $offset = $i * $chunkSize;
            // Check last for loop to send mail when finished
            $isLastest = $i == ($chunkTimes - 1) ? true : false;
            $data      = [
                'offset'    => $offset,
                'fileName'  => $fileName,
                'chunkSize' => $chunkSize,
                'isLastest' => $isLastest,
                'email'     => $request->email
            ];
            ExportJob::dispatch($data);
        }
        return redirect()->back()->with('success', 'The system is in process. We will send you an email with the export file attached after completion.');
    }
}
