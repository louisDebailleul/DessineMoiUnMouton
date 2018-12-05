<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ArtistController extends AbstractController
{

    /**
     * @var ArtistRepository
     */
    private $repositoriy;

    public function __construct( ArtistRepository $repository)
    {
        $this->repositoriy = $repository;
    }

    /**
     * @Route("/artistes", name="artist.index")
     * @return Response
     */
    public function index(): Response
    {
        $artists = $this->repositoriy->findAll();
        return $this->render('artist/index.html.twig', [
            'artists' => $artists
        ]);
    }

    /**
     * @Route("/artistes/{id}", name="artist.show" )
     * @param Artist $artist
     * @return Response
     */
    public function show(Artist $artist): Response
    {

        return $this->render('artist/show.html.twig', [
            'artist' => $artist
        ]);
    }
}
