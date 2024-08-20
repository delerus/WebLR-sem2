<?php

namespace App\Models;

use App\Core\BaseActiveRecord;

class BlogPost extends BaseActiveRecord
{
    protected $table = 'blog_posts';
    protected $primaryKey = 'id';
}
