<?php
namespace App\Services\Template;

use App\Http\Requests\TemplateRequest;
use App\Models\Template;
use App\Repositories\Interfaces\TemplateRepositoryInterface;
use Illuminate\Http\Request;

class TemplateService
{

    public function __construct(protected TemplateRepositoryInterface $templateRepository) { }

    public function all($request)
    {
        return $this->templateRepository->all($request);
    }


    public function create(TemplateRequest $request)
    {

        return $this->templateRepository->create($request);
    }

    public function update(Request $request, $template)
    {
        return $this->templateRepository->update($request, $template);
    }


    public function delete(Template $template)
    {
        return $this->templateRepository->delete($template);
    }

}
