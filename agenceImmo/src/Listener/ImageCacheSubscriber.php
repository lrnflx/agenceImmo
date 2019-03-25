<?php

namespace App\Listener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{  
    private $cacheManager;
    private $helper;
    
    public function __construct(CacheManager $cacheManager, UploaderHelper $helper)
    {
        $this->cacheManager = $cacheManager;
        $this->helper = $helper;
    }
    public function getSubscribedEvents()
    {   
        //Retourner les évènements qui seront écoutés : 
        return [
            'preRemove',
            'preUpdate'
        ];
    }

    public function preRemove(LifecycleEventArgs $args)
    {   // 1- Récupérer l'entité modifiée
        $entity = $args->getEntity();

        //Si l'entité n'est pas une instance de Property, on retourne
        if (!$entity instanceof Picture)
        {
            return;
        }
        // 2- Supprimer dans le cacheManager mon info
            $this->cacheManager->remove($this->uploadedHelper->asset($entity, 'imageFile'));
 
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {   
        // dump($args->getEntity());
        // dump($args->getObject());
        $entity = $args->getEntity();

        if (!$entity instanceof Picture)
        {
            return;
        }
        if ($entity->getImageFile() instanceof UploadedFile)
        {
            $this->cacheManager->remove($this->uploadedHelper->asset($entity, 'imageFile'));
        }
    }
}