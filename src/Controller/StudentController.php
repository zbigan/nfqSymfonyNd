<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class StudentController extends Controller
{
    /**
     * @Route("/student", name="student")
     */
    public function index(Request $request)
    {


        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
            'params' => $request->query->all()

        ]);

    }


}
