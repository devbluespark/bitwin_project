<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid_Users_Has_Package extends Model
{

    protected $table = 'bid_users_has_packages';
    protected $primaryKey ='id';
    const UPDATED_AT=NULL;

    protected $guarded = [];

}
