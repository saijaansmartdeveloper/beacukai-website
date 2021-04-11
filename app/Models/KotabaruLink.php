<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotabaruLink extends Model
{
    use HasFactory;

    protected $fillable = ['title_link', 'description_link', 'external_link', 'image_link','creator_id'];

    public function getTitleLinkAnchorAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->title_link, 'type' => __('kotabaru_link.kotabaru_link'),
        ]);
        $link = '<a href="'.route('kotabaru_links.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->title_link;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
