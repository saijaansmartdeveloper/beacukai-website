<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = ['name_survey', 'description_survey', 'tahun_survey','is_active_survey', 'file_survey','creator_id'];

    public function getTitleLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'title' => $this->name_survey, 'type' => __('survey.survey'),
        ]);
        $link = '<a href="'.route('surveys.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name_survey;
        $link .= '</a>';

        return $link;
    }

    public function getStatusAttribute()
    {
        $label = "";
        if ($this->is_active_survey == 1) {
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
