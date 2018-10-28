<?php

namespace App\Repositories;

use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use Doctrine\ORM\EntityRepository;
use Carbon\Carbon;

class VacancyRepository extends EntityRepository
{
    use PaginatesFromParams;

    public function search($fields, $page = 1)
    {

        $qb = $this->createQueryBuilder('v');

        if (isset($fields['q'])) {
            $qb->where('v.title like :title')
                ->setParameter('title', '%' . $fields['q'] . '%');
        }
        if (isset($fields['category_id'])) {
            $qb->andWhere('v.category_id = :category_id')
                ->setParameter('category_id', $fields['category_id']);
        }
        if (isset($fields['location'])) {
            $qb->andWhere('v.location like :location')
                ->setParameter('location', '%' . $fields['location'] . '%');
        }
        if (isset($fields['date_from'])) {
            $dateFrom = Carbon::parse($fields['date_from'])->toDateString();
            $qb->andWhere('date(v.created_at) >= :date_from')
                ->setParameter('date_from', $dateFrom);
        }
        if (isset($fields['date_to'])) {
            $dateTo = Carbon::parse($fields['date_to'])->toDateString();
            $qb->andWhere('date(v.created_at) <= :date_to')
                ->setParameter('date_to', $dateTo);
        }

        $query = $qb->getQuery();

        return $this->paginate($query, 5, $page);
    }
}
