<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mata_uang', 'nilai', 'perubahan', 'status', 'tanggal_berlaku','creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->nama_mata_uang, 'type' => __('kurs.kurs'),
        ]);
        $link = '<a href="'.route('kurs.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->nama_mata_uang;
        $link .= '</a>';

        return $link;
    }

    public function getStatusUpDownAttribute()
    {
        return ($this->status == 'naik') ? "<span class='glyphicon glyphicon-triangle-top' style='color: green'>$this->perubahan</span>" : '<span class="glyphicon glyphicon-triangle-top" style="color: red">'. $this->perubahan .'</span>';
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
