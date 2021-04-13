<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model{
    use HasFactory;

        //attributes id, name, description, comment, created_at, updated_at
        protected $fillable = ['name','description'];

        public function getId()
    {
        return $this->attributes['id'];
    }
 
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
 
    public function getName()
    {
        return $this->attributes['name'];
    }
 
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    public function getDescription()
    {
        return $this->attributes['description'];
    }
 
    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }
    public function getComment()
    {
        return $this->attributes['comment'];
    }
 
    public function setComment($comment)
    {
        $this->attributes['comment'] = $comment;
        
    }
    public function getDate()
    {
        return $this->attributes['created_at'];
    }
 
    public function setDate($date)
    {
        $this->attributes['created_at'] = $date;
        
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public static function validate(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);
    }
 
}