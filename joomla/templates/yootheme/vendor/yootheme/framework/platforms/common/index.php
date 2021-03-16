<?php

use YOOtheme\ImageProvider;
use YOOtheme\Translation\Translator;
use YOOtheme\Util\Memory;

return [

    'name' => 'yootheme/common',

    'main' => function ($app) {

        $app['user'] = function ($app) {
            return $app['users']->get();
        };

        $app['image'] = function ($app) {
            return new ImageProvider($app['url'], $app['path.cache'], ['route' => 'theme/image', 'secret' => $app['secret']]);
        };

        $app['translator'] = function ($app) {

            $translator = new Translator($app['locator']);

            if (isset($app['locale'])) {
                $translator->setLocale($app['locale']);
            }

            return $translator;
        };

    },

    'routes' => function ($route, $app) {

        $route->get(['theme/image', '@image'], function ($src, $hash, $response) use ($app) {

            if ($app['image']->getHash($src) !== $hash) {
                $app->abort(401);
            }

            Memory::raise();

            list($file, $params) = json_decode(base64_decode($src));

            if (!$image = $app['image']->create($file)) {
                $app->abort(404);
            }

            if ($params) {
                $image = $image->apply($params);
            }

            return $response->withFile($image->save($image->getFilename($app['path.cache'])));

        }, ['allowed' => true]);

    },

    'events' => [

        'init' => function ($app) {

            $app['kernel']->addMiddleware(function ($request, $response, $next) use ($app) {

                $access = (array) $request->getAttribute('access');

                foreach ($access as $permission) {
                    if (!$app['user']->hasPermission($permission)) {
                        $app->abort(403, 'Insufficient User Rights.');
                    }
                }

                return $next($request, $response);
            });

            $app['kernel']->addMiddleware(function ($request, $response, $next) use ($app) {

                $csrf = $request->getAttribute('csrf', $request->isMethod('POST'));

                if ($csrf && !$app['csrf']->validate($request->getHeaderLine('X-XSRF-Token'))) {
                    $app->abort(401, 'Invalid CSRF token.');
                }

                return $next($request, $response);
            });

        }

    ]

];
