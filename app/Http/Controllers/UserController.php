<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->get();

        return view('admin.users.index', (
        ['users' => $users]
        ));
    }

    public function toggleActive($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Вы не можете изменить статус своего аккаунта.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'разблокирован' : 'заблокирован';
        $message = "Пользователь '{$user->name}' успешно {$status}.";

        return redirect()
            ->route('admin.users.index')
            ->with('success', $message);
    }

    public function changeRole($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Вы не можете изменить роль своего аккаунта');
        }

        if ($user->role === 'admin') {
            $user->role = 'user';
        } else
            $user->role = 'admin';

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Роль пользователя '{$user->name}' успешно изменена");
    }

}
