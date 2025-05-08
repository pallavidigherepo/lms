<?php

namespace App\Imports;

use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class TopicImport implements ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError
{
    use Importable, SkipsErrors;
    private $isDemo;
    private $chapter;

    public function __construct(int $chapterId, bool $demo = false)
    {
        $this->isDemo = $demo;
        $this->chapter = Chapter::findOrFail($chapterId);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }


    public function model(array $row)
    {
        $tags = explode(',', $row['tags']);

        $inputs = [
            'label' => json_encode($row['label']),
            'description' => json_encode($row['description']),
            'board_id' => $this->chapter->board_id,
            'standard_id' => $this->chapter->standard_id,
            'parent_id' => $this->chapter->id,
            'icon' => $row['icon'],
            'language_id' => $row['language_id'],
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        $topic = Topic::create($inputs);
        $topic->detachTags($tags);
        $topic->attachTags($tags);
    }

    public function rules(): array
    {
        return [
            'label' => 'required|unique:subjects',
            // Above is alias for as it always validates in batches
            '*.label' => 'required|unique:subjects',

            // Can also use callback validation rules
            'description' => 'required',
            '*.description' => 'required'
        ];
    }

    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
