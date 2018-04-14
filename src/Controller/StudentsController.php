<?php

namespace App\Controller;

use Symfony\Component\Finder\Iterator\FilenameFilterIterator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentsController extends Controller
{
    /**
     * @Route("/students", name="students")
     */
    public function index()
    {

        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
            'data' => $this->getData()
        ]);
    }

    public function getData()
    {
        $string = file_get_contents(__DIR__."/data.json");
        return $jsonObj = json_decode($string, true);

    }
}
