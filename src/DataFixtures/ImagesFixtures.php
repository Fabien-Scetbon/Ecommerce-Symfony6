<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImagesFixtures extends Fixture implements DependentFixtureInterface  // pour changer l'ordre des fixtures (ordre alpha par def)
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($img = 1; $img<=100; $img++){
            $image = new images();
            $image->setName($faker->image(null, 640, 480));
            $product = $this->getReference('prod-'.rand(1, 10));
            $image->setProducts($product);
            $manager->persist($image);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProductsFixtures::class   // on indique qui doit etre effectué avant
        ];
    }
}
