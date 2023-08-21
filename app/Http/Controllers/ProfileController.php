<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // If the profile is not already in the database, create a new instance of the Profile model
        $profile = new Profile();

        // Display the form for creating a profile, passing an empty profile to the view
        return view('admin.pages.profile.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных формы создания профиля
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string',
            'location' => 'required|string',
            'email' => 'required|email',
            'skype' => 'required|string',
            'telegram' => 'required|string',
        ]);

        // Обработка загрузки изображения (если был загружен файл)
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();

            // Сохраняем файл в папку 'public/photos'
            $file->storePubliclyAs('public/photos', $fileName);

            // Добавляем имя файла в данные профиля, чтобы сохранить его в базе данных
            $profileData['photo'] = $fileName;
        }

        // Создаем профиль с указанными данными
        $profile = Profile::create([
            'photo' => $profileData['photo'] ?? null, // Если файла не было загружено, сохраняем null
            'position' => $request->position,
            'location' => $request->location,
            'email' => $request->email,
            'skype' => $request->skype,
            'telegram' => $request->telegram,
        ]);

        if ($profile) {
            // Если профиль успешно сохранен, делаем редирект на страницу Dashboard с флеш-сообщением
            return redirect()->route('dashboard')->with('success', 'Profile created successfully!');
        } else {
            // Если возникла ошибка при сохранении профиля, делаем редирект на страницу создания профиля с флеш-сообщением
            return redirect()->route('profile.create')->with('error', 'Error creating profile.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get the profile from the database
        $profile = Profile::first();

        // Display the view with the profile passed to it
        return view('admin.pages.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        // Здесь вы можете получить данные профиля по его ID и передать их в шаблон для отображения формы редактирования
        $profile = Profile::first();

        return view('admin.pages.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Валидация данных формы редактирования профиля
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string',
            'location' => 'required|string',
            'email' => 'required|email',
            'skype' => 'required|string',
            'telegram' => 'required|string',
        ]);

        // Получаем данные профиля для текущего пользователя (предположим, что вы используете аутентификацию)
        $profile = Profile::first();

        // Проверяем, существует ли профиль
        if ($profile) {
            // Обработка загрузки изображения (если был загружен файл)
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file = $request->file('photo');
                $fileName = $file->getClientOriginalName();

                // Сохраняем файл в нужную директорию, например, в папку 'public/photos'
                $file->storeAs('public/photos', $fileName);

                // Обновляем имя файла в данных профиля
                $profile->photo = $fileName;
            }

            // Обновляем остальные данные профиля
            $profile->position = $request->position;
            $profile->location = $request->location;
            $profile->email = $request->email;
            $profile->skype = $request->skype;
            $profile->telegram = $request->telegram;

            // Сохраняем изменения
            $profile->save();

            // Редиректим на страницу Dashboard с флеш-сообщением об успешном обновлении профиля
            return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
        } else {
            // Если профиля нет, редиректим на страницу создания профиля с сообщением об ошибке
            return redirect()->route('profile.create')->with('error', 'Profile not found. Please create a profile first.');
        }
    }
}
