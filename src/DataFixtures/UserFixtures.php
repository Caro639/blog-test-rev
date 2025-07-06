<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setNickName('johndoe');
        $user->setIsVerified(true);

        $manager->persist($user);

        $admin = new User();
        $admin->setEmail('admin@revelations.fr');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'password'));
        $admin->setRoles(['ROLE_ADMIN']);
        $this->setReference('admin', $admin); // Set a reference for the admin user
        $admin->setFirstName('Caro');
        $admin->setLastName('Caroz');
        $admin->setNickName('carozia');
        $admin->setIsVerified(true);

        $manager->persist($admin);
        $manager->flush();
    }
}
