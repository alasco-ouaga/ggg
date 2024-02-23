<?php

namespace Database\Seeders;

use Botble\ACL\Models\User;
use Botble\Base\Facades\Html;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Media\Facades\RvMedia;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BlogSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('news');

        Post::query()->where('id', '>', 8)->delete();
        Category::query()->where('id', '>', 8)->delete();
        Tag::query()->where('id', '>', 3)->delete();
        $posts = [
            [
                'name' => 'Les tendances en matière de sacs à main pour 2020 à connaître',
            ],
            [
                'name' => 'Stratégies de référencement les plus recherchées!',
            ],
            [
                'name' => 'Quelle entreprise choisiriez-vous?',
            ],
            [
                'name' => 'Les astuces des concessionnaires de voitures d\'occasion exposées',
            ],
            [
                'name' => '20 façons de vendre votre produit plus rapidement',
            ],
            [
                'name' => 'Les secrets des écrivains riches et célèbres',
            ],
            [
                'name' => 'Imaginez perdre 20 livres en 14 jours!',
            ],
            [
                'name' => 'Utilisez-vous encore cette vieille et lente machine à écrire?',
            ],
            [
                'name' => 'Une crème pour la peau qui a fait ses preuves',
            ],
            [
                'name' => '10 raisons de créer votre propre site Web rentable!',
            ],
            [
                'name' => 'Des moyens simples de réduire vos rides indésirables!',
            ],
            [
                'name' => 'Critique de l\'Apple iMac avec écran Retina 5K',
            ],
            [
                'name' => '10 000 visiteurs sur votre site Web en un mois: Garanti',
            ],
            [
                'name' => 'Découvrez les secrets de la vente d\'articles haut de gamme',
            ],
            [
                'name' => '4 conseils d\'experts pour choisir le bon portefeuille pour hommes',
            ],
            [
                'name' => 'Pochettes sexy: Comment acheter et porter un sac pochette de designer',
            ],
        ];

        $faker = fake();

        foreach ($posts as $index => $item) {
            $item['content'] =
                ($index % 3 == 0 ? Html::tag(
                    'p',
                    '[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]'
                ) : '') .
                Html::tag('p', $faker->realText(1000)) .
                Html::tag(
                    'p',
                    Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(1, 5) . '.jpg'))
                        ->toHtml(),
                    ['class' => 'text-center']
                ) .
                Html::tag('p', $faker->realText(500)) .
                Html::tag(
                    'p',
                    Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(6, 10) . '.jpg'))
                        ->toHtml(),
                    ['class' => 'text-center']
                ) .
                Html::tag('p', $faker->realText(1000)) .
                Html::tag(
                    'p',
                    Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(11, 14) . '.jpg'))
                        ->toHtml(),
                    ['class' => 'text-center']
                ) .
                Html::tag('p', $faker->realText(1000));
            $item['author_id'] = User::query()->value('id');
            $item['author_type'] = User::class;
            $item['views'] = $faker->numberBetween(100, 2500);
            $item['is_featured'] = $index < 9;
            $item['image'] = 'news/' . ($index + 1) . '.jpg';
            $item['description'] = $faker->text();
            $item['content'] = str_replace(url(''), '', $item['content']);

            $post = Post::query()->create($item);

            $post->categories()->sync([Arr::random([1, 2, 4, 6])]);

            $post->tags()->sync([1, 2, 3]);

            Slug::query()->create([
                'reference_type' => Post::class,
                'reference_id' => $post->id,
                'key' => Str::slug($post->name),
                'prefix' => SlugHelper::getPrefix(Post::class),
            ]);
        }

        Post::query()->update(['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
