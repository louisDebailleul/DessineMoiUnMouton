<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{


    /**
     * @var CategoryRepository
     *
     */
    private $repositoriy;

    public function __construct( CategoryRepository $repository)
    {
        $this->repositoriy = $repository;
    }

    /**
     * @Route("/categories", name="category.index")
     * @return Response
     */
    public function index()
    {
        $categories = $this->repositoriy->findAll();
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categories

        ]);
    }


}
