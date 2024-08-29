<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorsLog extends Model
{
    protected $table = 'visitors_log';

    protected $fillable = [
        'visited_at',
        'page_visited',
        'ip_address',
        'host_name',
        'browser_name'
    ];

    public $timestamps = false;
}
