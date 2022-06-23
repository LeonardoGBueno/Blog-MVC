<?php

namespace App\Site\Controller;

use App\Core\Controller;

class PostController extends Controller
{

    /**
     * Carrega a página inicial do site
     *
     * @return void
     */
    public function index()
    {
    }

    public function ver(string $slug, string $privateArticle = 's')
    {

        $article = [
            'title' => 'Introdução ao Laravel',
            'subtitle' => 'Test Test Test',
            'article' => '<p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p><p>conteúdo em HTML, bla bla bla bla bla....</p> <p><a href="#">Clique aqui</a> para fazer alguma coisa aleatória.</p>'
        ];

        $posts = [
            [
                'title' => 'Aprenda a trocar de celular',
                'image' => null,
                'description' => 'Descrição do coonteúdo aqui Descrição do conteúdo aqui Descrição do conteúdo.',
                'link'  => 'como-trocar-de-celular'
            ],
            [
                'title' => 'Como mudar de canal na sua TV',
                'image' => 'https://images.samsung.com/is/image/samsung/assets/pt/support/tv-audio-video/smart-tv-q7f-mudar-o-numero-do-canal/smart-tv-q7f-mudar-o-numero-do-canal1.jpg?$ORIGIN_JPG$',
                'description' => 'Descrição do conteúdo aqui Descrição do conteúdo aqui Descrição do conteúdo.',
                'link'  => 'como-mudar-de-canal'
            ]
        ];

        $this->view('post.view', [
            'article' => $article,
            'posts' => $posts
        ]);
    }

    public function ultimas()
    {
    }

    public function buscar(string $terms = '')
    {

        $terms = filter_var(urldecode($terms), FILTER_SANITIZE_STRING);

        $terms = mb_substr($terms, 0, 25);

        $posts = [
            [
                'title' => 'Aprenda a trocar de celular',
                'image' => null,
                'description' => 'Descrição do coonteúdo aquiii Descrição do coonteúdo aquiii Descrição do coonteúdo.',
                'link'  => 'como-trocar-de-celular'
            ],
            [
                'title' => 'Aprenda a trocar de celular',
                'image' => null,
                'description' => 'Descrição do coonteúdo aquiii Descrição do coonteúdo aquiii Descrição do coonteúdo.',
                'link'  => 'como-trocar-de-celular'
            ],
            [
                'title' => 'Aprenda a trocar de celular',
                'image' => null,
                'description' => 'Descrição do coonteúdo aquiii Descrição do coonteúdo aquiii Descrição do coonteúdo.',
                'link'  => 'como-trocar-de-celular'
            ],
            [
                'title' => 'Como mudar de canal na sua TV',
                'image' => 'https://satellasoft.com/img/recomendacao/ebook-aprenda-a-planejar-seus-jogos.jpg',
                'description' => 'Descrição do coonteúdo aquiii Descrição do coonteúdo aquiii Descrição do coonteúdo.',
                'link'  => 'como-mudar-de-canal'
            ]
        ];

        $this->view('post.search', [
            'terms' => $terms,
            'posts' => $posts,
            'countPosts' => count($posts)
        ]);
    }
}
