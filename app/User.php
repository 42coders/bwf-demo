<?php

namespace App;

use BWF\DocumentTemplates\TemplateDataSources\ModelProvidesTemplateData;
use BWF\DocumentTemplates\TemplateDataSources\TemplateDataSourceInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements TemplateDataSourceInterface, MustVerifyEmail
{
    use Notifiable;
    use ModelProvidesTemplateData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function getTemplateFields()
    {
        return $this->fillable;
    }
}
