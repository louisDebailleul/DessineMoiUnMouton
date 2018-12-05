<?php
/**
 * Created by PhpStorm.
 * User: condo
 * Date: 24/11/2018
 * Time: 01:32
 */

namespace App\Controller\Admin;

use App\Entity\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminHomeController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.home")
     */
    public function index()
    {
        dump($_SERVER['REQUEST_URI']);
        return $this->render('admin/adminHome.html.twig', [
        ]);
    }
}