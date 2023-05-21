<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $movieRepository;
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', methods: ['GET'], name: 'movies')]
    public function index(): Response
    {
        //Sql
        //findAll() - SELECT * FROM movies;
        //find() - SELECT * from movies WHERE id = 1;
        //findBy() - SELECT * FROM movies ORDER BY id DESC;
        //findBy() - SELECT * from movies WHERE id = 1 AND title = 'The Dark Knight'
        //count() - SELECT COUNT(id) FROM movies
        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/{id}', methods: ['GET'], name: 'movie')]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);

        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }
}