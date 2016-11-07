<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // nelmio_api_doc_index
        if (0 === strpos($pathinfo, '/docs') && preg_match('#^/docs(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
        }
        not_nelmio_api_doc_index:

        if (0 === strpos($pathinfo, '/oauth/v2')) {
            // fos_oauth_server_token
            if ($pathinfo === '/oauth/v2/token') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_oauth_server_token;
                }

                return array (  '_controller' => 'fos_oauth_server.controller.token:tokenAction',  '_route' => 'fos_oauth_server_token',);
            }
            not_fos_oauth_server_token:

            // fos_oauth_server_authorize
            if ($pathinfo === '/oauth/v2/auth') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_oauth_server_authorize;
                }

                return array (  '_controller' => 'FOS\\OAuthServerBundle\\Controller\\AuthorizeController::authorizeAction',  '_route' => 'fos_oauth_server_authorize',);
            }
            not_fos_oauth_server_authorize:

        }

        if (0 === strpos($pathinfo, '/log-requests')) {
            // api_get_log_requests
            if ($pathinfo === '/log-requests' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_get_log_requests;
                }

                return array (  '_controller' => 'CoreBundle\\Controller\\LogRequestController::cgetAction',  '_format' => 'json',  '_route' => 'api_get_log_requests',);
            }
            not_api_get_log_requests:

            // api_get_log_request
            if (preg_match('#^/log\\-requests/(?P<log_request_id>[^/]++)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_get_log_request;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_get_log_request')), array (  '_controller' => 'CoreBundle\\Controller\\LogRequestController::getAction',  '_format' => 'json',));
            }
            not_api_get_log_request:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // api_get_users
            if ($pathinfo === '/users' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_get_users;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\UserController::cgetAction',  '_format' => 'json',  '_route' => 'api_get_users',);
            }
            not_api_get_users:

            // api_get_user
            if (preg_match('#^/users/(?P<user_id>\\d+)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_get_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_get_user')), array (  '_controller' => 'UserBundle\\Controller\\UserController::getAction',  '_format' => 'json',));
            }
            not_api_get_user:

            // api_post_user
            if ($pathinfo === '/users' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_post_user;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\UserController::postAction',  '_format' => 'json',  '_route' => 'api_post_user',);
            }
            not_api_post_user:

            // api_patch_user
            if (preg_match('#^/users/(?P<user_id>\\d+)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'PATCH') {
                    $allow[] = 'PATCH';
                    goto not_api_patch_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_patch_user')), array (  '_controller' => 'UserBundle\\Controller\\UserController::patchAction',  '_format' => 'json',));
            }
            not_api_patch_user:

            // api_delete_user
            if (preg_match('#^/users/(?P<user_id>\\d+)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_api_delete_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_delete_user')), array (  '_controller' => 'UserBundle\\Controller\\UserController::deleteAction',  '_format' => 'json',));
            }
            not_api_delete_user:

            // api_confirm_user_email
            if (0 === strpos($pathinfo, '/users/confirm') && preg_match('#^/users/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_confirm_user_email;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_confirm_user_email')), array (  '_controller' => 'UserBundle\\Controller\\UserController::confirmEmailAction',  '_format' => 'json',));
            }
            not_api_confirm_user_email:

            // api_forget_user_password
            if ($pathinfo === '/users/forget-password' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_forget_user_password;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\UserController::forgetPasswordAction',  '_format' => 'json',  '_route' => 'api_forget_user_password',);
            }
            not_api_forget_user_password:

            // api_reset_user_password
            if (0 === strpos($pathinfo, '/users/reset-password') && preg_match('#^/users/reset\\-password/(?P<token>[^/]++)$#s', $pathinfo, $matches) && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_reset_user_password;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_reset_user_password')), array (  '_controller' => 'UserBundle\\Controller\\UserController::resetPasswordAction',  '_format' => 'json',));
            }
            not_api_reset_user_password:

        }

        if (0 === strpos($pathinfo, '/me')) {
            // api_get_me
            if ($pathinfo === '/me' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_get_me;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\MeController::getAction',  '_format' => 'json',  '_route' => 'api_get_me',);
            }
            not_api_get_me:

            // api_patch_me
            if ($pathinfo === '/me' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'PATCH') {
                    $allow[] = 'PATCH';
                    goto not_api_patch_me;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\MeController::patchAction',  '_format' => 'json',  '_route' => 'api_patch_me',);
            }
            not_api_patch_me:

            // api_delete_me
            if ($pathinfo === '/me' && in_array($request->attributes->get("version"), array(0 => "1.0"))) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_api_delete_me;
                }

                return array (  '_controller' => 'UserBundle\\Controller\\MeController::deleteAction',  '_format' => 'json',  '_route' => 'api_delete_me',);
            }
            not_api_delete_me:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
