<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
        '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
        '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
        '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
        '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
        '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
        '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
        '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        'additional_index' => [[], ['_controller' => 'App\\Controller\\AdditionalController::index'], [], [['text', '/developer/additional/']], [], []],
        'additional_new' => [[], ['_controller' => 'App\\Controller\\AdditionalController::new'], [], [['text', '/developer/additional/new']], [], []],
        'additional_show' => [['id'], ['_controller' => 'App\\Controller\\AdditionalController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/additional']], [], []],
        'additional_edit' => [['id'], ['_controller' => 'App\\Controller\\AdditionalController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/developer/additional']], [], []],
        'additional_delete' => [['id'], ['_controller' => 'App\\Controller\\AdditionalController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/additional']], [], []],
        'dev_tech_index' => [[], ['_controller' => 'App\\Controller\\DevTechController::index'], [], [['text', '/developer/technology/']], [], []],
        'dev_tech_new' => [[], ['_controller' => 'App\\Controller\\DevTechController::new'], [], [['text', '/developer/technology/new']], [], []],
        'dev_tech_show' => [['id'], ['_controller' => 'App\\Controller\\DevTechController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/technology']], [], []],
        'dev_tech_edit' => [['id'], ['_controller' => 'App\\Controller\\DevTechController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/developer/technology']], [], []],
        'dev_tech_delete' => [['id'], ['_controller' => 'App\\Controller\\DevTechController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/technology']], [], []],
        'developer_index' => [[], ['_controller' => 'App\\Controller\\DeveloperController::index'], [], [['text', '/developer/personal/']], [], []],
        'developer_new' => [[], ['_controller' => 'App\\Controller\\DeveloperController::new'], [], [['text', '/developer/personal/new']], [], []],
        'developer_show' => [['id'], ['_controller' => 'App\\Controller\\DeveloperController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/personal']], [], []],
        'developer_cv' => [['id'], ['_controller' => 'App\\Controller\\DeveloperController::cv'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/personal/cv']], [], []],
        'developer_edit' => [['id'], ['_controller' => 'App\\Controller\\DeveloperController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/developer/personal']], [], []],
        'developer_delete' => [['id'], ['_controller' => 'App\\Controller\\DeveloperController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/personal']], [], []],
        'experience_index' => [[], ['_controller' => 'App\\Controller\\ExperienceController::index'], [], [['text', '/developer/experience/']], [], []],
        'experience_new' => [[], ['_controller' => 'App\\Controller\\ExperienceController::new'], [], [['text', '/developer/experience/new']], [], []],
        'experience_show' => [['id'], ['_controller' => 'App\\Controller\\ExperienceController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/experience']], [], []],
        'experience_edit' => [['id'], ['_controller' => 'App\\Controller\\ExperienceController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/developer/experience']], [], []],
        'experience_delete' => [['id'], ['_controller' => 'App\\Controller\\ExperienceController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/experience']], [], []],
        'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], []],
        'home_type' => [[], ['_controller' => 'App\\Controller\\HomeController::type'], [], [['text', '/type']], [], []],
        'issue' => [[], ['_controller' => 'App\\Controller\\IssueController::index'], [], [['text', '/issue']], [], []],
        'issue_result' => [[], ['_controller' => 'App\\Controller\\IssueController::issueResult'], [], [['text', '/issue/result']], [], []],
        'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], []],
        'search' => [[], ['_controller' => 'App\\Controller\\SearchController::index'], [], [['text', '/search']], [], []],
        'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
        'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
        'technology_index' => [[], ['_controller' => 'App\\Controller\\TechnologyController::index'], [], [['text', '/technology/']], [], []],
        'technology_new' => [[], ['_controller' => 'App\\Controller\\TechnologyController::new'], [], [['text', '/technology/new']], [], []],
        'technology_show' => [['id'], ['_controller' => 'App\\Controller\\TechnologyController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/technology']], [], []],
        'technology_edit' => [['id'], ['_controller' => 'App\\Controller\\TechnologyController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/technology']], [], []],
        'technology_delete' => [['id'], ['_controller' => 'App\\Controller\\TechnologyController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/technology']], [], []],
        'training_index' => [[], ['_controller' => 'App\\Controller\\TrainingController::index'], [], [['text', '/developer/training/']], [], []],
        'training_new' => [[], ['_controller' => 'App\\Controller\\TrainingController::new'], [], [['text', '/developer/training/new']], [], []],
        'training_show' => [['id'], ['_controller' => 'App\\Controller\\TrainingController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/training']], [], []],
        'training_edit' => [['id'], ['_controller' => 'App\\Controller\\TrainingController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/developer/training']], [], []],
        'training_delete' => [['id'], ['_controller' => 'App\\Controller\\TrainingController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/developer/training']], [], []],
        'user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user/']], [], []],
        'user_new' => [[], ['_controller' => 'App\\Controller\\UserController::new'], [], [['text', '/user/new']], [], []],
        'user_show' => [['id'], ['_controller' => 'App\\Controller\\UserController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
        'user_edit' => [['id'], ['_controller' => 'App\\Controller\\UserController::edit'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
        'user_delete' => [['id'], ['_controller' => 'App\\Controller\\UserController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
        'easyadmin' => [[], ['_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], [], [['text', '/admin/']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
