<?php

namespace App\Controller;

use App\Entity\Artwork;
use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class ArtworkController extends AbstractController
{

    /**
     * @var ArtworkRepository
     */
private $repositoriy;

public function __construct(ArtworkRepository $repository)
{
    $this->repositoriy = $repository;
}

    /**
     * @Route("/oeuvres", name="artwork.index")
     * @return Response
     */
    public function index()
    {
        $artworks = $this->repositoriy->findAll();
        dump($artworks);
        return $this->render('artwork/index.html.twig', [
            'artworks' => $artworks
        ]);
    }


    /**
     * id de la Route plus le param artist donne donne la var artist = find(id)
     * @Route("/oeuvres/{id}", name="artwork.show" )
     * @param Artwork $artwork
     * @return Response
     */
    public function show(Artwork $artworl) :Response
    {
        return $this->render('artwork/show.html.twig', [
            'artwork' => $artworl
        ]);
    }
}
