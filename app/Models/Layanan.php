<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = ['nama_layanan', 'jenis_layanan','waktu_layanan','estimasi_layanan','biaya_layanan', 'creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->nama_layanan, 'type' => __('layanan.layanan'),
        ]);
        $link = '<a href="'.route('layanans.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->nama_layanan;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
