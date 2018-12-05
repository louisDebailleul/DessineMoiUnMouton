<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // creation admin
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($password);
        $manager->persist($user);

        // creation 10 user
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail('user'.$i.'@gmail.com');
            $password = $this->encoder->encodePassword($user, 'admin');
            $user->setPassword($password);
            $manager->persist($user);
        }

        // on créé 10 artistes
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail('artist' . $i . '@gmail.com');
            $password = $this->encoder->encodePassword($user, 'admin');
            $user->setRoles(['ROLE_ARTIST']);
            $user->setPassword($password);
            $this->addReference("user".$i ,$user);
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}