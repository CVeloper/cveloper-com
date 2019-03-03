<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
            '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
            '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
            '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
            '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
            '/dev/additional' => [[['_route' => 'additional_index', '_controller' => 'App\\Controller\\AdditionalController::index'], null, ['GET' => 0], null, true, false, null]],
            '/dev/additional/new' => [[['_route' => 'additional_new', '_controller' => 'App\\Controller\\AdditionalController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/prueba/symfony/primera' => [[['_route' => 'app_comoquieras_generarpagina', '_controller' => 'App\\Controller\\ComoQuieras::generarPagina'], null, null, null, false, false, null]],
            '/dev/technology' => [[['_route' => 'dev_tech_index', '_controller' => 'App\\Controller\\DevTechController::index'], null, ['GET' => 0], null, true, false, null]],
            '/dev/technology/new' => [[['_route' => 'dev_tech_new', '_controller' => 'App\\Controller\\DevTechController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/developer' => [[['_route' => 'developer_index', '_controller' => 'App\\Controller\\DeveloperController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/new' => [[['_route' => 'developer_new', '_controller' => 'App\\Controller\\DeveloperController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/dev/experience' => [[['_route' => 'experience_index', '_controller' => 'App\\Controller\\ExperienceController::index'], null, ['GET' => 0], null, true, false, null]],
            '/dev/experience/new' => [[['_route' => 'experience_new', '_controller' => 'App\\Controller\\ExperienceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/lucky/number' => [[['_route' => 'app_lucky_number', '_controller' => 'App\\Controller\\LuckyController::number'], null, null, null, false, false, null]],
            '/technology' => [[['_route' => 'technology_index', '_controller' => 'App\\Controller\\TechnologyController::index'], null, ['GET' => 0], null, true, false, null]],
            '/technology/new' => [[['_route' => 'technology_new', '_controller' => 'App\\Controller\\TechnologyController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/dev/training' => [[['_route' => 'training_index', '_controller' => 'App\\Controller\\TrainingController::index'], null, ['GET' => 0], null, true, false, null]],
            '/dev/training/new' => [[['_route' => 'training_new', '_controller' => 'App\\Controller\\TrainingController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/user' => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
            '/user/new' => [[['_route' => 'user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/admin' => [[['_route' => 'easyadmin', '_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], null, null, null, true, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                        .'|wdt/([^/]++)(*:57)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:102)'
                                .'|router(*:116)'
                                .'|exception(?'
                                    .'|(*:136)'
                                    .'|\\.css(*:149)'
                                .')'
                            .')'
                            .'|(*:159)'
                        .')'
                    .')'
                    .'|/dev(?'
                        .'|/(?'
                            .'|additional/([^/]++)(?'
                                .'|(*:202)'
                                .'|/edit(*:215)'
                                .'|(*:223)'
                            .')'
                            .'|t(?'
                                .'|echnology/([^/]++)(?'
                                    .'|(*:257)'
                                    .'|/edit(*:270)'
                                    .'|(*:278)'
                                .')'
                                .'|raining/([^/]++)(?'
                                    .'|(*:306)'
                                    .'|/edit(*:319)'
                                    .'|(*:327)'
                                .')'
                            .')'
                            .'|experience/([^/]++)(?'
                                .'|(*:359)'
                                .'|/edit(*:372)'
                                .'|(*:380)'
                            .')'
                        .')'
                        .'|eloper/([^/]++)(?'
                            .'|(*:408)'
                            .'|/edit(*:421)'
                            .'|(*:429)'
                        .')'
                    .')'
                    .'|/technology/([^/]++)(?'
                        .'|(*:462)'
                        .'|/edit(*:475)'
                        .'|(*:483)'
                    .')'
                    .'|/user/([^/]++)(?'
                        .'|(*:509)'
                        .'|/edit(*:522)'
                        .'|(*:530)'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
            202 => [[['_route' => 'additional_show', '_controller' => 'App\\Controller\\AdditionalController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            215 => [[['_route' => 'additional_edit', '_controller' => 'App\\Controller\\AdditionalController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            223 => [[['_route' => 'additional_delete', '_controller' => 'App\\Controller\\AdditionalController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            257 => [[['_route' => 'dev_tech_show', '_controller' => 'App\\Controller\\DevTechController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            270 => [[['_route' => 'dev_tech_edit', '_controller' => 'App\\Controller\\DevTechController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            278 => [[['_route' => 'dev_tech_delete', '_controller' => 'App\\Controller\\DevTechController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            306 => [[['_route' => 'training_show', '_controller' => 'App\\Controller\\TrainingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            319 => [[['_route' => 'training_edit', '_controller' => 'App\\Controller\\TrainingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            327 => [[['_route' => 'training_delete', '_controller' => 'App\\Controller\\TrainingController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            359 => [[['_route' => 'experience_show', '_controller' => 'App\\Controller\\ExperienceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            372 => [[['_route' => 'experience_edit', '_controller' => 'App\\Controller\\ExperienceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            380 => [[['_route' => 'experience_delete', '_controller' => 'App\\Controller\\ExperienceController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            408 => [[['_route' => 'developer_show', '_controller' => 'App\\Controller\\DeveloperController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            421 => [[['_route' => 'developer_edit', '_controller' => 'App\\Controller\\DeveloperController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            429 => [[['_route' => 'developer_delete', '_controller' => 'App\\Controller\\DeveloperController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            462 => [[['_route' => 'technology_show', '_controller' => 'App\\Controller\\TechnologyController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            475 => [[['_route' => 'technology_edit', '_controller' => 'App\\Controller\\TechnologyController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            483 => [[['_route' => 'technology_delete', '_controller' => 'App\\Controller\\TechnologyController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            509 => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            522 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            530 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        ];
    }
}
