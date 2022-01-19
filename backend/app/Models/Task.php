<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use HasFactory,Sortable;

    protected $fillable = [
        'name',
        'deadline',
        'is_completed'
    ];
    public $sortable = ['created_at', 'deadline'];
    use Sortable;
    public function detail()
{
    return $this->hasOne(App\UserDetail::class);
}
public function user()
{
    return $this->belongsTo(App\User::class);
}
}

