<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SnsAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sns_id', 'sns_etc_name', 'account_name', 'url', "comment", 'user_id', 'status'
    ];

    /**
     * 多対1 Snsデータ取得
     */
    public function sns() {
        return $this->belongsTo('App\Models\Sns', 'sns_id', 'sns_id');
    }

    public function registerSnsAccount() {

    }
}
