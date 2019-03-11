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

    public function load(ObjectManager $manager)
    {
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

        $paco = new Developer();
        $paco->setIdUser($this->getReference(UserFixture::USER_PACO));
        $paco->setFirstName('Paco');
        $paco->setLastName('Ruiz');
        $paco->setCity('Madrid');
        $paco->setGithub('https://github.com/sergiovelmay/');

        $ruben = new Developer();
        $ruben->setIdUser($this->getReference(UserFixture::USER_RUBEN));
        $ruben->setFirstName('Rubén');
        $ruben->setLastName('Sánchez');
        $ruben->setCity('Madrid');

        $manager->persist($sergio);
        $manager->persist($paco);
        $manager->persist($ruben);
        $manager->flush();

        // other fixtures can get this object using the DeveloperFixture::ADMIN_USER_REFERENCE constant
        // $this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
        $this->addReference(self::DEV_SERGIO, $sergio);
        $this->addReference(self::DEV_PACO, $paco);
    }

    public function getDependencies()
    {
        return array(
            UserFixture::class,
        );
    }
}
