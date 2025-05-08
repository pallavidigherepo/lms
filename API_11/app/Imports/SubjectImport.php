<?php

namespace App\Imports;

use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubjectImport implements ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnError
{
    use Importable, SkipsErrors;

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
        $standard = Standard::where('name', 'like', '%' . $row['standard'] . '%')->first();
        $inputs = [
            'label' => json_encode($row['label']),
            'description' => json_encode($row['description']),
            'board_id' => 1,
            'standard_id' => $standard->id,
            'icon' => $row['icon'],
            'language_id' => 1,
            'tags' => $tags,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        $subject = Subject::create($inputs);

        $subject->attachTags($tags);
        return $subject;
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
        return false;
    }
}
