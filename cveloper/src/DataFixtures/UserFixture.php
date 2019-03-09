<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\User;   // IMPORTANTE!!!

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sergio = new User();
        $sergio->setUsername('sergio');
        $sergio->setPassword('1234');
        $sergio->setRoles('ROLE_USER');
        $manager->persist($sergio);

        $paco = new User();
        $paco->setUsername('paco');
        $paco->setPassword('9876');
        $paco->setRoles('ROLE_USER');
        $manager->persist($paco);

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword('5555');
        $admin->setRoles('ROLE_ADMIN');
        $manager->persist($admin);

        $manager->flush();
    }
}
