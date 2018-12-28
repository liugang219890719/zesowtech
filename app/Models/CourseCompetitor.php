<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class CourseCompetitor extends Model
{

   

    protected $table = 'course_completitors';

    protected $fillable = [
        'user_id', 'course_id', 
    ];

 
  

  
}