<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\User;   // IMPORTANTE!!!

// hay que incluir esto para poder codificar los passwords
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $sergio = new User();
        $sergio->setUsername('sergio');
        $sergio->setPassword($this->passwordEncoder->encodePassword($sergio, '1234'));
        $sergio->setRoles(array('ROLE_USER'));
        $manager->persist($sergio);

        $paco = new User();
        $paco->setUsername('paco');
        $paco->setPassword($this->passwordEncoder->encodePassword($paco, '9876'));
        $paco->setRoles(array('ROLE_USER'));
        $manager->persist($paco);

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, '5555'));
        $admin->setRoles(array('ROLE_ADMIN'));
        $manager->persist($admin);

        $manager->flush();
    }
}
