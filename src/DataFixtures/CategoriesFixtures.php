<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){} // si pas plus bas


    public function load(ObjectManager $manager): void
    {
        $parent = new Categories();
        $parent->setName('Informatique');
        // $parent->setSlug('informatique'); -> sans constructeur avec $sluger
        $parent->setSlug($this->slugger->slug($parent->getName())->lower());
        $manager->persist($parent);

        $category = new Categories();
        $category->setName('Ordinateurs portables');
        // $category->setSlug('ordinateurs');
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $manager->flush();
    }
}
