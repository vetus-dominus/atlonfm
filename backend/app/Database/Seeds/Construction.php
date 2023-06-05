<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Construction extends Seeder
{
    public function run()
    {
        $data = [
            ['ctype_id' => 1,  'name' => 'Покраска',                 'price' => 1000],
            ['ctype_id' => 1,  'name' => 'Помывка',                  'price' => 2000],
            ['ctype_id' => 1,  'name' => 'Побелка',                  'price' => 3000],
            ['ctype_id' => 2,  'name' => 'Уничтожение',              'price' => 1500],
            ['ctype_id' => 2,  'name' => 'Возведение',               'price' => 1700],
            ['ctype_id' => 2,  'name' => 'Реставрация',              'price' => 1900],
            ['ctype_id' => 3,  'name' => 'Готический пол',           'price' => 2500],
            ['ctype_id' => 3,  'name' => 'Романский лифт',           'price' => 2700],
            ['ctype_id' => 3,  'name' => 'Арочный вход',             'price' => 2900],
            ['ctype_id' => 4,  'name' => 'Снятие полов',             'price' => 4500],
            ['ctype_id' => 4,  'name' => 'Уничтожение полов',        'price' => 4700],
            ['ctype_id' => 4,  'name' => 'Востановление полов',      'price' => 9900],
            ['ctype_id' => 5,  'name' => 'Краны',                    'price' => 5100],
            ['ctype_id' => 5,  'name' => 'Душевая',                  'price' => 7100],
            ['ctype_id' => 5,  'name' => 'Водоотвод',                'price' => 9200],
            ['ctype_id' => 6,  'name' => 'Укладка плитки',           'price' => 6000],
            ['ctype_id' => 6,  'name' => 'Выкладка плитки',          'price' => 6600],
            ['ctype_id' => 6,  'name' => 'Закладка плитки',          'price' => 6900],
            ['ctype_id' => 7,  'name' => 'Приклейка обоев',          'price' => 3500],
            ['ctype_id' => 7,  'name' => 'Отклейка обоев',           'price' => 3700],
            ['ctype_id' => 7,  'name' => 'Сушка обоев',              'price' => 3900],
            ['ctype_id' => 8,  'name' => 'Монтаж силовой системы',   'price' => 1110],
            ['ctype_id' => 8,  'name' => 'Демонтаж силовой системы', 'price' => 1120],
            ['ctype_id' => 8,  'name' => 'Монтаж системы защиты',    'price' => 1130],
            ['ctype_id' => 9,  'name' => 'Штукатурка',               'price' => 2200],
            ['ctype_id' => 9,  'name' => 'Покрытие азбестом',        'price' => 2300],
            ['ctype_id' => 9,  'name' => 'Заливка цементом',         'price' => 2400],
            ['ctype_id' => 10, 'name' => 'Установка входной двери',  'price' => 5500],
            ['ctype_id' => 10, 'name' => 'Монтаж заднего люка',      'price' => 5700],
            ['ctype_id' => 10, 'name' => 'Поиск аварийного выхода',  'price' => 5900],
        ];

        for ($i = 0; $i < 30; $i++) {
            $this->db->query(
                'INSERT INTO constructions (ctype_id, name, price) VALUES (:ctype_id:, :name:, :price:)',
                $data[$i]
            );
        }
    }
}
