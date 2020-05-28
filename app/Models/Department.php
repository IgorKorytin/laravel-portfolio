<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @package App\Models
 * @author IgorKorytin <ivkorytin@yandex.ru>
 * @property int $id
 * @property int $company_id
 * @property string $director
 * @property string $address
 * @method static Builder|Department newModelQuery()
 * @method static Builder|Department newQuery()
 * @method static Builder|Department query()
 * @method static Builder|Department whereAddress($value)
 * @method static Builder|Department whereCompanyId($value)
 * @method static Builder|Department whereDirector($value)
 * @method static Builder|Department whereId($value)
 * @mixin Eloquent
 */
class Department extends Model
{

    /**
     * Возращаем массив подразделений, к каждому подразделению добавляем информацию о его пользователе
     * @param integer $company_id
     * @return array
     */
    public static function getAllByCompany($company_id)
    {
        $data = [];
        $departs = Department::where(array('company_id' => $company_id))->get()->toArray();
        if ($departs) {
            foreach ($departs as $value => $depart) {
                $data [] = [
                    'depart' => $depart,
                    'users' => Employee::where(array('department_id' => $depart['id']))->orderBy('name', 'asc')->get()
                ];
            }
        }
        return $data;
    }
}
