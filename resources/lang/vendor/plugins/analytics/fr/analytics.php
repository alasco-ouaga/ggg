<?php



return [
    'sessions' => 'Sessions',
    'visitors' => 'Visiteurs',
    'pageviews' => 'Pages vues',
    'bounce_rate' => 'Taux de rebond',
    'page_session' => 'Pages/Session',
    'avg_duration' => 'Durée moyenne',
    'percent_new_session' => 'Pourcentage de nouvelles sessions',
    'new_users' => 'Nouveaux visiteurs',
    'visits' => 'visites',
    'views' => 'vues',
    'property_id_not_specified' => 'Vous devez fournir un ID de vue valide. Le document se trouve ici : <a href="https://docs.botble.com/cms/master/plugin-analytics" target="_blank">https://docs.botble.com/cms/master/plugin-analytics</a>',
    'credential_is_not_valid' => 'Les informations d\'identification de Google Analytics ne sont pas valides. Le document se trouve ici : <a href="https://docs.botble.com/cms/master/plugin-analytics" target="_blank">https://docs.botble.com/cms/master/plugin-analytics</a>',
    'start_date_can_not_before_end_date' => 'La date de début :start_date ne peut pas être postérieure à la date de fin :end_date',
    'wrong_configuration' => 'Pour afficher les analyses, vous devez obtenir un identifiant client Google Analytics et l\'ajouter à vos paramètres. Vous avez également besoin des données d\'identification JSON. Le document se trouve ici : <a href="https://docs.botble.com/cms/master/plugin-analytics" target="_blank">https://docs.botble.com/cms/master/plugin-analytics</a>',
    'property_id_is_invalid' => 'L\'ID de propriété n\'est pas valide. Vérifiez ceci : https://developers.google.com/analytics/devguides/reporting/data/v1/property-id',

    'settings' => [
        'title' => 'Google Analytics',
        'description' => 'Configuration des informations d\'identification pour Google Analytics',
        'google_tag_id' => 'ID Google Tag',
        'google_tag_id_placeholder' => 'Exemple : G-76NX8HY29D',
        'analytics_property_id' => 'ID de propriété pour GA4',
        'analytics_property_id_description' => 'ID de propriété Google Analytics (GA4)',
        'json_credential' => 'Informations d\'identification du compte de service',
        'json_credential_description' => 'Informations d\'identification du compte de service',
    ],

    'widget_analytics_page' => 'Pages les plus visitées',
    'widget_analytics_browser' => 'Navigateurs les plus utilisés',
    'widget_analytics_referrer' => 'Principaux référents',
    'widget_analytics_general' => 'Analyse du site',
    'missing_library_warning' => 'Erreur du plugin d\'analyse : Bibliothèques tierces manquantes, veuillez exécuter "composer update" pour les installer.',
];

