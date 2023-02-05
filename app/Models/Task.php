<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [ 
    	'project_id','user_id', 'task_title', 'task_desc' , 'assigned_by', 'duedate','status','created_by'
     ] ;

    

     public function project() {
     	return $this->belongsTo(project::class) ;
     }

     public function user() {
         return $this->belongsTo(user::class) ;
     }

     public function assignee(){
        return $this->belongsTo(user::class,'assigned_by') ;
     }

     public function creator(){
        return $this->belongsTo(user::class,'created_by') ;
     }

}
