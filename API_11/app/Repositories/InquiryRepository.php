<?php
namespace App\Repositories;

use App\Models\Inquiry;
use App\Http\Resources\InquiryResource;
use App\Repositories\Interfaces\InquiryRepositoryInterface;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;

class InquiryRepository implements InquiryRepositoryInterface
{
    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return InquiryResource::collection(
            Inquiry::when($request->input('search'), function ($query) {
                $query->where('student_name', 'like', '%' . request('search') . '%');
                $query->orWhere('contact_name', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
    }

    public function create($request)
    {
        if ($request->validated()) {
            $input = $request->toArray();

            $inquiry = Inquiry::create($input);

            $response = [
                'success' => true,
                'message' => 'Inquiry created successfully.',
                'inquiry' => $inquiry,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $inquiryModel = new Inquiry();
        // We need manipulated data of student so that he/she cannot do any kind of cheating.
        //return $studentModel->manipulateStudentInfo(new StudentResource(Student::findOrFail($student->id)));
        return new InquiryResource(Inquiry::findOrFail($inquiry->id));
    }

    public function update($request, $inquiry)
    {
        
        if ($request->validated()) {
            $input = $request->toArray();

            $inquiry->update($input);

            $response = [
                'success' => true,
                'message' => 'Inquiry created successfully.',
                'inquiry' => $inquiry,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    public function delete($inquiry)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        if ($inquiry->delete()) {
            $response = [
                'success' => true,
                'message' => 'Inquiry deleted successfully.',
            ];
        }
        return response()->json($response);
    }
}
