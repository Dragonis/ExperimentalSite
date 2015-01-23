<?php

namespace Gajdaw\BDDTutorial\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Pokoj;

class LoadPokoj implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . '/../../data/Pokoj.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $pokoj = new Pokoj();
            $pokoj->setNumer($item['numer']);
            $manager->persist($pokoj);
        }

        $manager->flush();
    }
}