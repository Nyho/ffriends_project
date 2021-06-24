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
            $rentable = new Rentable();
            $rentable->setFirstName('jeanPaul'.$i);
            $rentable->setLastName('dupont'.$i);
            $rentable->setDescription("J'aime les patates douces" .$i);
            $rentable->setLocation('par la ' .$i);
            $rentable->setEmail('jeanPaul@dawdawdawdawd.dawdwad'.$i);
            $rentable->setPicture("https://randomuser.me/api/portraits/men/".$i."jpg");
            $rentable->setAge(rand(2, 500));

                for ($g = 0; $g < 12; $g++) {
                    $comment = new Comment();
                    $comment->setContent('blabla' .$g) ;
                    $comment->setUserName('michel'.$i);
                    $manager->persist($comment);
                    $rentable->addComment($comment);
                }

            $manager->persist($rentable);
            $manager->flush();
        }

    }
}
