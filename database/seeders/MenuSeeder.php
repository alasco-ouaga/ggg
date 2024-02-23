<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Facades\Menu;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;

class MenuSeeder extends BaseSeeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Main menu',
                'slug' => 'main-menu',
                'location' => 'main-menu',
                'items' => [
                    [
                        'title' => 'Projets',
                        'url' => '/projects',
                    ],
                    [
                        'title' => 'Proprietés',
                        'url' => '/properties',
                    ],
                    [
                        'title' => 'Agents',
                        'url' => '/agents',
                    ],
                    [
                        'title' => 'Nouveau',
                        'reference_id' => 2,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Carrières',
                        'url' => '/careers',
                    ],
                    [
                        'title' => 'Contacts',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                ],
            ],
            [
                'name' => 'À propos',
                'slug' => 'about',
                'items' => [
                    [
                        'title' => 'Contactez-nous',
                        'reference_id' => 3,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Contactez-nous',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Carrières',
                        'url' => '/careers',
                    ],
                    [
                        'title' => 'Conditions générales',
                        'reference_id' => 5,
                        'reference_type' => Page::class,
                    ],
                ],
            ],
            [
                'name' => 'Plus d\'informations',
                'slug' => 'more-information',
                'items' => [
                    [
                        'title' => 'Tous les projets',
                        'url' => '/projects',
                    ],
                    [
                        'title' => 'Toutes les propriétés',
                        'url' => '/properties',
                    ],
                    [
                        'title' => 'Maisons à vendre',
                        'url' => '/properties?type=sale',
                    ],
                    [
                        'title' => 'Maisons à louer',
                        'url' => '/properties?type=rent',
                    ],
                ],
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'items' => [
                    [
                        'title' => '"Dernières actualités"',
                        'reference_id' => 2,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Architecture de maison',
                        'reference_id' => 2,
                        'reference_type' => Category::class,
                    ],
                    [
                        'title' => 'Conception de maison',
                        'reference_id' => 4,
                        'reference_type' => Category::class,
                    ],
                    [
                        'title' => 'Matériaux de construction',
                        'reference_id' => 6,
                        'reference_type' => Category::class,
                    ],
                ],
            ],
        ];

        MenuModel::query()->truncate();
        MenuLocation::query()->truncate();
        MenuNode::query()->truncate();

        foreach ($data as $index => $item) {
            $menu = MenuModel::query()->create(Arr::except($item, ['items', 'location']));

            if (isset($item['location'])) {
                $menuLocation = MenuLocation::query()->create([
                    'menu_id' => $menu->id,
                    'location' => $item['location'],
                ]);

                LanguageMeta::saveMetaData($menuLocation);
            }

            foreach ($item['items'] as $menuNode) {
                $this->createMenuNode($index, $menuNode, $menu->id);
            }

            LanguageMeta::saveMetaData($menu, 'fr_FR');
        }

        Menu::clearCacheMenuItems();
    }

    protected function createMenuNode(int $index, array $menuNode, int|string $menuId, int|string $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::query()->create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $menuId, $createdNode->id);
            }
        }
    }
}
