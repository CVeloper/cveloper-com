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
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            DeveloperFixture::class,
        );
    }
}
