<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\Additional;   // IMPORTANTE!!!

// para que cargue antes todos los usuarios de prueba
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// para poder usar aquí los objetos de los que depende
use App\DataFixtures\DeveloperFixture;

// implemento la interfaz de dependencias con el método getDependencies()
class AdditionalFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uno = new Additional();
        $uno->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $uno->setDescription('Capacidad de adaptación y autoaprendizaje');

        $dos = new Additional();
        $dos->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $dos->setDescription('Creatividad en la resolución de problemas');

        $tre = new Additional();
        $tre->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
        $tre->setDescription('Capacidad de trabajo en grupo y en equipo');

        $cua = new Additional();
        $cua->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
        $cua->setDescription('Capacidad de organización y planificación');

        $manager->persist($uno);
        $manager->persist($dos);
        $manager->persist($tre);
        $manager->persist($cua);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            DeveloperFixture::class,
        );
    }
}
