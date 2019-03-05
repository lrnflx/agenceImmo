<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{   

    /**
     * @Route("/biens", name="properties_show")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('property/index.html.twig' , [
            'current_menu' => 'properties' 
        ]);
    }


}
