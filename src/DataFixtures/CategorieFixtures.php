<?php

namespace App\DataFixtures;


use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategorieFixtures extends Fixture
{

    public function __construct(private readonly SluggerInterface $slugger)
    {
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $categories = [
            [
                'name' => 'Plafond',
                'parent' => null,
            ],
            [
                'name' => 'Boiserie',
                'parent' => null,
            ],
            [
                'name' => 'Murs',
                'parent' => null,
            ],
            [
                'name' => 'Tapisserie',
                'parent' => null,
            ],
            [
                'name' => 'Haute Décoration',
                'parent' => null,
            ],
            [
                'name' => 'Enduit',
                'parent' => null,
            ],
            [
                'name' => 'Plâtrerie',
                'parent' => null,
            ],
            [
                'name' => 'Placo',
                'parent' => null,
            ],
            [
                'name' => 'Peinture',
                'parent' => null,
            ],
            [
                'name' => 'Revêtement mural',
                'parent' => null,
            ],
            [
                'name' => 'Toile de verre',
                'parent' => 'Plafond',
            ],
            [
                'name' => 'Papier peint',
                'parent' => 'Murs',
            ],
            [
                'name' => 'Texture',
                'parent' => 'Murs',
            ],
            [
                'name' => 'Stuc',
                'parent' => 'Haute Décoration',
            ],
            [
                'name' => 'Fresque',
                'parent' => 'Haute Décoration',
            ],
            [
                'name' => 'Marbré',
                'parent' => 'Haute Décoration',
            ],
            [
                'name' => 'Enduit décoratif',
                'parent' => 'Haute Décoration',
            ],
            [
                'name' => 'Peinture Spécialisée',
                'parent' => 'Peinture',
            ],
            [
                'name' => 'Enduit Spécialisé',
                'parent' => 'Enduit',
            ],
            [
                'name' => 'Ponçage Spécialisé',
                'parent' => 'Plâtrerie',
            ],
            [
                'name' => 'Décapage Spécialisé',
                'parent' => 'Plâtrerie',
            ],
            [
                'name' => 'Colle',
                'parent' => 'Tapisserie',
            ],
            [
                'name' => 'Réparation Fissures',
                'parent' => 'Plâtrerie',
            ],
        ];

        foreach ($categories as $categorie) {
            $newCategorie = new Categorie();

            $newCategorie->setName($categorie['name']);

            $slug = strtolower($this->slugger->slug($newCategorie->getName()));

            $newCategorie->setSlug($slug);
            //créer une référence à cette catégorie
            $this->setReference($categorie['name'], $newCategorie);

            $parent = null;
            //vérifier si la catégorie a un parent
            if ($categorie['parent'] !== null) {
                $parent = $this->getReference($categorie['parent'], Categorie::class);
            }

            $newCategorie->setParent($parent);

            $manager->persist($newCategorie);
        }
        $manager->flush();
    }
}
