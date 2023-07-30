<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.pages.dashboard'); // Замените 'admin.dashboard' на имя вашего представления админ-панели
    }
}