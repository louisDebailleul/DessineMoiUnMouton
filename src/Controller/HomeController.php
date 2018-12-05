<?php

namespace App\Controller;

use App\Entity\ArtWork;
use App\Repository\ArtistRepository;
use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ArtworkRepository $repArtwork
     * @param ArtistRepository $repArtist
     */
    public function index(ArtworkRepository $repArtwork,ArtistRepository $repArtist)
    {

        $artworks = $repArtwork->findLast();
        $artists = $repArtist->findLast();
        return $this->render('home.html.twig', [
            'artworks' => $artworks,
            'artists' => $artists
            ]);
    }
}
