<?php

declare(strict_types=1);

namespace App\Api\Ajax;

use App\Core\Abstracts\BaseAjaxApi;
use App\Core\Route;
use App\Enums\Core\ApiState;
use App\Models\ArticlesModel;

class SearchApi extends BaseAjaxApi
{
    public array $dependencies = ['ArticlesModel'];

    private ArticlesModel $articlesModel;

    public function __construct()
    {
        parent::__construct();
        $this->articlesModel = new ArticlesModel();
    }

    #[Route(ApiState::BOTH)] public function getArticles(array $request): array
    {
        $page = isset($request['page']) ? (int) $request['page'] : 1;
        $query = $request['query'] ?? '';
        return $this->articlesModel->getArticles($page, $query);
    }

    #[Route(ApiState::LOGGED_IN)] public function getSthOnlyForLoggedIn(): string
    {
        return 'sth only for logged in';
    }

    #[Route(ApiState::LOGGED_OUT)] public function getSthOnlyForLoggedOut(): string
    {
        return 'sth only for logged out';
    }
}