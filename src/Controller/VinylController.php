<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homePage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise','artist' => 'Coolio'],
            ['song' => 'Waterfall','artist' => 'TCL'],
            ['song' => 'Creep','artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose','artist' => 'Seal'],
            ['song' => 'On Bended Knee','artist' => 'Boyz II Men'],
        ];

        return $this->render('vinyl/homepage.html.twig',
            [
                'title' => 'Home',
                'tracks' => $tracks
            ]
        );
    }

    #[Route('/search/{slug}')]
    public function search(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }
        return new Response($title);
    }
}