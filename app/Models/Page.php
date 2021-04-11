<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name_page', 'description_page', 'content_page', 'image_page', 'creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->name_page, 'type' => __('page.page'),
        ]);
        $link = '<a href="'.route('pages.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name_page;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
