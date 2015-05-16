<?php
namespace app\components;
use yii\filters\AccessRule as Ac;
class AccessRule extends Ac{
    protected function matchRole($user) {
       if(empty($this->roles)){
           return true;
       }
       foreach ($this->roles as $role){
           if($role === '?'){
               if($user->getIsGuest()){
                   return true;
               }
           }else if($role==='@'){
               if(!$user->getIsGuest()){
                   return true;
               }
           }else if(!$user->getIsGuest() && $role === $user->identity->role){
               return true;
           }
       }
       return false;
    }
}