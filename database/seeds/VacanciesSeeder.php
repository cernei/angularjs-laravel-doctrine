<?php

use Illuminate\Database\Seeder;
use LaravelDoctrine\ORM\Facades\EntityManager;
use App\Entities\Vacancy;
use Carbon\Carbon;

class VacanciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityManager::persist(new Vacancy('PHP developer','PHP developer is needed', 1, 'Chisinau', Carbon::now()->subDays(1)));
        EntityManager::persist(new Vacancy('Junior PHP developer','Junior PHP developer is needed', 1, 'London', Carbon::now()->subDays(2)));
        EntityManager::persist(new Vacancy('JavaScript developer','We are looking for JavaScript developer', 1, 'Chisinau', Carbon::now()->subDays(3)));

        EntityManager::persist(new Vacancy('DevOps Engineer','DevOps Engineer is needed', 1, 'Berlin', Carbon::now()->subDays(4)));
        EntityManager::persist(new Vacancy('System Administrator','System Administrator is needed', 1, 'Paris', Carbon::now()->subDays(4)));
        EntityManager::persist(new Vacancy('Go Developer','We are looking for Go developer', 1, 'Budapest', Carbon::now()->subDays(5)));

        EntityManager::persist(new Vacancy('Dentist','We are looking for Dentist ', 2, 'New-York', Carbon::now()->subDays(10)));
        EntityManager::persist(new Vacancy('Surgeon','We are looking for Surgeon ', 2, 'New-York', Carbon::now()->subDays(15)));
        EntityManager::persist(new Vacancy('Neurosurgeon','We are looking for Neurosurgeon', 2, 'Washington', Carbon::now()->subDays(35)));
        EntityManager::persist(new Vacancy('Pharmacologist','We are looking for Pharmacologist', 2, 'Washington', Carbon::now()->subDays(40)));

        EntityManager::persist(new Vacancy('Carpenter','We are looking for Carpenter ', 3, 'Chisinau', Carbon::now()->subDays(41)));
        EntityManager::persist(new Vacancy('Carpenter','We are looking for Carpenter ', 3, 'New-York', Carbon::now()->subDays(42)));
        EntityManager::persist(new Vacancy('Carpenter','We are looking for Carpenter', 3, 'Dubai', Carbon::now()->subDays(45)));
        EntityManager::persist(new Vacancy('Carpenter','We are looking for Carpenter', 3, 'Washington', Carbon::now()->subDays(57)));

        EntityManager::persist(new Vacancy('HR Manager','HR Manager is needed', 4, 'Chisinau', Carbon::now()->subDays(60)));
        EntityManager::persist(new Vacancy('Talent Recruiter','Talent Recruiter is needed', 4, 'Paris', Carbon::now()->subDays(61)));
        EntityManager::persist(new Vacancy('Project Manager','We are looking for Project Manager', 4, 'Budapest', Carbon::now()->subDays(63)));

        EntityManager::persist(new Vacancy('Physicist','We are looking for Physicist ', 5, 'Pasadena', Carbon::now()->subDays(91)));
        EntityManager::persist(new Vacancy('Biologist','We are looking for Biologist ', 5, 'Massachusetts', Carbon::now()->subDays(92)));
        EntityManager::persist(new Vacancy('Chemist','We are looking for Chemist', 5, 'Boston', Carbon::now()->subDays(93)));

        EntityManager::flush();
    }
}
