<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;

    private $admin = 4;

    /**
     * @return int
     */
    public function getAdmin(): int
    {
        return $this->admin;
    }

    public static function testPrivilege()
    {
        if (session()->get('privileges') != null){

            foreach (session()->get('privileges') as $applicationPrivilege){
                if($applicationPrivilege->privilege->id == 4){
                    return true;
                }
            }
        }
        return false;
    }
}
