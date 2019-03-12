<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\Technology;   // IMPORTANTE!!!

class TechnologyFixture extends Fixture
{
    public const TECHNOLOGIES = ['Angular', 'CSS', 'HTML', 'Java', 'JavaScript', 'Laravel', 'MySQL',
                       'Node', 'PHP', 'Python', 'React', 'Ruby', 'Symfony', 'Vue', 'WordPress'];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < count(self::TECHNOLOGIES); $i++) {
            $tech = new Technology();
            $tech->setName(self::TECHNOLOGIES[$i]);
            $tech->setLogo(self::TECHNOLOGIES[$i] . '.png');
            if ($i == 5 || $i == 9 || $i == 11)
            $tech->setActive(false);
            $tech->setUpdated(new \DateTime());

            $manager->persist($tech);

            $this->addReference(self::TECHNOLOGIES[$i], $tech);
        }

        $manager->flush();
    }
}
