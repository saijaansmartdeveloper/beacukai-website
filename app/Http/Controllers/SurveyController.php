<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the survey.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $surveyQuery = Survey::query();
        $surveyQuery->where('name_survey', 'like', '%'.$request->get('q').'%');
        $surveyQuery->orderBy('name_survey');
        $surveys = $surveyQuery->paginate(25);

        return view('surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new survey.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Survey);

        return view('surveys.create');
    }

    /**
     * Store a newly created survey in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Survey);

        $newSurvey = $request->validate([
            'name_survey'       => 'required|max:60',
            'description_survey'=> 'nullable',
            'tahun_survey'      => 'nullable',
            'is_active_survey'  => 'numeric'
        ]);

        $newSurvey['creator_id'] = auth()->id();

        if ($request->hasFile('file_survey')) {
            $filename = time() . '.' . $request->file('file_survey')->extension();
            $newSurvey['file_survey'] = $request->file('file_survey')->storeAs('survey', $filename, 'public');
        }

        $survey = Survey::create($newSurvey);

        return redirect()->route('surveys.show', $survey);
    }

    /**
     * Display the specified survey.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\View\View
     */
    public function show(Survey $survey)
    {
        return view('surveys.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified survey.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\View\View
     */
    public function edit(Survey $survey)
    {
        $this->authorize('update', $survey);

        return view('surveys.edit', compact('survey'));
    }

    /**
     * Update the specified survey in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Survey $survey)
    {
        $this->authorize('update', $survey);

        $surveyData = $request->validate([
            'name_survey'       => 'required|max:60',
            'description_survey'=> 'nullable',
            'tahun_survey'      => 'nullable',
            'is_active_survey'  => 'numeric'
        ]);

        if ($request->hasFile('file_survey')) {
            $filename = time() . '.' . $request->file('file_survey')->extension();
            $surveyData['file_survey'] = $request->file('file_survey')->storeAs('survey', $filename, 'public');
        }

        $survey->update($surveyData);

        return redirect()->route('surveys.show', $survey);
    }

    /**
     * Remove the specified survey from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Survey $survey)
    {
        $this->authorize('delete', $survey);

        $request->validate(['survey_id' => 'required']);
        @unlink('storage/' . $survey->file_survey);
        if ($request->get('survey_id') == $survey->id && $survey->delete()) {
            return redirect()->route('surveys.index');
        }

        return back();
    }
}
