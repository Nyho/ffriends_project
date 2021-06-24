<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Rentable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 20; $i++) {
            $faker = Factory::create();
            $rentable = new Rentable();
            $rentable->setFirstName($faker -> firstName);
            $rentable->setLastName($faker -> lastName);
            $rentable->setDescription($faker -> text);
            $rentable->setLocation($faker -> city);
            $rentable->setEmail($faker -> email);
            $rentable->setPicture("https://randomuser.me/api/portraits/men/".$i."jpg");
            $rentable->setAge($faker -> numberBetween(5,500));

                for ($i = 0; $i < 500; $i++) {
                    $comment = new Comment();
                    $comment->setContent($faker -> text);
                    $comment->setUserName($faker -> userName);
                    $manager->persist($comment);
                    $rentable->addComment($comment);

                }

            $manager->persist($rentable);
        }



        $manager->flush();
    }
}
