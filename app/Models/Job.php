<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    //add new tag for this Job
    public function tag(string $name){
        $tag = Tag::firstOrCreate(['name'=>$name]);

        $this->tags()->attach($tag);
    }
    
    //get all tags of this Job
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
