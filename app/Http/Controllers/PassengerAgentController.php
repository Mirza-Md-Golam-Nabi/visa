<?php

namespace App\Http\Controllers;

use App\Services\Agent\AgentPassenger;
use App\Http\Requests\Agent\Passenger\StorePassengerAgentRequest;
use App\Http\Requests\Agent\Passenger\UpdatePassengerAgentRequest;
use App\Models\PassengerAgent;

class PassengerAgentController extends Controller
{
    protected $passenger_agent;

    public function __construct()
    {
        $this->passenger_agent = new AgentPassenger();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passenger_agents = $this->passenger_agent->index();
        return view('admin.agent.passenger.index', compact('passenger_agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agent.passenger.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerAgentRequest $request)
    {
        $passenger_agent = $this->passenger_agent->store($request->validated());

        if ($passenger_agent) {
            session()->flash('success', 'Create new agent.');
            return redirect()->route('passenger-agents.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(PassengerAgent $passenger_agent)
    {
        return view('admin.agent.passenger.show', compact('passenger_agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PassengerAgent $passenger_agent)
    {
        return view('admin.agent.passenger.edit', compact('passenger_agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePassengerAgentRequest $request, PassengerAgent $passenger_agent)
    {
        $update = $this->passenger_agent->update($request->validated(), $passenger_agent);

        if ($update) {
            session()->flash('success', 'Agent updated successfully');
        } else {
            session()->flash('error', 'Agent does not update successfully');
            return redirect()->back()->withInput();
        }

        return redirect()->route('passenger-agents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PassengerAgent $passenger_agent)
    {
        $delete = $this->passenger_agent->softDelete($passenger_agent);

        if ($delete) {
            session()->flash('success', 'Agent deleted successfully');
        } else {
            session()->flash('error', 'Agent does not delete successfully');
        }

        return redirect()->route('passenger-agents.index');
    }
}
