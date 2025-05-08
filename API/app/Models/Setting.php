<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * This class is Setting model class with all setting management related functions and variables.
 *
 * @package Meritest_LMS_Setting_Model
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/settings
 */
class Setting extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $fillable = array(
        'uid',
        'institution_name',
        'slogan',
        'logo',
        'website_url',
        'phone_number',
        'alternate_phone_number',
        'whatsapp_number',
        'address',
        'default_language',
        'mail_from_email',
        'mail_from_name',
        'mail_default_subject',
        'mail_server',
        'mail_login_name',
        'mail_login_password',
        'mail_default_template_name',
        'mail_services'
    );

    protected $casts = [
        'mail_services' => 'array'
    ];


}
