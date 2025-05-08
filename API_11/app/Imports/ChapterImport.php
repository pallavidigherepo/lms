<?php

namespace App\Imports;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class ChapterImport implements ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError
{

    use Importable, SkipsErrors;
    private $subject;

    public function __construct(int $id)
    {
        $subject = Subject::findOrFail($id);
        $this->subject = $subject;
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

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tags = explode(',', $row['tags']);
        $inputs = [
            'parent_id' => $this->subject->id,
            'label' => json_encode($row['label']),
            'description' => json_encode($row['description']),
            'board_id' => $this->subject->board_id,
            'standard_id' => $this->subject->standard_id,
            'icon' => $row['icon'],
            'language_id' => $row['language_id'],
            'tags' => $tags,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        $chapter = Chapter::create($inputs);

        $chapter->attachTags($tags);
        return $chapter;
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
