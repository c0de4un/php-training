<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Models\Order
 *
 * @property      int          $id
 * @property      int          $manager_id
 * @property      Manager      $manager
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @mixin Eloquent
 */
final class Order extends Model
{
    public $timestamps = false; // Дата-время отсутствуют по ТЗ

    protected $table = 'orders';

    /**
     * Это версия, которая использует связи ORM, но в итоговом SQL-запросе будет JOIN
     *
     * @return  Collection<Order>
     */
    public function getOrdersWithManagers(): Collection
    {
        return self::with('manager')->limit(50)->get();
    }

    /**
     * Это версия, которая использует под-запрос, чтобы не применять JOIN в итоговом SQL-запросе
     * 
     * @return  Collection<Order>
     */
    public function getOrdersWithManagersNoJOIN(): Collection
    {
        return self::query()
            ->where(function (QueryBuilder $builder) {
                $builder->select('*')
                    ->from('managers')
                    ->whereColumn('managers.id', 'orders.manager_id')
                    ->limit(1);
            })
            ->limit(50)
            ->get();
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }
}
