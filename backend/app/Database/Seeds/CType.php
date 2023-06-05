<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CType extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Косметический ремонт'],
            ['name' => 'Капитальный ремонт'],
            ['name' => 'Евроремонт'],
            ['name' => 'Напольные покрытия'],
            ['name' => 'Водоснабжение'],
            ['name' => 'Укладка плитки'],
            ['name' => 'Оклейка обоев'],
            ['name' => 'Электротехнические работы'],
            ['name' => 'Декоративная штукатурка'],
            ['name' => 'Установка дверей'],
        ];

        for ($i = 0; $i < 10; $i++) {
            $this->db->query('INSERT INTO ctypes (name) VALUES (:name:)', $data[$i]);
        }
    }
}
