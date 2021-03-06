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
            '/developer/additional' => [[['_route' => 'additional_index', '_controller' => 'App\\Controller\\AdditionalController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/additional/new' => [[['_route' => 'additional_new', '_controller' => 'App\\Controller\\AdditionalController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/developer/technology' => [[['_route' => 'dev_tech_index', '_controller' => 'App\\Controller\\DevTechController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/technology/new' => [[['_route' => 'dev_tech_new', '_controller' => 'App\\Controller\\DevTechController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/developer/personal' => [[['_route' => 'developer_index', '_controller' => 'App\\Controller\\DeveloperController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/personal/new' => [[['_route' => 'developer_new', '_controller' => 'App\\Controller\\DeveloperController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/developer/experience' => [[['_route' => 'experience_index', '_controller' => 'App\\Controller\\ExperienceController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/experience/new' => [[['_route' => 'experience_new', '_controller' => 'App\\Controller\\ExperienceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
            '/type' => [[['_route' => 'home_type', '_controller' => 'App\\Controller\\HomeController::type'], null, null, null, false, false, null]],
            '/issue' => [[['_route' => 'issue', '_controller' => 'App\\Controller\\IssueController::index'], null, null, null, false, false, null]],
            '/issue/result' => [[['_route' => 'issue_result', '_controller' => 'App\\Controller\\IssueController::issueResult'], null, null, null, false, false, null]],
            '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
            '/search' => [[['_route' => 'search', '_controller' => 'App\\Controller\\SearchController::index'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, ['GET' => 0], null, false, false, null]],
            '/technology' => [[['_route' => 'technology_index', '_controller' => 'App\\Controller\\TechnologyController::index'], null, ['GET' => 0], null, true, false, null]],
            '/technology/new' => [[['_route' => 'technology_new', '_controller' => 'App\\Controller\\TechnologyController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
            '/developer/training' => [[['_route' => 'training_index', '_controller' => 'App\\Controller\\TrainingController::index'], null, ['GET' => 0], null, true, false, null]],
            '/developer/training/new' => [[['_route' => 'training_new', '_controller' => 'App\\Controller\\TrainingController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
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
                    .'|/developer/(?'
                        .'|additional/([^/]++)(?'
                            .'|(*:205)'
                            .'|/edit(*:218)'
                            .'|(*:226)'
                        .')'
                        .'|t(?'
                            .'|echnology/([^/]++)(?'
                                .'|(*:260)'
                                .'|/edit(*:273)'
                                .'|(*:281)'
                            .')'
                            .'|raining/([^/]++)(?'
                                .'|(*:309)'
                                .'|/edit(*:322)'
                                .'|(*:330)'
                            .')'
                        .')'
                        .'|personal/(?'
                            .'|([^/]++)(*:360)'
                            .'|cv/([^/]++)(*:379)'
                            .'|([^/]++)(?'
                                .'|/edit(*:403)'
                                .'|(*:411)'
                            .')'
                        .')'
                        .'|experience/([^/]++)(?'
                            .'|(*:443)'
                            .'|/edit(*:456)'
                            .'|(*:464)'
                        .')'
                    .')'
                    .'|/technology/([^/]++)(?'
                        .'|(*:497)'
                        .'|/edit(*:510)'
                        .'|(*:518)'
                    .')'
                    .'|/user/([^/]++)(?'
                        .'|(*:544)'
                        .'|/edit(*:557)'
                        .'|(*:565)'
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
            205 => [[['_route' => 'additional_show', '_controller' => 'App\\Controller\\AdditionalController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            218 => [[['_route' => 'additional_edit', '_controller' => 'App\\Controller\\AdditionalController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            226 => [[['_route' => 'additional_delete', '_controller' => 'App\\Controller\\AdditionalController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            260 => [[['_route' => 'dev_tech_show', '_controller' => 'App\\Controller\\DevTechController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            273 => [[['_route' => 'dev_tech_edit', '_controller' => 'App\\Controller\\DevTechController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            281 => [[['_route' => 'dev_tech_delete', '_controller' => 'App\\Controller\\DevTechController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            309 => [[['_route' => 'training_show', '_controller' => 'App\\Controller\\TrainingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            322 => [[['_route' => 'training_edit', '_controller' => 'App\\Controller\\TrainingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            330 => [[['_route' => 'training_delete', '_controller' => 'App\\Controller\\TrainingController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            360 => [[['_route' => 'developer_show', '_controller' => 'App\\Controller\\DeveloperController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            379 => [[['_route' => 'developer_cv', '_controller' => 'App\\Controller\\DeveloperController::cv'], ['id'], ['GET' => 0], null, false, true, null]],
            403 => [[['_route' => 'developer_edit', '_controller' => 'App\\Controller\\DeveloperController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            411 => [[['_route' => 'developer_delete', '_controller' => 'App\\Controller\\DeveloperController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            443 => [[['_route' => 'experience_show', '_controller' => 'App\\Controller\\ExperienceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            456 => [[['_route' => 'experience_edit', '_controller' => 'App\\Controller\\ExperienceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            464 => [[['_route' => 'experience_delete', '_controller' => 'App\\Controller\\ExperienceController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            497 => [[['_route' => 'technology_show', '_controller' => 'App\\Controller\\TechnologyController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            510 => [[['_route' => 'technology_edit', '_controller' => 'App\\Controller\\TechnologyController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            518 => [[['_route' => 'technology_delete', '_controller' => 'App\\Controller\\TechnologyController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
            544 => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
            557 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
            565 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        ];
    }
}
