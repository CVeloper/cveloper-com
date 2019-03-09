<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

// use App\Entity\Products;   // IMPORTANTE!!!

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // EJEMPLOS DE CREACIÓN DE DATOS DE PRUEBA:

        // create a product
        // $product = new Product();
        // $product->setName('Priceless widget!');
        // $product->setPrice(14.50);
        // $product->setDescription('Ok, I guess it *does* have a price');
        // $manager->persist($product);

        // create 20 products! Bam!
        // for ($i = 0; $i < 20; $i++) {
        //     $product = new Product();
        //     $product->setName('product '.$i);
        //     $product->setPrice(mt_rand(10, 100));
        //     $manager->persist($product);
        // }

        $manager->flush();
    }
}
