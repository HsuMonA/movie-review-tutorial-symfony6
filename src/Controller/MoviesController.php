<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {   
        // findAll() - SELECT * FROM movies;
        // find() - SELECT * from movies WHERE id = 5;
        // findBy() - SELECT * from movies ORDER BY id DESC;
        // findOneBy() - SELECT * from movies WHERE id = 6 AND title = 'The Dark Knight' ORDER BY id DESC;
        // count() - SELECT COUNT() from movies WHERE id = 1;
        
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->getClassName();

        dd($movies);

        return $this->render('index.html.twig');
    }

}