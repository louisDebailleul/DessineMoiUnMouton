<?php
/**
 * Created by PhpStorm.
 * User: condo
 * Date: 24/11/2018
 * Time: 01:21
 */

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
{

    /**
     * @var CategoryRepository
     */
    private $repositoriy;

    public function __construct( CategoryRepository $repository)
    {
        $this->repositoriy = $repository;
    }

    /**
     * @Route("/admin/categories", name="admin.category.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        $categoires = $this->repositoriy->findAll();
        return $this->render('admin/category/index.html.twig', [
            'categoires' => $categoires
        ]);
    }

    /**
     * @Route("/admin/categories/{id}", name="admin.category.show" )
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Category $category): Response
    {
        return $this->render('admin/category/show.html.twig', [
            'category' => $category
        ]);
    }

    /**
     * @Route("/admin//categories/{id}/edite", name="admin.categories.edite" )
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edite(Category $category): Response
    {
        return $this->render('admin/artist/edite.html.twig', [
            'category' => $category
        ]);
    }

}