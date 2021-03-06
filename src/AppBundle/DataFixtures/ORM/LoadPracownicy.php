<?php

namespace Gajdaw\BDDTutorial\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Pracownik;

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
            $pracownik->setNazwisko($item['nazwisko']);
            $manager->persist($pracownik);
        }

        $manager->flush();
    }
}