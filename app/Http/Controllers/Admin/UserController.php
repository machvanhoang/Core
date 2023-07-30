<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.index', compact('users'));
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Deleted user successfully!');
    }
}
