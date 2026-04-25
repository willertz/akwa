<?php

namespace Database\Seeders;

use App\Models\ShopCategory;
use Illuminate\Database\Seeder;

class ShopCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Душевые кабины',
                'depth_level' => 0,
                'priority' => 1,
                'parent_id' => 0,
                'title' => 'Купить душевую кабину в Воронеже',
                'description' => 'Широкий выбор душевых кабин от ведущих производителей.',
            ],
            [
                'name' => 'Ванны',
                'depth_level' => 0,
                'priority' => 2,
                'parent_id' => 0,
                'title' => 'Купить ванну в Воронеже',
                'description' => 'Акриловые, стальные и чугунные ванны.',
            ],
            [
                'name' => 'Унитазы и биде',
                'depth_level' => 0,
                'priority' => 3,
                'parent_id' => 0,
                'title' => 'Купить унитаз в Воронеже',
                'description' => 'Подвесные и напольные унитазы, биде.',
            ],
            [
                'name' => 'Умывальники и раковины',
                'depth_level' => 0,
                'priority' => 4,
                'parent_id' => 0,
                'title' => 'Купить раковину в Воронеже',
                'description' => 'Раковины и умывальники для ванной комнаты.',
            ],
            [
                'name' => 'Смесители',
                'depth_level' => 0,
                'priority' => 5,
                'parent_id' => 0,
                'title' => 'Купить смеситель в Воронеже',
                'description' => 'Смесители для ванной, кухни и душа.',
            ],
            [
                'name' => 'Радиаторы отопления',
                'depth_level' => 0,
                'priority' => 6,
                'parent_id' => 0,
                'title' => 'Купить радиатор отопления в Воронеже',
                'description' => 'Биметаллические, алюминиевые и стальные радиаторы.',
            ],
            [
                'name' => 'Котлы отопления',
                'depth_level' => 0,
                'priority' => 7,
                'parent_id' => 0,
                'title' => 'Купить котёл отопления в Воронеже',
                'description' => 'Газовые, электрические и твердотопливные котлы.',
            ],
            [
                'name' => 'Водонагреватели',
                'depth_level' => 0,
                'priority' => 8,
                'parent_id' => 0,
                'title' => 'Купить водонагреватель в Воронеже',
                'description' => 'Накопительные и проточные водонагреватели.',
            ],
            [
                'name' => 'Трубы и фитинги',
                'depth_level' => 0,
                'priority' => 9,
                'parent_id' => 0,
                'title' => 'Купить трубы и фитинги в Воронеже',
                'description' => 'Полипропиленовые, металлопластиковые трубы и фитинги.',
            ],
            [
                'name' => 'Насосы и насосные станции',
                'depth_level' => 0,
                'priority' => 10,
                'parent_id' => 0,
                'title' => 'Купить насос в Воронеже',
                'description' => 'Циркуляционные насосы, насосные станции для водоснабжения.',
            ],
        ];

        foreach ($categories as $data) {
            ShopCategory::firstOrCreate(['name' => $data['name']], $data);
        }
    }
}
