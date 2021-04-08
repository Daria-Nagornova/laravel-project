<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consultation extends Model
{
    use HasFactory;

    const DONE = 'выполнена';
    const NOT_DONE = 'не выполнена';

    protected $fillable = ['text', 'user_id', 'doctor_id', 'email', 'status'];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function doctor() : belongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function answer() : hasOne
    {
        return $this->hasOne(Answer::class);
    }

    public static function saveConsultation(array $data, User $user) {

        $consultation = new Consultation;
        $consultation->fill($data);
        $consultation->user_id = $user->id;
        $consultation->save();

        return $consultation;
    }

    public static function allStatuses(): array
    {
        return [
            self::DONE,
            self::NOT_DONE,
        ];
    }
}
