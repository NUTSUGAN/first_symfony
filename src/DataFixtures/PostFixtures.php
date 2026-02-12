<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();
            $post->setTitle("Post $i");
            $post->setContent("Contenu du post $i ...");

            // Catégorie random parmi cat_0..cat_4
            $catIndex = random_int(0, 4);
            $post->setCategory($this->getReference("cat_$catIndex", \App\Entity\Category::class));
            
            // User random : admin + users
            $userIndex = random_int(0, 4);
            $post->setCreatedBy($this->getReference("user_$userIndex", \App\Entity\User::class));

            $manager->persist($post);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['post'];
    }

    #php bin/console doctrine:fixtures:load --group=post
    #php bin/console doctrine:fixtures:load --group=user --append
    
    public function getDependencies(): array
    {
        return [UserFixtures::class, CategoryFixtures::class];
    }
}
