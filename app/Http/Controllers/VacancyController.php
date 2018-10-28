<?php

namespace App\Http\Controllers;

use App\Traits\ProcessFields;

use Illuminate\Http\Request;

use LaravelDoctrine\ORM\Facades\EntityManager;
use App\Entities\Vacancy;


class VacancyController extends Controller
{
    use ProcessFields;

    public function search(Request $request)
    {
        $fields = $request->only(['q', 'category_id', 'location', 'date_from', 'date_to']);

        $result = EntityManager::getRepository(Vacancy::class)->search($fields, $request->input('page'));

        $items = $this->_getAllItems($result, Vacancy::$allowedForRead);

        $output = [
            'total' => $result->total(),
            'currentPage' => $result->currentPage(),
            'lastPage' => $result->lastPage(),
            'data' => $items
        ];


        return response()->json($output);
    }


}
