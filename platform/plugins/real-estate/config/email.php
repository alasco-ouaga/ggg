<?php

return [
    'name' => 'plugins/real-estate::settings.email.title',
    'description' => 'plugins/real-estate::settings.email.description',
    'templates' => [
        'notice' => [
            'title' => 'Nouvelle consultation',
            'description' => 'Envoyé à l\'agent par e-mail / e-mail admin lorsqu\'une personne contacte via le formulaire de consultation',
            'subject' => 'Nouvelle consultation',
            'can_off' => true,
            'variables' => [
                'consult_name' => 'Nom',
                'consult_phone' => 'Téléphone',
                'consult_email' => 'E-mail',
                'consult_content' => 'Contenu',
                'consult_link' => 'Lien',
                'consult_subject' => 'Sujet',
                'consult_ip_address' => 'Adresse IP',
            ],
        ],
        'new-pending-property' => [
            'title' => 'Nouvelle propriété en attente',
            'description' => 'Envoyer un e-mail à l\'admin lorsqu\'une nouvelle propriété est créée',
            'subject' => 'Nouvelle propriété en attente par {{ post_author }} en attente d\'approbation',
            'can_off' => true,
            'enabled' => false,
            'variables' => [
                'post_author' => 'Auteur de l\'article',
                'post_name' => 'Nom de l\'article',
                'post_url' => 'URL de l\'article',
            ],
        ],
        'account-registered' => [
            'title' => 'Compte enregistré',
            'description' => 'Envoyer une notification à l\'admin lorsqu\'un nouveau compte est enregistré',
            'subject' => 'Nouveau compte enregistré sur {{ site_title }}',
            'can_off' => true,
            'enabled' => false,
            'variables' => [
                'account_name' => 'Nom du compte',
                'account_email' => 'E-mail du compte',
            ],
        ],
        'confirm-email' => [
            'title' => 'Confirmer l\'e-mail',
            'description' => 'Envoyer un e-mail à l\'utilisateur lorsqu\'il enregistre un compte pour vérifier son e-mail',
            'subject' => 'Notification de confirmation d\'e-mail',
            'can_off' => false,
            'variables' => [
                'verify_link' => 'Lien de vérification de l\'e-mail',
            ],
        ],
        'password-reminder' => [
            'title' => 'Réinitialiser le mot de passe',
            'description' => 'Envoyer un e-mail à l\'utilisateur lorsqu\'il demande une réinitialisation de mot de passe',
            'subject' => 'Réinitialisation du mot de passe',
            'can_off' => false,
            'variables' => [
                'reset_link' => 'Lien de réinitialisation du mot de passe',
            ],
        ],
        'payment-receipt' => [
            'title' => 'Reçu de paiement',
            'description' => 'Envoyer une notification à l\'utilisateur lorsqu\'il achète des crédits',
            'subject' => 'Reçu de paiement pour le package {{ package_name }} sur {{ site_title }}',
            'can_off' => true,
            'enabled' => false,
            'variables' => [
                'account_name' => 'Nom du compte',
                'account_email' => 'E-mail du compte',
                'package_name' => 'Nom du package',
                'package_price' => 'Prix',
                'package_percent_discount' => 'Remise',
                'package_number_of_listings' => 'Nombre d\'annonces dans le package',
            ],
        ],
        'free-credit-claimed' => [
            'title' => 'Crédit gratuit réclamé',
            'description' => 'Envoyer une notification à l\'admin lorsque du crédit gratuit est réclamé',
            'subject' => '{{ account_name }} a réclamé du crédit gratuit sur {{ site_title }}',
            'can_off' => true,
            'enabled' => false,
            'variables' => [
                'account_name' => 'Nom du compte',
                'account_email' => 'E-mail du compte',
            ],
        ],
        'payment-received' => [
            'title' => 'Paiement reçu',
            'description' => 'Envoyer une notification à l\'admin lorsqu\'une personne achète des crédits',
            'subject' => 'Paiement reçu de {{ account_name }} sur {{ site_title }}',
            'can_off' => true,
            'enabled' => false,
            'variables' => [
                'account_name' => 'Nom du compte',
                'account_email' => 'E-mail du compte',
                'package_name' => 'Nom du package',
                'package_price' => 'Prix',
                'package_percent_discount' => 'Remise',
                'package_number_of_listings' => 'Nombre d\'annonces dans le package',
            ],
        ],
    ],
];
