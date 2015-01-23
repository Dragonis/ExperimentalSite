<?php

namespace Gajdaw\BDDTutorial\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Wydzial;

class LoadWydzial implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . '/../../data/Wydzial.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $wydzial = new Wydzial();
            $wydzial->setNazwa($item['nazwa']);
            $manager->persist($wydzial);
        }

        $manager->flush();
    }
}