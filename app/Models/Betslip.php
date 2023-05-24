<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Betslip extends Model
{
    use HasFactory;
    protected $fillable = ['bet_id','team_1','team_2','league','pick','odds','total_odds','amount','payout'];

}
