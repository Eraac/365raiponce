<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevDebugProjectContainerUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nelmio_api_doc_index' => array (  0 =>   array (    0 => 'view',  ),  1 =>   array (    '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',    'view' => 'default',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'view',    ),    1 =>     array (      0 => 'text',      1 => '/docs',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_oauth_server_token' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'fos_oauth_server.controller.token:tokenAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/oauth/v2/token',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_oauth_server_authorize' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\OAuthServerBundle\\Controller\\AuthorizeController::authorizeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/oauth/v2/auth',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_get_log_requests' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'CoreBundle\\Controller\\LogRequestController::cgetAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/log-requests',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_get_log_request' => array (  0 =>   array (    0 => 'log_request_id',  ),  1 =>   array (    '_controller' => 'CoreBundle\\Controller\\LogRequestController::getAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'log_request_id',    ),    1 =>     array (      0 => 'text',      1 => '/log-requests',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_get_users' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::cgetAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_get_user' => array (  0 =>   array (    0 => 'user_id',  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::getAction',    '_format' => 'json',  ),  2 =>   array (    'user_id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'user_id',    ),    1 =>     array (      0 => 'text',      1 => '/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_post_user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::postAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_patch_user' => array (  0 =>   array (    0 => 'user_id',  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::patchAction',    '_format' => 'json',  ),  2 =>   array (    'user_id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'user_id',    ),    1 =>     array (      0 => 'text',      1 => '/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_delete_user' => array (  0 =>   array (    0 => 'user_id',  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::deleteAction',    '_format' => 'json',  ),  2 =>   array (    'user_id' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'user_id',    ),    1 =>     array (      0 => 'text',      1 => '/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_confirm_user_email' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::confirmEmailAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/users/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_forget_user_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::forgetPasswordAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/users/forget-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_reset_user_password' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\UserController::resetPasswordAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/users/reset-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_get_me' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\MeController::getAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/me',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_patch_me' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\MeController::patchAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/me',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'api_delete_me' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'UserBundle\\Controller\\MeController::deleteAction',    '_format' => 'json',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/me',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
