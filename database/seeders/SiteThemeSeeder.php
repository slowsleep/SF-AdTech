<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteTheme;

class SiteThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = ['красота', 'здоровье', 'игры', 'мода', 'музыка', 'спорт', 'технологии', 'юмор'];

        for ($i = 0; $i < count($themes); $i++) {
            SiteTheme::factory()->create([
                'name' => $themes[$i]
            ]);
        }
    }
}
