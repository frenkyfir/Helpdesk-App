<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Channel;
use App\Models\Priority;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];
    // public $table = "Ticket";
    protected $primaryKey = 'ticket_id';

    protected $dates = [
        'duedate',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/posts/' . $image),
        );
    }



    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function priorities()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function channels()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ticket_id');
    }
}
