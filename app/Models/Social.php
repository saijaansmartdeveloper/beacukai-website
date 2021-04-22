<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = ['title_social', 'description_social', 'icon_social', 'link_social','creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->title_social, 'type' => __('social.social'),
        ]);
        $link = '<a href="'.route('socials.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->title_social;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
