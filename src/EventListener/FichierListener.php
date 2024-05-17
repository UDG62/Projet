<?php
namespace App\EventListener;
use App\Entity\Lampe;
use Doctrine\Persistence\Event\LifecycleEventArgs;
class FichierListener
{
public function prePersist(Lampe $lampe, LifecycleEventArgs $event): void
{
$lampe->setDateEnvoi(new \Datetime());
}
}
