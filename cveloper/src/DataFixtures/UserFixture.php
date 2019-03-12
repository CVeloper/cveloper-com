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
    // declaro estas constantes para pasar los usuarios a DeveloperFixture
    // public const ADMIN_USER_REFERENCE = 'admin-user';
    public const USER_ADMIN = 'user_admin';
    public const USER_SERGIO = 'user_sergio';
    public const USER_PACO = 'user_paco';
    public const USER_RUBEN = 'user_ruben';
    public const USER_VELGA = 'user_velga';
    public const USER_AITOR = 'user_aitor';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, '0000'));
        $admin->setRoles(array('ROLE_ADMIN'));

        $sergio = new User();
        $sergio->setUsername('sergio');
        $sergio->setPassword($this->passwordEncoder->encodePassword($sergio, '1111'));
        $sergio->setRoles(array('ROLE_DEVELOPER'));

        $paco = new User();
        $paco->setUsername('paco');
        $paco->setPassword($this->passwordEncoder->encodePassword($paco, '2222'));
        $paco->setRoles(array('ROLE_DEVELOPER'));

        $ruben = new User();
        $ruben->setUsername('ruben');
        $ruben->setPassword($this->passwordEncoder->encodePassword($ruben, '3333'));
        $ruben->setRoles(array('ROLE_USER'));

        $velga = new User();
        $velga->setUsername('velga');
        $velga->setPassword($this->passwordEncoder->encodePassword($velga, '4444'));
        $velga->setRoles(array('ROLE_DEVELOPER'));

        $aitor = new User();
        $aitor->setUsername('aitor');
        $aitor->setPassword($this->passwordEncoder->encodePassword($aitor, '5555'));
        $aitor->setRoles(array('ROLE_DEVELOPER'));

        $manager->persist($admin);
        $manager->persist($sergio);
        $manager->persist($paco);
        $manager->persist($ruben);
        $manager->persist($velga);
        $manager->persist($aitor);
        $manager->flush();

        // other fixtures can get this object using the UserFixture::ADMIN_USER_REFERENCE constant
        // $this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
        $this->addReference(self::USER_ADMIN, $admin);
        $this->addReference(self::USER_SERGIO, $sergio);
        $this->addReference(self::USER_PACO, $paco);
        $this->addReference(self::USER_RUBEN, $ruben);
        $this->addReference(self::USER_VELGA, $velga);
        $this->addReference(self::USER_AITOR, $aitor);
    }
}
