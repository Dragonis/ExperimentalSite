<?php

namespace Gajdaw\BDDTutorial\GeographyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use Gajdaw\BDDTutorial\AppBundle\Entity\Pracownik;

class LoadPracownicy implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . '/../../data/Pracownicy.yml';
        $yml = Yaml::parse(file_get_contents($filename));
        foreach ($yml as $item) {
            $pracownik = new Pracownik();
            $pracownik->setImie($item['imie']);
            $pracownik->setnaziwsko($item['nazwisko']);
            $manager->persist($pracownik);
        }

        $manager->flush();
    }
}