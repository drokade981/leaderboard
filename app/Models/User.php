<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Activity;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function points () {
        return $this->hasMany(Activity::class);
    }

    public static function getUsers($data)
    {
        $perPage = $data['length'] ?? 10;
        $search = $data['search'] ?? '';
        $filter = $data['filter'] ?? '';
        $specificUserId = $data['user_id'] ?? null;

        $query = User::when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%".$search."%");
            })
            ->withSum(['points' => function ($q) use ($filter) {
                $year = date('Y');
                $month = date('m');
                $firstDay = date('Y-m-01', strtotime($year . '-' . $month));
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
            }], 'point');

        if ($specificUserId) {
            $query->orderByRaw("CASE WHEN id = ? THEN 0 ELSE 1 END, points_sum_point DESC", [$specificUserId]);
        } else {
            $query->orderByDesc('points_sum_point');
        }

        return $query->paginate($perPage);
        
    }

    // public static function getNextUsers($data)
    // {
    //     $perPage = $data['length'] ?? 10;
    //     \DB::enableQueryLog();
    //     $q =  User::getUsers($data)->limit()->offset(3);
    //     dd(\DB::getQueryLog());
    // }

    // static function getTopUsers($data) {
       
    //     return User::getUsers($data)->limit(3)->get();
    // }
}
