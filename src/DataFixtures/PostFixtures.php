<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private readonly SluggerInterface $slugger)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $post = new Post();

        $post->setUser($this->getReference('admin', User::class)); // Assuming 'admin' is a reference to a User fixture
        $post->setTitle('Sample Post Title');
        $post->setContent('This is a sample post content.');
        $post->setSlug(strtolower($this->slugger->slug($post->getTitle())));
        $post->setCreatedAt(new \DateTimeImmutable());
        $post->setImage('path/to/image.jpg'); // Set a default image path or leave it null if not required
        $manager->persist($post);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class, // Ensure UserFixtures is loaded before PostFixtures
        ];
    }
}
