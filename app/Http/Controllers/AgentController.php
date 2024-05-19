<?php

namespace App\Http\Controllers;

use App\Enum\AgentGroupEnum;
use App\Enum\AgentTypeEnum;
use App\Enum\GenderEnum;
use App\Http\Requests\Agent\StoreAgentRequest;
use App\Http\Requests\Agent\UpdateAgentRequest;
use App\Models\Agent;
use App\Models\District;
use App\Models\Division;
use App\Services\Agent\AgentService;

class AgentController extends Controller
{
    protected $agent;

    public function __construct()
    {
        $this->agent = new AgentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = $this->agent->index();
        return view('admin.agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agent_types = AgentTypeEnum::cases();
        $agent_groups = AgentGroupEnum::cases();
        $genders = GenderEnum::cases();
        $divisions = Division::orderBy('name', 'asc')->get();

        return view('admin.agent.create', compact('agent_types', 'agent_groups', 'genders', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgentRequest $request)
    {
        $agent = $this->agent->store($request->validated());

        if ($agent) {
            session()->flash('success', 'Create new agent.');
            return redirect()->route('agents.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        $agent->load('division', 'district');
        return view('admin.agent.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        $agent_types = AgentTypeEnum::cases();
        $agent_groups = AgentGroupEnum::cases();
        $genders = GenderEnum::cases();
        $divisions = Division::orderBy('name', 'asc')->get();
        $districts = District::where('division_id', $agent->division_id)
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.agent.edit', compact('agent', 'agent_types', 'agent_groups', 'genders', 'divisions', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $update = $this->agent->update($request->validated(), $agent);

        if ($update) {
            session()->flash('success', 'Agent updated successfully');
        } else {
            session()->flash('error', 'Agent does not update successfully');
            return redirect()->back()->withInput();
        }

        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        $delete = $this->agent->softDelete($agent);

        if ($delete) {
            session()->flash('success', 'Agent deleted successfully');
        } else {
            session()->flash('error', 'Agent does not delete successfully');
        }

        return redirect()->route('agents.index');
    }
}
