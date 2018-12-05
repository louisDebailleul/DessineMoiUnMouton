<?php

namespace App\DataFixtures;


use App\Entity\Artist;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArtistFixtures extends Fixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $artist = new Artist();
            $artist->setFirstName($faker->name);
            $artist->setLastName($faker->name);
            $artist->setEmail($faker->email);
            $artist->setPhoto('https://picsum.photos/200/300/?random');
            $artist->setDescription($faker->text);
            $artist->setUser(
              $this->getReference('user'.$i)
            );
            $this->addReference("artist".$i ,$artist);

            $manager->persist($artist);
        }
        $manager->flush();

    }

    public function getOrder()
    {
        return 200;
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}