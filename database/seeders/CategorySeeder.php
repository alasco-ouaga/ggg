<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Category;
use Botble\RealEstate\Models\Project;
use Botble\RealEstate\Models\Property;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;

class CategorySeeder extends BaseSeeder
{
    public function run(): void
    {
        Category::query()->truncate();
        $categories = [
            [
                'name' => 'Appartement',
                'is_default' => true,
                'order' => 0,
            ],
            [
                'name' => 'Villa',
                'is_default' => false,
                'order' => 1,
            ],
            [
                'name' => 'Condo',
                'is_default' => false,
                'order' => 2,
            ],
            [
                'name' => 'Maison',
                'is_default' => false,
                'order' => 3,
            ],
            [
                'name' => 'Terrain',
                'is_default' => false,
                'order' => 4,
            ],
            [
                'name' => 'Propriété commerciale',
                'is_default' => false,
                'order' => 5,
            ],
        ];

        Category::query()->truncate();

        foreach ($categories as $item) {
            $category = Category::query()->create($item);

            Slug::query()->create([
                'reference_type' => Category::class,
                'reference_id' => $category->id,
                'key' => Str::slug($category->name),
                'prefix' => SlugHelper::getPrefix(Category::class),
            ]);
        }

        $properties = Property::query()->get();

        foreach ($properties as $property) {
            $property->categories()->sync([Category::query()->inRandomOrder()->value('id')]);
            $property->save();
        }

        $projects = Project::query()->get();

        foreach ($projects as $project) {
            $project->categories()->sync([Category::query()->inRandomOrder()->value('id')]);
            $project->save();
        }
    }
}
