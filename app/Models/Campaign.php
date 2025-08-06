<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Donasi;

class Campaign extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'campaign';
     protected $primaryKey = 'id_campaign';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'goal',
        'raised',
        'id_kategori',
        'start_date',
        'end_date',
        'min_donation',
        'lokasi',
        'main_picture',
        'second_picture',
        'last_picture',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [

        ];
    }
    public static function updateRaisedValues()
    {
        $campaigns = self::all();
    
        foreach ($campaigns as $campaign) {
            $raisedAmount = Donasi::where('id_campaign', $campaign->id_campaign)
                ->whereHas('transaction', function ($query) {
                    $query->where('status', 'success');
                })
                ->sum('jumlah_donasi');
    
            $campaign->raised = $raisedAmount;
            $campaign->save();
        }
    }
    
}
