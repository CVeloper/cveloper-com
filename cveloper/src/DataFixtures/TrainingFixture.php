<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\Training;   // IMPORTANTE!!!

// para que cargue antes todos los usuarios de prueba
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// para poder usar aquí los objetos de los que depende
use App\DataFixtures\DeveloperFixture;

// implemento la interfaz de dependencias con el método getDependencies()
class TrainingFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uno = new Training();
        $uno->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $uno->setDegree('Arquitectura Superior');
        $uno->setInstitution('Universidad Politécnica');
        $uno->setCity('Madrid');
        $uno->setDateFrom(new \DateTime('2003-09-15'));
        $uno->setDateTo(new \DateTime('2015-06-12'));

        $dos = new Training();
        $dos->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $dos->setDegree('Desarrollo de Aplicaciones Web');
        $dos->setInstitution('IES Juan de la Cierva');
        $dos->setCity('Madrid');
        $dos->setDateFrom(new \DateTime('2017-09-10'));

        $tre = new Training();
        $tre->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
        $tre->setDegree('Sistemas Microinformáticos y Redes');
        $tre->setInstitution('IES Juan de la Cierva');
        $tre->setCity('Madrid');
        $tre->setDateFrom(new \DateTime('2015-09-10'));
        $tre->setDateTo(new \DateTime('2017-06-21'));

        $cua = new Training();
        $cua->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
        $cua->setDegree('Desarrollo de Aplicaciones Web');
        $cua->setInstitution('IES Juan de la Cierva');
        $cua->setCity('Madrid');
        $cua->setDateFrom(new \DateTime('2017-09-10'));

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
