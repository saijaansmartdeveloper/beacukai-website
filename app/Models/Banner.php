<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_banner',
        'description_banner',
        'image_banner',
        'priority_banner',
        'is_active_banner',
        'creator_id'
    ];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->title_banner, 'type' => __('banner.banner'),
        ]);
        $link = '<a href="'.route('banners.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->title_banner;
        $link .= '</a>';

        return $link;
    }

    public function getStatusBannerAttribute()
    {
        $label = "";
        if ($this->is_active_banner == 1) {
            $label = '<span class="badge badge-primary">Aktif</span>';
        } else {
            $label = '<span class="badge badge-danger">Tidak Aktif</span>';
        }

        return $label;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
