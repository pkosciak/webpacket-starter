<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Abstracts\BaseModel;

class ArticlesModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Exception
     */
    public function getArticles(int $page = 1, string $query = ''): array
    {
        $args = [
            'post_type'     => ['post'],
            'numberposts'   => 10
        ];

        $args['paged'] = esc_attr($page);

        if($query !== ''){
            $args['s'] = esc_attr($query);
        }

        $posts = get_posts($args);
        $articles = [];
        foreach($posts as $post){
            $date = new \DateTime($post->post_date_gmt, new \DateTimeZone('Europe/Warsaw'));
            $articles[] = [
                'id'            => $post->ID,
                'title'         => $post->post_title,
                'date'          => $date->format('Y-m-d\\TH:i:sO'),
                'dateformatted' => get_the_date('d F, Y',$post->ID),
                'excerpt'       => get_the_excerpt($post->ID),
                'url'           => get_permalink($post->ID),
                'thumbnail'     => get_the_post_thumbnail_url($post->ID)
            ];
        }
        return $articles;
    }
}
