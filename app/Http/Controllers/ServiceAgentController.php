<?php

namespace App\Http\Controllers;

use App\Http\Requests\Agent\Service\StoreServiceAgentRequest;
use App\Http\Requests\Agent\Service\UpdateServiceAgentRequest;
use App\Models\ServiceAgent;
use App\Services\Agent\AgentService;

class ServiceAgentController extends Controller
{
    protected $service_agent;

    public function __construct()
    {
        $this->service_agent = new AgentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_agents = $this->service_agent->index();
        return view('admin.agent.service.index', compact('service_agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agent.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceAgentRequest $request)
    {
        $service_agent = $this->service_agent->store($request->validated());

        if ($service_agent) {
            session()->flash('success', 'Create new agent.');
            return redirect()->route('service-agents.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceAgent $service_agent)
    {
        return view('admin.agent.service.show', compact('service_agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceAgent $service_agent)
    {
        return view('admin.agent.service.edit', compact('service_agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceAgentRequest $request, ServiceAgent $service_agent)
    {
        $update = $this->service_agent->update($request->validated(), $service_agent);

        if ($update) {
            session()->flash('success', 'Agent updated successfully');
        } else {
            session()->flash('error', 'Agent does not update successfully');
            return redirect()->back()->withInput();
        }

        return redirect()->route('service-agents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceAgent $service_agent)
    {
        $delete = $this->service_agent->softDelete($service_agent);

        if ($delete) {
            session()->flash('success', 'Agent deleted successfully');
        } else {
            session()->flash('error', 'Agent does not delete successfully');
        }

        return redirect()->route('service-agents.index');
    }
}
