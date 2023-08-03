<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserCreateRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserService $userService
    ) {
    }
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $status = $this->status();
        return view('admin.user.create', compact('status'));
    }
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $result = $this->userService->create($data);
        if (isset($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.user.index')->with($result);
    }
    public function edit(User $user)
    {
        $status = $this->status();
        return view('admin.user.edit', compact('user', 'status'));
    }
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $this->userService->updated($user, $data);
        return redirect()->route('admin.user.edit', $user)->with($result);
    }
    public function delete(User $user)
    {
        $result = $this->userService->delete($user);
        return redirect()->route('admin.user.index', $user)->with($result);
    }
    private function status()
    {
        $status = [
            PUBLISHED,
            PRIVATED,
            BLOCKED
        ];
        return $status;
    }
}
