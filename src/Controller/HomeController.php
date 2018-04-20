<?php

namespace App\Controller;

use http\Env\Response;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/validatename/{element}", name="validatePerson")
     * @Method({"POST"})
     */
    public function validateName(Request $request, $element)
    {
        try {
            $input = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
                return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
        }

        $students = $this->getStudents();
        switch ($element) {
            case 'name':
                        return new JsonResponse(['valid' => in_array(strtolower($input), $students)]);
        }

        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }


    /**
     * @Route("/validateteam/{element}", name="validateTeam")
     * @Method({"POST"})
     */
    public function validateTeam(Request $request, $element)
    {
        try {
            $input = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
        }

        $teams = $this->getTeam();
        switch ($element) {
            case 'team':
                return new JsonResponse(['valid' => in_array(strtolower($input), $teams)]);
        }

        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }

    private function getStorage()
    {
        return /** @lang json */
            '{
          "Po pamok\u0173": {
                "mentor": "Tomas",
                    "members": [
                      "Elena",
                      "Just\u0117",
                      "Deimantas"
                    ]
              },
          "Tech Guide": {
                "mentor": "Sergej",
                    "members": [
                      "Matas",
                      "Martynas"
                    ]
              },
          "Kelion\u0117s draugas": {
                "mentor": "Rokas",
                    "members": [
                      "Zbignev",
                      "Aist\u0117"
                    ]
              },
          "Wish A Gift": {
                "mentor": "Aistis",
                    "members": [
                      "Nerijus",
                      "Olga"
                    ]
              },
          "Mums pakeliui": {
                "mentor": "Paulius",
                    "members": [
                      "Egl\u0117",
                      "Svetlana"
                    ]
              },
          "Motyvacin\u0117 platforma": {
                "mentor": "Audrius",
                    "members": [
                      "Viktoras",
                      "Airidas"
                    ]
              }
        }';
    }
    
    private function getStudents() {
        $students = [];
        $storage = json_decode($this->getStorage(), true);
        foreach ($storage as $teamData) {
                foreach ($teamData['members'] as $student) {
                        $students[] = strtolower($student);
                    }
        }
        return $students;
    }

    private function getTeam() {
        $teamArray = [];
        $storage = json_decode($this->getStorage(), true);

        foreach ($storage as $obj)
        {
            $teamArray[] = strtolower(key($storage));
            unset($storage[key($storage)]);

        }
        return $teamArray;

    }




}
