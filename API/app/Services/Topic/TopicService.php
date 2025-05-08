<?php
namespace App\Services\Topic;

use App\Models\Topic;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use Illuminate\Http\Request;

class TopicService
{

    public function __construct(protected TopicRepositoryInterface $topicRepository) { }

    public function all($request)
    {
        return $this->topicRepository->all($request);
    }


    public function create(Request $request)
    {

        return $this->topicRepository->create($request);
    }

    public function update(Request $request, $topic)
    {
        return $this->topicRepository->update($request, $topic);
    }


    public function delete(Topic $topic)
    {
        return $this->topicRepository->delete($topic);
    }

}
