<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->command->info('Таблицы заполнены тестовыми данными!');
    }
}

/**
 * Class CompanyTableSeeder - создает три тестовые компании
 */
class CompanyTableSeeder extends Seeder
{

    public function run()
    {

        for ($i = 1; $i <= 3; $i++) {
            DB::table('companies')
                ->insert([
                    'name' => 'Компания ' . $i,
                ]);
        }
    }

}

/**
 * Class DepartmentTableSeeder - создает для каждой компании от 5 до 15 подразделений
 */
class DepartmentTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 3; $i++) {
            $random_count = rand(5, 15);
            for ($j = 1; $j < $random_count; $j++) {
                DB::table('departments')
                    ->insert([
                        'company_id' => $i,
                        'director' => $faker->name,
                        'address' => $faker->address
                    ]);
            }
        }
    }

}

/**
 * Class EmployeesTableSeeder - создает для каждого подразделения от 5 до 20 сотрудников
 */
class EmployeesTableSeeder extends Seeder
{

    public function run()
    {
        $departments_count = DB::table('departments')->count();
        $faker = Factory::create();
        for ($i = 1; $i <= $departments_count; $i++) {
            $random_count = rand(5, 20);
            for ($j = 1; $j < $random_count; $j++) {
                DB::table('employees')
                    ->insert([
                        'department_id' => $i,
                        'name' => $faker->name,
                        'role' => $i % 2 == 0 ? 'ИТР' : 'Сотрудник'
                    ]);
            }
        }
    }

}
