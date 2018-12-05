<?php
/**
 * Created by PhpStorm.
 * User: condo
 * Date: 24/11/2018
 * Time: 01:13
 */

namespace App\Controller\Admin;


use App\Entity\Artwork;
use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminArtworkController extends AbstractController
{

    /**
     * @var ArtworkRepository
     */
    private $repositoriy;

    public function __construct( ArtworkRepository $repository)
    {
        $this->repositoriy = $repository;
    }

    /**
     * @Route("/admin/galeries", name="admin.artwork.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        dump($_SERVER['REQUEST_URI']);
        $artworks = $this->repositoriy->findAll();
        return $this->render('admin/artwork/index.html.twig', [
            'artworks' => $artworks
        ]);
    }

    /**
     * @Route("/admin//artistes/{id}", name="admin.artist.show" )
     * @param Artwork $artwork
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Artwork $artwork): Response
    {
        return $this->render('admin/artwork/show.html.twig', [
            'artwork' => $artwork
        ]);
    }

    /**
     * @Route("/admin//artistes/{id}/edite", name="admin.artist.edite" )
     * @param Artwork $artwork
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edite(Artwork $artwork): Response
    {
        return $this->render('admin/artist/edite.html.twig', [
            'artwork' => $artwork
        ]);
    }
}