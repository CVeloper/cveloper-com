<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\Experience;   // IMPORTANTE!!!

// para que cargue antes todos los usuarios de prueba
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// para poder usar aquí los objetos de los que depende
use App\DataFixtures\DeveloperFixture;

// implemento la interfaz de dependencias con el método getDependencies()
class ExperienceFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uno = new Experience();
        $uno->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $uno->setPosition('Desarrollador Front-End');
        $uno->setCompany('Mind-Blowing Experiences');
        $uno->setCity('Barcelona');
        $uno->setDateFrom(new \DateTime('2012-06-15'));
        $uno->setDateTo(new \DateTime('2018-09-03'));

        $dos = new Experience();
        $dos->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
        $dos->setPosition('Desarrollador Full-Stack');
        $dos->setCompany('Bravent & Co');
        $dos->setCity('Málaga');
        $dos->setDateFrom(new \DateTime('2018-10-21'));

        $tre = new Experience();
        $tre->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
        $tre->setPosition('Desarrollador Back-End');
        $tre->setCompany('Evicertia Consulting');
        $tre->setCity('Sevilla');
        $tre->setDateFrom(new \DateTime('2015-03-27'));
        $tre->setDateTo(new \DateTime('2018-12-24'));

        $manager->persist($uno);
        $manager->persist($dos);
        $manager->persist($tre);
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            DeveloperFixture::class,
        );
    }
}
