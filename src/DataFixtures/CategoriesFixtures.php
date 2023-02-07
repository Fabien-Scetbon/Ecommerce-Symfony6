<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
    } // si pas plus bas

    // fixtures SANS la fonction createCategory

    // public function load(ObjectManager $manager): void
    // {
    //     $parent = new Categories();
    //     $parent->setName('Informatique');
    //     // $parent->setSlug('informatique'); -> sans constructeur avec $sluger
    //     $parent->setSlug($this->slugger->slug($parent->getName())->lower());
    //     $manager->persist($parent);

    //     $category = new Categories();
    //     $category->setName('Ordinateurs portables');
    //     // $category->setSlug('ordinateurs');
    //     $category->setSlug($this->slugger->slug($category->getName())->lower());
    //     $category->setParent($parent);
    //     $manager->persist($category);

    //     $manager->flush();
    // }

    // fixtures AVEC la fonction createCategory   

    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Informatique', null, $manager); 

        $this->createCategory('Ordinateurs portables', $parent, $manager);
        $this->createCategory('Souris', $parent, $manager);

        $parent = $this->createCategory('Mode', null, $manager); 

        $this->createCategory('Femmes', $parent, $manager);
        $this->createCategory('Hommes', $parent, $manager);
        $this->createCategory('Enfants', $parent, $manager);

        $manager->flush();
    }


    // sinon faire une fonction pour automatiser la creation de categ :

    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        // $category->setSlug('ordinateurs');
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
