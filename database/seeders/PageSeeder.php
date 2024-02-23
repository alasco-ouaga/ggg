<?php

namespace Database\Seeders;

use Botble\Base\Facades\Html;
use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Models\Page;
use Botble\Page\Tables\PageTable;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;

class PageSeeder extends BaseSeeder
{
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Home',
                'content' =>
                    Html::tag('div', '[search-box title="Trouvez vos maisons préférées chez RG IMMOBILIER" background_image="general/home-banner.jpg" enable_search_projects_on_homepage_search="yes" default_home_search_type="project"][/search-box]') .
                    Html::tag('div', '[featured-projects title="Projets en vedette" subtitle="Nous faisons les meilleurs choix avec les projets les plus chauds et les plus prestigieux, veuillez consulter les détails ci-dessous pour en savoir plus." limit="4"][/featured-projects]') .
                    Html::tag('div', '[properties-by-locations title="Propriétés par emplacement" subtitle="Chaque endroit est un bon choix, il vous aidera à prendre la bonne décision, ne manquez pas l\'occasion de découvrir nos merveilleuses propriétés." city="1,2,3,4,5"][/properties-by-locations]') .
                    Html::tag('div', '[properties-for-sale title="Propriétés à vendre" subtitle="Ci-dessous se trouve une liste des propriétés actuellement à vendre." limit="8"][/properties-for-sale]') .
                    Html::tag('div', '[properties-for-rent title="Propriétés à louer" subtitle="Ci-dessous se trouve une liste de prix détaillée de chaque propriété à louer." limit="8"][/properties-for-rent]') .
                    Html::tag('div', '[featured-agents title="Agents en vedette"][/featured-agents]') .
                    Html::tag(
                        'div',
                        '[recently-viewed-properties title="Propriétés récemment consultées" subtitle="Vos propriétés consultées récemment." limit="8"][/recently-viewed-properties]'
                    ) .
                    Html::tag('div', '[latest-news title="Actualités" subtitle="Ci-dessous se trouvent les dernières actualités immobilières que nous recevons régulièrement de sources fiables." limit="4"][/latest-news]')
                ,
                'template' => 'homepage',
            ],
            [
                'name' => 'News',
                'content' => '---',
                'template' => 'default',
            ],
            [
                'name' => 'About us',
                'description' => 'Fondée le 28 août 1993 (anciennement connue sous le nom de Truong Thinh Phat Construction Co., Ltd.), RG IMMOBILIER opère dans le domaine de l\'immobilier, construisant des villas à louer. Avec le slogan "Rompre le temps, à travers l\'espace" et une stratégie de développement durable, en faisant de l\'immobilier son domaine de prédilection, RG IMMOBILIER connecte constamment les acheteurs et les vendeurs dans ce secteur.',
                'content' => '<h4> <span style="font-size:18px;"><b>1.PROFIL </b><span style="font-family:Arial,Helvetica,sans-serif;"><strong> ENTREPRISE </strong></span></span> </h4>
                            <p><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">Fondée le 28 août 1993 (anciennement connue sous le nom de Truong Thinh Phat Construction Co., Ltd.), RG IMMOBILIER opère dans le domaine de l\'immobilier, construisant des villas à louer.<br /> Avec le slogan "Rompre le temps, à travers l\'espace" et une stratégie de développement durable, en faisant de l\'immobilier son domaine de prédilection, RG IMMOBILIER connecte constamment les acheteurs et les vendeurs dans ce secteur. L\'immobilier, rapprochant les gens au-delà de la distance du temps et de l\'espace, est un lieu fiable pour l\'investissement immobilier - un domaine en constante évolution au fil du temps.</span></span> </p>
                            <blockquote> <h2 style="font-style: italic; text-align: center;"><span style="font-size:24px;"><strong><span style="font-family:Arial,Helvetica,sans-serif;"><span style="color:#16a085;">&quot;Rompre le temps, à travers l\'espace&quot;</span></span></strong></span></h2></blockquote>
                            <h4 style="text-align: center;"><img alt="" src="' . url('') . '/storage/general/asset-3-at-3x.png" style="width: 90%;" /></h4>
                            <h4><span style="font-size:18px;"><b><font face="Arial, Helvetica, sans-serif">2. VISION&nbsp;</font></b></span></h4>
                            <p><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">- Acquisition de zones domestiques.<br /> - Atteindre loin à travers les continents.</span></span></p>
                            <h4><span style="font-size:18px;"><b>3. MISSION</b></span></h4>
                            <p><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">- Créer la communauté <br />- Construire des destinations <br /> - Nourrir le bonheur </span></span></p>
                            <p><img alt="" src="' . url('') . '/storage/general/vietnam-office-4.jpg" /></p>
                            ',
                'template' => 'default',
            ],
            [
                'name' => 'Contact',
                'content' => '<p>[contact-form][/contact-form]<br /> &nbsp;</p>
                            <h3>Directions</h3>
                            <p>[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]</p>      
                            <p>&nbsp;</p>
                        ',
                'template' => 'default',
            ],
            [
                'name' => 'Terms & Conditions',
                'description' => 'Les droits d\'auteur et autres droits de propriété intellectuelle sur tout texte, image, audio, logiciel et autre contenu de ce site sont détenus par RG IMMOBILIER et ses affiliés. Les utilisateurs sont autorisés à consulter le contenu du site Web, à citer le contenu en l\'imprimant, en le téléchargeant sur le disque dur et en le distribuant à d\'autres à des fins non commerciales.',
                'content' => '<p style="text-align: justify;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">L\'accès et l\'utilisation du site Web de RG IMMOBILIER sont soumis aux conditions suivantes, ainsi qu\'aux lois pertinentes du Vietnam.</span></span></p>
                                <h4 style="text-align: justify;"><span style="font-size:18px;"><span style="font-family:Arial,Helvetica,sans-serif;"><strong>1. Droit d\'auteur</strong></span></span></h4>
                                <p style="text-align: justify;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">Les droits d\'auteur et autres droits de propriété intellectuelle sur tout texte, image, audio, logiciel et autre contenu de ce site sont détenus par RG IMMOBILIER et ses affiliés. Les utilisateurs sont autorisés à consulter le contenu du site Web, à citer le contenu en l\'imprimant, en le téléchargeant sur le disque dur et en le distribuant à d\'autres à des fins non commerciales, fournissant des informations ou des fins personnelles. Aucun contenu de ce site ne peut être utilisé à des fins de vente ou de distribution à des fins lucratives, ni être modifié ou inclus dans toute autre publication ou site Web.</span></span></p>
                                <h4 style="text-align: justify;"><span style="font-size:18px;"><span style="font-family:Arial,Helvetica,sans-serif;"><strong>2. Contenu</strong></span></span></h4>
                                <p style="text-align: justify;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">Les informations sur ce site Web sont compilées avec une grande confiance mais à des fins de recherche d\'informations générales uniquement. Bien que nous nous efforcions de maintenir des informations mises à jour et précises, nous ne faisons aucune déclaration ou garantie d\'aucune manière concernant l\'exhaustivité, l\'exactitude, la fiabilité, l\'adéquation ou la disponibilité par rapport au site Web, ou les informations connexes, produits, services ou images dans le site Web pour quelque raison que ce soit. </span></span></p>
                                <p style="text-align: justify;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">RG IMMOBILIER et ses employés, gestionnaires et agents ne sont pas responsables de toute perte, dommage ou dépense encourus en raison de l\'accès et de l\'utilisation de ce site Web et des sites qui y sont connectés, y compris, mais sans s\'y limiter, la perte de bénéfices, les pertes directes ou indirectes. Nous ne sommes pas non plus responsables, ou conjointement responsables, si le site est temporairement inaccessible en raison de problèmes techniques indépendants de notre volonté. Tous les commentaires, suggestions, images, idées et autres informations ou matériaux que les utilisateurs nous soumettent via ce site deviendront notre propriété exclusive, y compris le droit de peuvent survenir à l\'avenir associé à nous.</span></span></p>
                                <p style="text-align: center;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;"><img alt="" src="' . url('') . '/storage/general/copyright.jpg" style="width: 90%;" /></span></span></p>
                                <h4 style="text-align: justify;"><span style="font-size:18px;"><span style="font-family:Arial,Helvetica,sans-serif;"><strong>3. Remarque on&nbsp;site connectés</strong></span></span></h4>
                                <p style="text-align: justify;"><span style="font-size:16px;"><span style="font-family:Arial,Helvetica,sans-serif;">À de nombreux points du site Web, les utilisateurs peuvent obtenir des liens vers d\'autres sites Web liés à un aspect spécifique. Cela ne signifie pas que nous sommes liés aux sites Web ou aux entreprises qui possèdent ces sites Web. Bien que nous ayons l\'intention de connecter les utilisateurs à des sites d\'intérêt, nous ne sommes pas responsables ou conjointement responsables de nos employés, gestionnaires ou représentants. avec d\'autres sites Web et les informations qui y sont contenues.</span></span></p>
                            ',
                'template' => 'default',
            ],
            [
                'name' => 'Cookie Policy',
                'content' => Html::tag('h3', 'Consentement aux cookies de l\'UE') .
                    Html::tag(
                        'p',
                        'Pour utiliser ce site Web, nous utilisons des cookies et collectons certaines données. Pour être conforme au RGPD de l\'UE, nous vous donnons le choix d\'autoriser l\'utilisation de certains cookies et de collecter certaines données.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'Les données essentielles sont nécessaires pour faire fonctionner le site que vous visitez techniquement. Vous ne pouvez pas les désactiver.'
                    ) .
                    Html::tag(
                        'p',
                        '- Cookie de session : PHP utilise un cookie pour identifier les sessions utilisateur. Sans ce cookie, le site Web ne fonctionne pas.'
                    ) .
                    Html::tag(
                        'p',
                        '- Cookie de jeton CSRF : Laravel génère automatiquement un "jeton" CSRF pour chaque session utilisateur active gérée par l\'application. Ce jeton est utilisé pour vérifier que l\'utilisateur authentifié est bien celui qui effectue réellement les demandes à l\'application.'
                    ),
                'template' => 'default',
            ],
            [
                'name' => 'Properties',
                'content' =>
                    Html::tag('div', '[properties-list title="Découvrez nos propriétés" description=""Découvrez nos propriétés" avec la description "Chaque endroit est un bon choix, il vous aidera à prendre la bonne décision, ne manquez pas l\'occasion de découvrir nos merveilleuses propriétés."" number_of_properties_per_page="12"][/properties-list]')
                ,
                'template' => 'homepage',
            ],
            [
                'name' => 'Projects',
                'content' =>
                    Html::tag('div', '[projects-list  title="Découvrez nos projets" description="Nous faisons les meilleurs choix avec les projets les plus chauds et les plus prestigieux. Veuillez visiter les détails ci-dessous pour en savoir plus." number_of_projects_per_page="12"][/projects-list]')
                ,
                'template' => 'homepage',
            ],
        ];

        Page::query()->truncate();

        foreach ($pages as $item) {
            $item['user_id'] = 1;
            $page = Page::query()->create($item);

            Slug::query()->create([
                'reference_type' => Page::class,
                'reference_id' => $page->id,
                'key' => Str::slug($page->name),
                'prefix' => SlugHelper::getPrefix(Page::class),
            ]);
        }
    }
}
