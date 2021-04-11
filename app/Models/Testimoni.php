<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimonis';

    protected $fillable = ['name_testimoni', 'company_testimoni', 'testimoni','creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->name_testimoni, 'type' => __('testimoni.testimoni'),
        ]);
        $link = '<a href="'.route('testimonis.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name_testimoni;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
