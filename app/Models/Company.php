<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @package App\Models
 * @author IgorKorytin <ivkorytin@yandex.ru>
 * @property int $id
 * @property string $name
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereName($value)
 * @mixin Eloquent
 */
class Company extends Model
{

    /**
     * @param $id
     * @return array|integer
     */
    public static function GetFullData($id)
    {
        $company = self::FindOrFail($id);
        if ($company) {
            $data [] = [
                'company' => $company,
                'departments' => Department::getAllByCompany($id)
            ];
            return $data;
        } else {
            return 404;
        }

    }
}
