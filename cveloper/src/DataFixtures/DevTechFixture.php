<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\DevTech;   // IMPORTANTE!!!

// para que cargue antes todos los usuarios de prueba
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// para poder usar aquí los objetos de los que depende
use App\DataFixtures\DeveloperFixture;
use App\DataFixtures\TechnologyFixture;

// implemento la interfaz de dependencias con el método getDependencies()
class DevTechFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $techsSergio = $this->obtenerArrayTechs();
        foreach ($techsSergio as $tech) {
            $devTech = new DevTech();
            $devTech->setIdDeveloper($this->getReference(DeveloperFixture::DEV_SERGIO));
            $devTech->setIdTech($this->getReference($tech));
            $devTech->setLevel(mt_rand(1, 9));

            $manager->persist($devTech);
        }

        $techsPaco= $this->obtenerArrayTechs();
        foreach ($techsSergio as $tech) {
            $devTech = new DevTech();
            $devTech->setIdDeveloper($this->getReference(DeveloperFixture::DEV_PACO));
            $devTech->setIdTech($this->getReference($tech));
            $devTech->setLevel(mt_rand(1, 9));

            $manager->persist($devTech);
        }

        $manager->flush();
    }

    public function obtenerArrayTechs() {
        $numero = count(TechnologyFixture::TECHNOLOGIES);
        $array = [];
        $total = mt_rand(1, $numero);
        do {
            $random = mt_rand(0, $numero - 1);
            $tech = TechnologyFixture::TECHNOLOGIES[$random];
            if (!in_array($tech, $array))
            $array[] = $tech;
        } while (count($array) != $total);
        return $array;
    }

    public function getDependencies()
    {
        return array(
            DeveloperFixture::class,
            TechnologyFixture::class,
        );
    }
}
