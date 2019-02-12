<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Student;

use Faker\Factory;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // faker 'factory'
        $faker = Factory::create();

        // loop to create and persist 10 students
        $numStudents = 10;
        for ($i=0; $i < $numStudents; $i++) {
            $firstName = $faker->firstNameMale;
            $surname = $faker->lastName;

            $student = new Student();
            $student->setFirstName($firstName);
            $student->setSurname($surname);

            $manager->persist($student);
        }

        $manager->flush();

    }
}
