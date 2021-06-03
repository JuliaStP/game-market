<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATE_CURRENT = 1;
    const STATE_PROCESSED = 2;

    protected $fillable = ['user_id', 'state'];

    private static $currentOrder = false;
    private static $previousOrders = false;

    public function goods()
    {
        return $this->belongsToMany(
            Good::class,
            'order_goods',
            'order_id',
            'good_id'
        );
    }

    public function orders()
    {
        return $this->belongsToMany(
            OrderGood::class,
            'order_goods',
            'order_id',
            'user_id'
        );
    }

    public function getSum(): int
    {
        $sum = 0;
        foreach ($this->goods as $good) {
            $sum += $good->price;
        }

        return (int) $sum;
    }

    public static function getCurrentOrder(int $id)
    {
        if (self::$currentOrder === false) {
            self::$currentOrder = self::query()
                ->where('user_id', '=', $id)
                ->where('state', '=', Order::STATE_CURRENT)
                ->first();
        }
        return self::$currentOrder;
    }

    public static function getPreviousOrders(int $id)
    {
        if (self::$previousOrders === false) {
            self::$previousOrders = self::query()
                ->where('user_id', '=', $id)
                ->where('state', '=', Order::STATE_PROCESSED)
                ->first();
        }
        return self::$previousOrders;
    }

    public function saveAsProcessed()
    {
        $this->state = self::STATE_PROCESSED;
        return $this->save();
    }
}
