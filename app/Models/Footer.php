<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'deskripsi_instansi',
        'email_instansi',
        'web_instansi',
        'telp_instansi',
        'alamat_instansi',
        'maps_instansi',
        'jam_kerja_instansi',
        'creator_id'
    ];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->nama_instansi, 'type' => __('footer.footer'),
        ]);
        $link = '<a href="'.route('footers.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->nama_instansi;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
