<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Manager
 *
 * @property      int          $id
 * @property      string       $firstName camelCase не желателен, т.к. в БД лучше хранить имена полей в snake_case
 * @property      string       $lastName
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @mixin Eloquent
 */
final class Manager extends Model
{
    public $timestamps = false; // Дата-время отсутствуют по ТЗ

    protected $table = 'managers';
}
