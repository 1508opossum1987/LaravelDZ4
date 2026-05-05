<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Иван Петров',
                'email' => 'ivan.petrov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Мария Сидорова',
                'email' => 'maria.sidorova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Дмитрий Козлов',
                'email' => 'dmitry.kozlov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Елена Новикова',
                'email' => 'elena.novikova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ],
            [
                'name' => 'Алексей Морозов',
                'email' => 'alexey.morozov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Ольга Кузнецова',
                'email' => 'olga.kuznetsova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Сергей Волков',
                'email' => 'sergey.volkov@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Татьяна Соколова',
                'email' => 'tatiana.sokolova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Андрей Лебедев',
                'email' => 'andrey.lebedev@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'Наталья Павлова',
                'email' => 'natalia.pavlova@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            // Пользователи с ролью 'admin'
            [
                'name' => 'Максим Федоров',
                'email' => 'maxim.fedorov@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Анна Егорова',
                'email' => 'anna.egorova@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Владимир Николаев',
                'email' => 'vladimir.nikolaev@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Екатерина Андреева',
                'email' => 'ekaterina.andreeva@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Павел Макаров',
                'email' => 'pavel.makarov@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Светлана Григорьева',
                'email' => 'svetlana.grigorieva@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Константин Михайлов',
                'email' => 'konstantin.mikhailov@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Юлия Борисова',
                'email' => 'yulia.borisova@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'manager',
            ],
            [
                'name' => 'Николай Титов',
                'email' => 'nikolay.titov@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Ирина Тарасова',
                'email' => 'irina.tarassova@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'manager',
            ],
        ];

        foreach ($users as $user) {
            User::query()->updateOrCreate(
                [
                    'email' => $user['email'],
                ],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                ]
            );
        }

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            CountrySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
