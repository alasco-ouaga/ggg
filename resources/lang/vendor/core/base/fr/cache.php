<?php

return [
    'cache_management' => 'Gestion du cache',
    'cache_commands' => 'Effacer les commandes de cache',
    'commands' => [
        'clear_cms_cache' => [
            'title' => 'Effacer tout le cache du CMS',
            'description' => 'Efface le cache du CMS : cache de la base de données, blocs statiques... Exécutez cette commande lorsque vous ne voyez pas les changements après avoir mis à jour les données.',
            'success_msg' => 'Cache nettoyé',
        ],
        'refresh_compiled_views' => [
            'title' => 'Actualiser les vues compilées',
            'description' => 'Efface les vues compilées pour les mettre à jour.',
            'success_msg' => 'Vue du cache actualisée',
        ],
        'clear_config_cache' => [
            'title' => 'Effacer le cache de la configuration',
            'description' => 'Vous pourriez avoir besoin de rafraîchir le cache de configuration lorsque vous modifiez quelque chose sur un environnement de production.',
            'success_msg' => 'Cache de configuration nettoyé',
        ],
        'clear_route_cache' => [
            'title' => 'Effacer le cache des routes',
            'description' => 'Effacer le cache des itinéraires.',
            'success_msg' => 'Le cache des routes a été nettoyé',
        ],
        'clear_log' => [
            'title' => 'Effacer le journal',
            'description' => 'Efface les fichiers journaux système',
            'success_msg' => 'Le journal système a été nettoyé',
        ],
    ],
];
