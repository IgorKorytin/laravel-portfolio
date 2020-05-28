<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @package App\Models
 * @author IgorKorytin <ivkorytin@yandex.ru>
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property string $role
 * @method static Builder|Employee newModelQuery()
 * @method static Builder|Employee newQuery()
 * @method static Builder|Employee query()
 * @method static Builder|Employee whereDepartmentId($value)
 * @method static Builder|Employee whereId($value)
 * @method static Builder|Employee whereName($value)
 * @method static Builder|Employee whereRole($value)
 * @mixin Eloquent
 */
class Employee extends Model
{
//

}
