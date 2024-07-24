<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    #[Route('/films', name: 'app_movie')]
    public function index(MovieRepository $movieRepository): Response
    {
        $movies =  $movieRepository->findBy([], ['id' => 'DESC']);

        //dump($movies);

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
