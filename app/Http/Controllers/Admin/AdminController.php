<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Метод для отображения админ-панели
    public function index()
    {
        // Получаем первую запись из таблицы profiles
        $profile = Profile::first();

        // Возвращаем представление и передаем переменную $profile
        return view('admin.pages.dashboard', compact('profile'));
    }
}
