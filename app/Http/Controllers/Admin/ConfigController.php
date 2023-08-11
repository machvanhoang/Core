<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConfigRequest;
use App\Models\Config;
use App\Repositories\Config\ConfigRepositoryInterface;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct(
        private ConfigRepositoryInterface $configRepository
    ) {
    }
    public function index(Request $request)
    {
        $config = $this->configRepository->first();
        return view('admin.config.index', compact('config'));
    }
    public function update(ConfigRequest $request, Config $config)
    {
        $data = $request->validated();
        $config = $this->configRepository->update($config->id, $data);
        if (!$config) {
            return back()->withInput()->with([
                'error' => true,
                'message' => 'Update config lỗi.'
            ]);
        }
        return redirect()->route('admin.config.index')->with([
            'success' => true,
            'message' => 'Update config thành công.'
        ]);
    }
}
