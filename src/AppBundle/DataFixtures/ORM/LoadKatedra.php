<?php

namespace Gajdaw\BDDTutorial\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Katedra;

class LoadKatedra implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . '/../../data/Katedra.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $katedra = new Katedra();
            $katedra->setNazwa($item['nazwa']);
            $manager->persist($katedra);
        }

        $manager->flush();
    }
}