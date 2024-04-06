<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <div class="sidebar">
            <div class="sidebar-content">
                <ul class="page-sidebar-menu page-header-fixed " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200">
                    <li class="retrouveIndexDashbordMenu nav-item  active " id="cms-core-dashboard">
                        <a href="{{ url('/admin')}}" class="nav-link nav-toggle">
                            <i class="fa fa-home"></i>
                            <span class="title">
                                Tableau de bord
                            </span>
                        </a>
                    </li>
                    <li class="retrouveIndexDashbordMenu nav-item " id="cms-core-page">
                        <a href=" {{ url('/admin/pages')}}" class="nav-link nav-toggle">
                            <i class="fa fa-book"></i>
                            <span class="title">
                                Pages
                            </span>
                        </a>
                    </li>
                    <li class="retrouveIndexDashbordMenu nav-item " id="cms-plugins-blog">
                        <a href="{{ url('/admin/blog/posts')}}" class="nav-link nav-toggle">
                            <i class="fa fa-edit"></i>
                            <span class="title">
                                Blog
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-plugins-blog-post">
                                <a href="{{ url('/admin/blog/posts')}}" class="nav-link">
                                    <i class=""></i>
                                    Articles

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-blog-categories">
                                <a href="{{ url('/admin/blog/categories')}}" class="nav-link">
                                    <i class=""></i>
                                    Catégories

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-blog-tags">
                                <a href="{{ url('/admin/blog/tags')}}" class="nav-link">
                                    <i class=""></i>
                                    Tags

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="retrouveIndexDashbordMenu nav-item " id="cms-plugins-career">
                        <a href="{{ url('/admin/careers')}}" class="nav-link nav-toggle">
                            <i class="far fa-newspaper"></i>
                            <span class="title">
                                Carrières
                            </span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-real-estate">
                        <a href="" class="nav-link nav-toggle">
                            <i class="fa fa-bed"></i>
                            <span class="title">
                                Immobilier
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-plugins-property">
                                <a href="{{ url('/admin/real-estate/properties')}}" class="nav-link">
                                    <i class=""></i>
                                    Propriétés

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-project">
                                <a href="{{ url('/admin/real-estate/projects')}}" class="nav-link">
                                    <i class=""></i>
                                    Projets

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-re-feature">
                                <a href="{{ url('/admin/real-estate/property-features')}}" class="nav-link">
                                    <i class=""></i>
                                    Fonctionnalités

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-facility">
                                <a href="{{ url('/admin/real-estate/facilities')}}" class="nav-link">
                                    <i class=""></i>
                                    Équipements

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-investor">
                                <a href="{{ url('/admin/real-estate/investors')}}" class="nav-link">
                                    <i class=""></i>
                                    Investisseurs

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-category">
                                <a href="{{ url('/admin/real-estate/categories')}}" class="nav-link">
                                    <i class=""></i>
                                    Catégories

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-review">
                                <a href="{{ url('/admin/real-estate/reviews')}}" class="nav-link">
                                    <i class=""></i>
                                    Avis

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-invoice">
                                <a href="{{ url('/admin/real-estate/invoices')}}" class="nav-link">
                                    <i class=""></i>
                                    Factures

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-invoice-template">
                                <a href="{{ url('/admin/real-estate/invoice-template')}}" class="nav-link">
                                    <i class=""></i>
                                    Modèle de facture

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-custom-fields">
                                <a href="{{ url('/admin/real-estate/custom-fields')}}" class="nav-link">
                                    <i class=""></i>
                                    Champs personnalisés

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-real-estate-settings">
                                <a href="{{ url('/admin/real-estate/settings')}}" class="nav-link">
                                    <i class=""></i>
                                    Paramètres

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item " id="cms-plugins-consult">
                        <a href="{{ url('/admin/real-estate/consults')}}" class="nav-link nav-toggle">
                            <i class="fas fa-headset"></i>
                            <span class="title">
                                Consultations
                                <span class="badge badge-success menu-item-count unread-consults" style="display: none;"></span></span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-real-estate-coupons">
                        <a href="{{ url('/admin/real-estate/coupons')}}" class="nav-link nav-toggle">
                            <i class="fas fa-percent"></i>
                            <span class="title">
                                Coupons
                            </span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-real-estate-account">
                        <a href="{{ url('/admin/real-estate/accounts')}}" class="nav-link nav-toggle">
                            <i class="fa fa-users"></i>
                            <span class="title">
                                Comptes
                            </span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-package">
                        <a href="{{ url('/admin/real-estate/packages')}}" class="nav-link nav-toggle">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="title">
                                Forfaits
                            </span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-contact">
                        <a href="{{ url('/admin/contacts')}}" class="nav-link nav-toggle">
                            <i class="far fa-envelope"></i>
                            <span class="title">
                                Contact
                                <span class="badge badge-success menu-item-count unread-contacts" style="display: none;"></span></span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-plugins-payments">
                        <a href="{{ url('/admin/payments/transactions')}}" class="nav-link nav-toggle">
                            <i class="fas fa-credit-card"></i>
                            <span class="title">
                                Paiements
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-plugins-payments-all">
                                <a href="{{ url('/admin/payments/transactions')}}" class="nav-link">
                                    <i class=""></i>
                                    Transactions

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-payment-methods">
                                <a href="{{ url('/admin/payments/methods')}}" class="nav-link">
                                    <i class=""></i>
                                    Méthodes de paiement

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item " id="cms-plugins-location">
                        <a href="" class="nav-link nav-toggle">
                            <i class="fas fa-globe"></i>
                            <span class="title">
                                Emplacements
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-plugins-country">
                                <a href="{{ url('country.index')}}" class="nav-link">
                                    <i class="fas fa-globe"></i>
                                    Pays

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-state">
                                <a href="{{ route('state.index')}}" class="nav-link">
                                    <i class="fas fa-globe"></i>
                                    États

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-city">
                                <a href="{{ route('city.index')}}" class="nav-link">
                                    <i class="fas fa-globe"></i>
                                    Villes

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-locality">
                                <a href="{{ route('localities.index')}}" class="nav-link">
                                    <i class="fas fa-globe"></i>
                                    Quartier

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-location-bulk-import">
                                <a href="{{ url('/admin/locations/bulk-import')}}" class="nav-link">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Importation des lieux

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-location-export">
                                <a href="{{ url('/admin/locations/export')}}" class="nav-link">
                                    <i class="fas fa-cloud-download-alt"></i>
                                    Exporter l&#039;emplacement

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item " id="cms-core-media">
                        <a href="{{ url('/admin/media')}}" class="nav-link nav-toggle">
                            <i class="far fa-images"></i>
                            <span class="title">
                                Médias
                            </span>
                        </a>
                    </li>
                    <li class="nav-item " id="cms-core-appearance">
                        <a href="#" class="nav-link nav-toggle">
                            <i class="fa fa-paint-brush"></i>
                            <span class="title">
                                Apparence
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-core-theme">
                                <a href="{{ url('/admin/theme/all')}}" class="nav-link">
                                    <i class=""></i>
                                    Thèmes

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-menu">
                                <a href="{{ url('/admin/menus')}}" class="nav-link">
                                    <i class=""></i>
                                    packages/menu::menu.name
                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-widget">
                                <a href="{{ url('/admin/widgets')}}" class="nav-link">
                                    <i class=""></i>
                                    Widgets

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-theme-option">
                                <a href="{{ url('/admin/theme/options')}}" class="nav-link">
                                    <i class=""></i>
                                    Options du thème

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-appearance-custom-css">
                                <a href="{{ url('/admin/theme/custom-css')}}" class="nav-link">
                                    <i class=""></i>
                                    CSS personnalisé

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-appearance-custom-js">
                                <a href="{{ url('/admin/theme/custom-js')}}" class="nav-link">
                                    <i class=""></i>
                                    JS personnalisé

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-appearance-custom-html">
                                <a href="{{ url('/admin/theme/custom-html')}}" class="nav-link">
                                    <i class=""></i>
                                    HTML personnalisé

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="retrouveIndexDashbordMenu nav-item " id="cms-core-plugins">
                        <a href="{{ url('/admin/plugins')}}" class="nav-link nav-toggle">
                            <i class="fa fa-plug"></i>
                            <span class="title">
                                Plugins
                            </span>
                        </a>
                    </li>
                    <li class="retrouveIndexDashbordMenu nav-item " id="cms-plugin-translation">
                        <a href="{{ url('/admin/translations/admin')}}" class="nav-link nav-toggle">
                            <i class="fas fa-language"></i>
                            <span class="title">
                                Traductions
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-plugin-translation-locale">
                                <a href="{{ url('/admin/translations/locales')}}" class="nav-link">
                                    <i class=""></i>
                                    Paramètres régionaux

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugin-translation-theme-translations">
                                <a href="{{ url('/admin/translations/theme')}}" class="nav-link">
                                    <i class=""></i>
                                    Traductions du thème

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugin-translation-admin-translations">
                                <a href="{{ url('/admin/translations/admin')}}" class="nav-link">
                                    <i class=""></i>
                                    Autres traductions

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item " id="cms-core-settings">
                        <a href="{{ url('/admin/settings/general')}}" class="nav-link nav-toggle">
                            <i class="fa fa-cogs"></i>
                            <span class="title">
                                Paramètres
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-core-settings-general">
                                <a href="{{ url('/admin/settings/general')}}" class="nav-link">
                                    <i class=""></i>
                                    Général

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-settings-email">
                                <a href="{{ url('/admin/settings/email')}}" class="nav-link">
                                    <i class=""></i>
                                    Email

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-language">
                                <a href="{{ url('/admin/settings/languages')}}" class="nav-link">
                                    <i class=""></i>
                                    Langues

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-settings-media">
                                <a href="{{ url('/admin/settings/media')}}" class="nav-link">
                                    <i class=""></i>
                                    Média

                                </a>
                            </li>
                            <li class="nav-item " id="cms-packages-slug-permalink">
                                <a href="{{ url('/admin/settings/permalink')}}" class="nav-link">
                                    <i class=""></i>
                                    Paramètres des permaliens

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugins-social-login">
                                <a href="{{ url('/admin/social-login/settings')}}" class="nav-link">
                                    <i class=""></i>
                                    plugins/social-login::social-login.menu

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-settings-cronjob">
                                <a href="{{ url('/admin/settings/cronjob')}}" class="nav-link">
                                    <i class=""></i>
                                    Cronjob

                                </a>
                            </li>
                            <li class="nav-item " id="cms-packages-api">
                                <a href="{{ url('/admin/settings/api')}}" class="nav-link">
                                    <i class=""></i>
                                    Paramètres de l&#039;API

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item " id="cms-core-platform-administration">
                        <a href="" class="nav-link nav-toggle">
                            <i class="fa fa-user-shield"></i>
                            <span class="title">
                                Administration de la plateforme
                            </span>
                            <span class="arrow "></span> </a>
                        <ul class="sub-menu  hidden-ul ">
                            <li class="nav-item " id="cms-core-role-permission">
                                <a href="{{ url('/admin/system/roles')}}" class="nav-link">
                                    <i class=""></i>
                                    core/acl::permissions.role_permission

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-user">
                                <a href="{{ url('/admin/system/users')}}" class="nav-link">
                                    <i class=""></i>
                                    core/acl::users.users

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-system-information">
                                <a href="{{ url('/admin/system/info')}}" class="nav-link">
                                    <i class=""></i>
                                    Informations système

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-system-cache">
                                <a href="{{ url('/admin/system/cache')}}" class="nav-link">
                                    <i class=""></i>
                                    Gestion du cache

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugin-audit-log">
                                <a href="{{ url('/admin/audit-logs')}}" class="nav-link">
                                    <i class=""></i>
                                    Journaux d&#039;activités

                                </a>
                            </li>
                            <li class="nav-item " id="cms-plugin-backup">
                                <a href="{{ url('/admin/system/backups')}}" class="nav-link">
                                    <i class=""></i>
                                    Sauvegardes

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-system-cleanup">
                                <a href="{{ url('/admin/system/cleanup')}}" class="nav-link">
                                    <i class=""></i>
                                    Nettoyer le système

                                </a>
                            </li>
                            <li class="nav-item " id="cms-core-system-updater">
                                <a href="{{ url('/admin/system/updater')}}" class="nav-link">
                                    <i class=""></i>
                                    Mise à jour du système

                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>