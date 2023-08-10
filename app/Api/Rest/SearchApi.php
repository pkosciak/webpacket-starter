<?php

declare(strict_types=1);

namespace App\Api\Rest;

use App\Core\Abstracts\BaseRestApi;
use App\Core\Route;
use App\Enums\Core\ApiState;
use App\Models\ArticlesModel;

class SearchApi extends BaseRestApi
{
    public array $dependencies = ['ArticlesModel'];

    private ArticlesModel $articlesModel;

    public function __construct()
    {
        parent::__construct();
        $this->articlesModel = new ArticlesModel();
    }

    #[Route(ApiState::BOTH)] public function registerSearchRoutes(): void
    {
        register_rest_route(
            'webpacket/v1',
            'search',
            array(
                array(
                    'methods' => 'POST',
                    'args' => array(
                        'page' => array(
                            'type' => 'integer',
                            'required' => false,
                        ),
                        'query' => array(
                            'type' => 'string',
                            'required' => false,
                        ),
                    ),
                    'callback' => [$this, 'getArticles'],
//                    'permission_callback' => function($request) {
//                        return Permissions::validateToken($request);
//                    },
                ),
            )
        );
    }

    public function getArticles(\WP_REST_Request $request): array
    {
        $page = $request->get_param('page') ?? 1;
        $query = $request->get_param('query') ?? '';
        return $this->articlesModel->getArticles($page, $query);
    }

}