<?php
/**
 * Created by PhpStorm.
 * User: masha
 * Date: 08.02.19
 * Time: 17:05
 */

namespace App\Observers;
use App\Dress;

class DressObservers
{
        public function updating(Dress $obj){
            echo $obj;
            return true;
        }
    public function deleting(Dress $obj){
        echo $obj;
        return true;
    }
}
