<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'user_items';

    protected $fillable = [
        'user_id',
        'name',
        'due_date',
        'done'
    ];

    protected $casts = [
        'done' => 'boolean'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function markAsDone($id)
    {

    }
}
