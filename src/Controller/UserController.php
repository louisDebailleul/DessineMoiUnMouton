<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("inscription", name="user.registration")
     */
    public function inscription()
    {
        return $this->render('user/registration.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("mon-compte", name="user.my.compte")
     */
    public function compte()
    {
        $user = $this->getUser();
        return $this->render('user/myCompte.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("mon-portfolio", name="user.my.portfolio")
     */
    public function portfolio()
    {
        $user = $this->getUser();
        return $this->render('myPortfolio.html.twig', [
            'user' => $user
        ]);
    }
}
