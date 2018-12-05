<?php

namespace App\DataFixtures;


use App\Entity\Artist;
use App\Entity\Category;
use App\Entity\ArtWork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArtworkFixtures extends Fixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $artwork = new Artwork();
            $artwork->setTitle($faker->name);
            $artwork->setImg("https://picsum.photos/200/300/?random");
            $artwork->setDescription($faker->text);
            $artwork->setCreateAt($faker->dateTime);
            $artist = 'artist'.rand(1,9);
            $artwork->setArtist(
                $this->getReference($artist)
            );
            $artwork->addCategory($this->getReference('category'.random_int(1,4)));
            $artwork->addCategory($this->getReference('category'.random_int(5,9)));
            $manager->persist($artwork);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 400;
    }

    public function getDependencies()
    {
        return array(
            ArtistFixtures::class,
            CategoryFixtures::class,
        );
    }
}