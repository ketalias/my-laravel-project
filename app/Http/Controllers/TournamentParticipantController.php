<?php

namespace App\Http\Controllers;

use App\Models\TournamentParticipant;
use Illuminate\Http\Request;

class TournamentParticipantController extends Controller
{
    public function index()
    {
        $participants = TournamentParticipant::all();

        return view('participants.index', compact('participants'));
    }



    public function create()
    {
        return view('participants.create'); // Show the form
    }

    public function store(Request $request)
    {
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

        $participantScores = $participant->scores;
        return view('participants.show', compact('participant', 'participantScores'));
    }

    public function edit($id)
    {
        $participant = TournamentParticipant::find($id);

        if (!$participant) {
            return redirect()->route('participants.index')->with('error', 'Participant not found');
        }

        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, $id)
    {
        $participant = TournamentParticipant::find($id);

        if (!$participant) {
            return redirect()->route('participants.index')->with('error', 'Учасника не знайдено');
        }

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


    public function destroy(TournamentParticipant $participant)
    {
        $participant->delete();

        return redirect()->route('participants.index');
    }
}
