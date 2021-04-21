<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_post',
        'content_post',
        'image_post',
        'slug',
        'priority',
        'creator_id'
    ];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->title_post, 'type' => __('post.post'),
        ]);
        $link = '<a href="'.route('posts.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->title_post;
        $link .= '</a>';

        return $link;
    }

    public function getDescriptionAttribute()
    {
        $title = substr($this->content_post, 1, 100);

        return $title;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
