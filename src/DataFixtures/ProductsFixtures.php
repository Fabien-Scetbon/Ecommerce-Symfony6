<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class ProductsFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($prod = 1; $prod<=10; $prod++){
            $product = new Products();
            $product->setName($faker->text(15));
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice($faker->numberBetween(50, 5000));
            $product->setStock($faker->numberBetween(0, 50));

            $category = $this->getReference('cat-'.rand(1, 7));
            $product->setCategories($category);

            $manager->persist($product);
            $this->addReference('prod-'.$prod, $product);
        }


        $manager->flush();
    }
}
