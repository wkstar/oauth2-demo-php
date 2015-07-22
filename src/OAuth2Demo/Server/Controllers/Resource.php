<?php

namespace OAuth2Demo\Server\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class Resource
{
    // Connects the routes in Silex
    public static function addRoutes($routing)
    {
        $routing->get('/resource', array(new self(), 'resource'))->bind('access');
    }

    /**
     * This is called by the client app once the client has obtained an access
     * token for the current user.  If the token is valid, the resource (in this
     * case, the "friends" of the current user) will be returned to the client
     */
    public function resource(Application $app)
    {
        // get the oauth server (configured in src/OAuth2Demo/Server/Server.php)
        $server = $app['oauth_server'];

        // get the oauth response (configured in src/OAuth2Demo/Server/Server.php)
        $response = $app['oauth_response'];

        $scope = $app['request']->query->get('scope');

        $valid = $server->verifyResourceRequest($app['request'], $response, $scope);
        $token = $server->getResourceController()->getToken();

        if (!$valid) {
            return $server->getResponse();
        } else {
            return new Response(json_encode(array(  'valid_key' => true,
                                                    'username'  => $token['user_id'],
                                                    'scope'     => $scope)));
        }
    }
}