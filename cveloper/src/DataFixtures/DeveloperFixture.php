<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// hay que añadir aquí la clase en cuestión
use App\Entity\Developer;   // IMPORTANTE!!!

// para que cargue antes todos los usuarios de prueba
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// para poder usar aquí los objetos de los que depende
use App\DataFixtures\UserFixture;

// implemento la interfaz de dependencias con el método getDependencies()
class DeveloperFixture extends Fixture implements DependentFixtureInterface
{
    // declaro estas constantes para pasar los usuarios a otras Fixtures
    // public const ADMIN_USER_REFERENCE = 'admin-user';
    public const DEV_SERGIO = 'dev_sergio';
    public const DEV_PACO = 'dev_paco';
    public const DEV_VELGA = 'dev_velga';
    public const DEV_AITOR = 'dev_aitor';

    public function load(ObjectManager $manager)
    {
        $admin = new Developer();
        $admin->setIdUser($this->getReference(UserFixture::USER_ADMIN));
        $admin->setFirstName('Administrador');
        $admin->setAvatar('avatar_7.jpg');

        $sergio = new Developer();
        $sergio->setIdUser($this->getReference(UserFixture::USER_SERGIO));
        $sergio->setFirstName('Sergio');
        $sergio->setLastName('Velmay');
        $sergio->setAddress('calle Hermosilla 131');
        $sergio->setPostalCode(28009);
        $sergio->setCity('Madrid');
        $sergio->setPhone(620038240);
        $sergio->setGithub('https://github.com/sergiovelmay/');
        $sergio->setLinkedin('https://www.linkedin.com/in/sergiovelmay/');
        $sergio->setWeb('https://sergiovelmay.com/');
        $sergio->setEmail('sergiovelmay@gmail.com');
        $sergio->setAvatar('avatar_6.jpg');
        $sergio->setUpdated(new \DateTime());

        $paco = new Developer();
        $paco->setIdUser($this->getReference(UserFixture::USER_PACO));
        $paco->setFirstName('Paco');
        $paco->setLastName('Ruiz');
        $paco->setCity('Madrid');
        $paco->setGithub('https://github.com/sergiovelmay/');
        $paco->setAvatar('avatar_4.jpg');
        $paco->setUpdated(new \DateTime());

        $ruben = new Developer();
        $ruben->setIdUser($this->getReference(UserFixture::USER_RUBEN));
        $ruben->setFirstName('Rubén');
        $ruben->setLastName('Sánchez');
        $ruben->setCity('Madrid');
        $ruben->setAvatar('avatar_1.jpg');

        $velga = new Developer();
        $velga->setIdUser($this->getReference(UserFixture::USER_VELGA));
        $velga->setFirstName('Velga');
        $velga->setLastName('María');
        $velga->setAvatar('avatar_3.jpg');

        $aitor = new Developer();
        $aitor->setIdUser($this->getReference(UserFixture::USER_AITOR));
        $aitor->setFirstName('Aitor');
        $aitor->setLastName('Tilla');
        $aitor->setAvatar('avatar_5.jpg');

        $manager->persist($admin);
        $manager->persist($sergio);
        $manager->persist($paco);
        $manager->persist($ruben);
        $manager->persist($velga);
        $manager->persist($aitor);
        $manager->flush();

        // other fixtures can get this object using the DeveloperFixture::ADMIN_USER_REFERENCE constant
        // $this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
        $this->addReference(self::DEV_SERGIO, $sergio);
        $this->addReference(self::DEV_PACO, $paco);
        $this->addReference(self::DEV_VELGA, $velga);
        $this->addReference(self::DEV_AITOR, $aitor);
    }

    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}
