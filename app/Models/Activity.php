<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'point'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilterByDate($query, $filter)
    {
        if ($filter === 'day') {
            return $query->whereDate('created_at', Carbon::today());
        } elseif ($filter === 'month') {
            return $query->whereMonth('created_at', Carbon::now()->month);
        } elseif ($filter === 'year') {
            return $query->whereYear('created_at', Carbon::now()->year);
        }

        return $query;
    }

    public static function getPoints($userId, $filter)
    {
        return Activity::sum('point')->where('user_id', $userId)->when(
            $filter, function ($q) use ($filter) {
                $year = date('Y');
                $month = date('m');
                // Get the first day of the month
                $firstDay = date('Y-m-01', strtotime($year . '-' . $month));
                // Get the last day of the month
                $lastDay = date('Y-m-t', strtotime($year . '-' . $month));
                switch ($filter) {
                    case 'day':
                        $q->whereDate('created_at', date('Y-m-d'));                        
                        break;
                    case 'month':
                        $q->whereBetween('created_at', [$firstDay, $lastDay]);
                        break;
                    case 'year':
                        $q->whereBetween('created_at', [date('Y-01-01'), date('Y-12-31')]);
                        break;
                    default:
                        $q->whereDate('created_at', date('Y-m-d'));
                        break;
                }
            }
        )->get();
    }
}
