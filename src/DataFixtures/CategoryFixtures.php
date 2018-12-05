<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');


        // creation 10 user
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setTitle($faker->name);
            $category->setDescription($faker->text);
            $category->setImg("https://picsum.photos/400/300/?random");

            $this->addReference("category".$i ,$category);

            $manager->persist($category);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 300;
    }
}