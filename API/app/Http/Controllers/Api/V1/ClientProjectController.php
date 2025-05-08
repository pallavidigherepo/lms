<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ClientProject;
use App\Http\Requests\StoreClientProjectRequest;
use App\Http\Requests\UpdateClientProjectRequest;

class ClientProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientProject $clientProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientProjectRequest $request, ClientProject $clientProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientProject $clientProject)
    {
        //
    }
}
