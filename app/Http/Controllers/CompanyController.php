<?php


namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;

/**
 * Class CompanyController - отвечает за все запросы касающиеся сущности компания
 * @package App\Http\Controllers
 * @author IgorKorytin <ivkorytin@yandex.ru>
 */
class CompanyController
{

    /**
     * Индекс компаний
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Company::all());
    }

    /**
     * Просмотр компании
     * @param $id integer id компании
     * @return array|integer
     */
    public function show($id)
    {
        return Company::GetFullData($id);
    }
}
