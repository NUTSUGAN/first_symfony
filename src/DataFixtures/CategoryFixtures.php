<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CategoryFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface

{
    public function load(ObjectManager $manager): void
    {
        $names = ['Tech', 'Sport', 'Cinema', 'Jeux', 'Musique'];

        foreach ($names as $i => $name) {
            $cat = new Category();
            $cat->setName($name);

            // createdBy = admin
            $cat->setCreatedBy($this->getReference(UserFixtures::ADMIN_REF, \App\Entity\User::class));

            $manager->persist($cat);

            $this->addReference("cat_$i", $cat);
        }

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['category'];
    }


    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
