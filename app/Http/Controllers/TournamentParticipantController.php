<?php

namespace App\Http\Controllers;

use App\Models\TournamentParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TournamentParticipantController extends Controller
{
    public function __construct()
    {
        // Додайте перевірку доступу до створення учасника
        $this->middleware('can:create-participant')->only('create', 'store');
    }
    public function index()
    {
        $participants = TournamentParticipant::all();

        if (Gate::denies('view', TournamentParticipant::class)) {
            abort(403, 'You do not have permission to view participants.');
        }

        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $this->authorize('create', TournamentParticipant::class); // або Gate::denies

        return view('participants.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', TournamentParticipant::class);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'age' => 'required|integer|min:0',
            'country' => 'required|string|max:255',
            'scores' => 'nullable|string',
        ]);

        TournamentParticipant::create($data);

        return redirect()->route('participants.index')->with('success', 'Учасника додано успішно!');
    }

    public function show($id)
    {
        $participant = TournamentParticipant::find($id);

        if (!$participant) {
            return redirect()->route('participants.index')->with('error', 'Participant not found');
        }

        $this->authorize('view', $participant);

        $participantScores = $participant->scores;
        return view('participants.show', compact('participant', 'participantScores'));
    }

    public function edit($id)
    {
        $participant = TournamentParticipant::find($id);

        if (!$participant) {
            return redirect()->route('participants.index')->with('error', 'Participant not found');
        }

        $this->authorize('update', $participant);

        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, $id)
    {
        $participant = TournamentParticipant::find($id);

        if (!$participant) {
            return redirect()->route('participants.index')->with('error', 'Учасника не знайдено');
        }

        $this->authorize('update', $participant);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'age' => 'required|integer|min:0',
            'country' => 'required|string|max:255',
            'scores' => 'nullable|string',
        ]);

        $participant->update($data);

        return redirect()->route('participants.index')->with('success', 'Дані учасника оновлені');
    }

    public function delete(TournamentParticipant $participant)
    {
        $this->authorize('delete', $participant);

        $participant->delete();

        return redirect()->route('participants.index');
    }
}

