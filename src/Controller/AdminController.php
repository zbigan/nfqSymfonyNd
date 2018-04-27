<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/review", name="review")
     */
    public function review(UserInterface $user = null)
    {
        if(!$user) {
            throw new AccessDeniedException('Your user is not authorized');

        }

        if(in_array('ROLE_MENTORIUS', $user->getRoles())) {
            return $this->render('admin/review.html.twig');
        }
        if(in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->render('admin/plan.html.twig');
        }
        throw new AccessDeniedException('User not authorized by known roles');
    }
}
