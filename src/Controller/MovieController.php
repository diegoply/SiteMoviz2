<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    #[Route('/films', name: 'app_movies')]
    public function index(MovieRepository $movieRepository): Response
    {
        $movies =  $movieRepository->findBy([], ['id' => 'DESC']);

        //dump($movies);

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/films/{id}', name: 'app_show_movie')]
    public function show(Movie $movie): Response
    {
    

        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }
}
