<?php

namespace App\DataFixtures;

use App\Entity\Keyword;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class KeywordFixtures extends Fixture
{

    public function __construct(private readonly SluggerInterface $slugger)
    {
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $keywords = [
            'peinture',
            'enduit',
            'ponçage',
            'décapage',
            'décoration',
            'revêtement',
            'plâtrerie',
            'colle',
            'rénovation',
            'fissures',
            'papier peint',
        ];
        foreach ($keywords as $keyword) {
            $newKeyword = new Keyword();

            $newKeyword->setLabel($keyword);

            $slug = strtolower($this->slugger->slug($newKeyword->getLabel()));
            $newKeyword->setSlug($slug);

            $manager->persist($newKeyword);
        }
        $manager->flush();
    }
}
