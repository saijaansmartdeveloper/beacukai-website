<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siring extends Model
{
    use HasFactory;

    protected $table = 'sirings';

    protected $fillable = ['name_siring', 'description_siring', 'link_siring','icon_siring', 'is_priority', 'creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->name_siring, 'type' => __('siring.siring'),
        ]);
        $link = '<a href="'.route('sirings.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name_siring;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
