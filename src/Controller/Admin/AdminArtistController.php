<?php

namespace App\Controller\Admin;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminArtistController extends AbstractController
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
     * @Route("/admin/artistes", name="admin.artist.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        $artists = $this->repositoriy->findAll();
        return $this->render('admin/artist/index.html.twig', [
            'artists' => $artists
        ]);
    }

    /**
     * @Route("/admin//artistes/new", name="admin.artist.new" )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(): Response
    {
        return $this->render('admin/artist/edit.html.twig', [
        ]);
    }

    /**
     * @Route("/admin//artistes/{id}", name="admin.artist.show" )
     * @param Artist $artist
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Artist $artist): Response
    {
        return $this->render('admin/artist/show.html.twig', [
            'artist' => $artist
        ]);
    }

    /**
     * @Route("/admin//artistes/{id}/edite", name="admin.artist.edit" )
     * @param Artist $artist
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Artist $artist): Response
    {
        return $this->render('admin/artist/edite.html.twig', [
            'artist' => $artist
        ]);
    }

}