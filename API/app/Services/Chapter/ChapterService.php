<?php
namespace App\Services\Chapter;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Repositories\Interfaces\ChapterRepositoryInterface;
use Illuminate\Http\Request;

class ChapterService
{

    public function __construct(protected ChapterRepositoryInterface $chapterRepository) { }

    public function all($request)
    {
        return $this->chapterRepository->all($request);
    }


    public function create(ChapterRequest $request)
    {

        return $this->chapterRepository->create($request);
    }

    public function edit($request, $chapter)
    {
        return $this->chapterRepository->update($request, $chapter);
    }
    public function update(Request $request, $chapter)
    {
        // if (!$request->validated()) {
        //     return false;
        // }

        return $this->chapterRepository->update($request, $chapter);
    }


    public function delete(Chapter $chapter)
    {
        return $this->chapterRepository->delete($chapter);
    }

}
