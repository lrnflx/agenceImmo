<?php

namespace App\Controller;

use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\PropertyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{   
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="properties_show")
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {   
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $properties = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1), 
            12 //limite à mettre en place
        );

        // dump($properties);
        return $this->render('property/index.html.twig' , [
            'current_menu' => 'properties' , 
            'properties' => $properties, 
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property_show", requirements={"slug" = "[a-z0-9\-]*"})
     */
    public function show(Property $property, string $slug): Response
    {   
        if($property->getSlug() !== $slug)
        {
           return $this->redirectToRoute('property_show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301 );
        }

        // $property =  $this->repository->find($id);
        return $this->render('property/show.html.twig', [
            'current_menu' => 'properties', 
            'property' => $property
        ]);
    }


}
