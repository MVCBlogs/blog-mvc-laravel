<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
 
class Comment extends Model
{
    //attributes id, post_id, message, created_at, updated_at
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

    public function getCommentDate()
    {
        return $this->attributes['created_at'];
    }

    public function setCommentDate($commentDate)
    {
        $this->attributes['created_at'] = $commentDate;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "post_id" => "required|numeric|gt:0",
            "message" => "required",
        ]);
    }
}
