<?php

return [
    'menu' => 'Contact',
    'edit' => 'Voir le contact',
    'tables' => [
        'phone' => 'Téléphone',
        'email' => 'Email',
        'full_name' => 'Nom complet',
        'time' => 'Heure',
        'address' => 'Adresse',
        'subject' => 'Sujet',
        'content' => 'Contenu',
    ],
    'contact_information' => 'Informations de contact',
    'replies' => 'Réponses',
    'email' => [
        'header' => 'Email',
        'title' => 'Nouveau contact depuis votre site',
    ],
    'form' => [
        'name' => [
            'required' => 'Le nom est requis',
        ],
        'email' => [
            'required' => 'L\'adresse email est requise',
            'email' => 'L\'adresse email n\'est pas valide',
        ],
        'content' => [
            'required' => 'Le contenu est requis',
        ],
    ],
    'contact_sent_from' => 'Ces informations de contact ont été envoyées depuis',
    'sender' => 'Expéditeur',
    'sender_email' => 'Email',
    'sender_address' => 'Adresse',
    'sender_phone' => 'Téléphone',
    'message_content' => 'Contenu du message',
    'sent_from' => 'Email envoyé depuis',
    'form_name' => 'Nom',
    'form_email' => 'Email',
    'form_address' => 'Adresse',
    'form_subject' => 'Sujet',
    'form_phone' => 'Téléphone',
    'form_message' => 'Message',
    'required_field' => 'Le champ avec (<span style="color: red">*</span>) est requis.',
    'send_btn' => 'Envoyer le message',
    'new_msg_notice' => 'Vous avez <span class="bold">:count</span> nouveaux messages',
    'view_all' => 'Voir tout',
    'statuses' => [
        'read' => 'Lu',
        'unread' => 'Non lu',
    ],
    'phone' => 'Téléphone',
    'address' => 'Adresse',
    'message' => 'Message',
    'settings' => [
        'email' => [
            'title' => 'Contact',
            'description' => 'Configuration de l\'email de contact',
            'templates' => [
                'notice_title' => 'Envoyer un avis à l\'administrateur',
                'notice_description' => 'Modèle d\'email pour envoyer un avis à l\'administrateur lorsque le système reçoit un nouveau contact',
            ],
        ],
        'title' => 'Contact',
        'description' => 'Paramètres du plugin de contact',
        'blacklist_keywords' => 'Mots-clés de liste noire',
        'blacklist_keywords_placeholder' => 'mots-clés...',
        'blacklist_keywords_helper' => 'Mettre en liste noire les demandes de contact si elles contiennent ces mots-clés dans le champ de contenu (séparés par des virgules).',
        'blacklist_email_domains' => 'Domaines d\'email de liste noire',
        'blacklist_email_domains_placeholder' => 'domaine...',
        'blacklist_email_domains_helper' => 'Mettre en liste noire les demandes de contact si le domaine de l\'email est dans la liste noire (séparés par des virgules).',
        'enable_math_captcha' => 'Activer le captcha mathématique ?',
    ],
    'no_reply' => 'Aucune réponse pour le moment !',
    'reply' => 'Répondre',
    'send' => 'Envoyer',
    'shortcode_name' => 'Formulaire de contact',
    'shortcode_description' => 'Ajouter un formulaire de contact',
    'shortcode_content_description' => 'Ajouter le shortcode [contact-form][/contact-form] à l\'éditeur ?',
    'message_sent_success' => 'Message envoyé avec succès !',
];