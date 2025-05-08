<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
/**
 * This class is Role model class with all role management related functions and variables.
 *
 * @package Meritest_LMS_User_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/roles
 */
class Role extends Model
{
    public function users()
    {
    	return $this->belongsToMany('\App\User');
    }
}
