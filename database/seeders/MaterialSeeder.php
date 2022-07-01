<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Material;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = Material::factory(82)->create();

        foreach ($materials as $material) {
            $tags = Tag::inRandomOrder()->take(5)->get();
            $links = Link::inRandomOrder()->take(3)->get();

            $material->tags()->attach($tags);
            $material->links()->attach($links);
        }
    }
}
