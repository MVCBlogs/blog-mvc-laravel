<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
 
class Comment extends Model
{
    //attributes id, post_id,message, stars, created_at, updated_at
    protected $fillable = ['post_id','message'];
 
    public function getId()
    {
        return $this->attributes['id'];
    }
 
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getPostId()
    {
        return $this->attributes['post_id'];
    }
 
    public function setPostId($pId)
    {
        $this->attributes['post_id'] = $pId;
    }
    public function getMessage()
    {
        return $this->attributes['message'];
    }
 
    public function setMessage($message)
    {
        $this->attributes['message'] = $message;
    }

    public function getStars()
    {
        return $this->attributes['stars'];
    }
 
    public function setStars($star)
    {
        $this->attributes['stars'] = $star;
    }
 
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public static function validate(Request $request){
        $request->validate([
            "post_id" => "required|numeric|gt:0",
            "message" => "required",
        ]);
    }
}
