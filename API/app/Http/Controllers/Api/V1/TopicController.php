<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ChapterRequest;
use App\Http\Resources\TopicResource;
use App\Models\Chapter;
use App\Models\Language;
use App\Models\Subject;
use App\Models\Topic;
use App\Services\Topic\TopicService;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct(protected TopicService $topicService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all list
        return $this->topicService->all($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        if (!$this->topicService->delete($topic)) {
            return response()->json(['message' => 'There are a few errors in form. Please check again.'], 403);
        }
        return response()->json(['message' => 'Information deleted Successfully'], 201);
    }

    public function list() {
        //echo "aasdasd";
        //$chapters =  $this->belongsTo(Subject::class)->with('chapter');
        $chapters = Topic::with('chapters')->get()->pluck('id', 'label');
        dd($chapters);
       
    }
}
