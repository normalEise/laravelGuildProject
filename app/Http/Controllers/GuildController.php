<?php

namespace App\Http\Controllers;


use App\Models\Guild;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function index() {
        $guilds = Guild::all();

        return view('guilds.index', [
            'guilds' => $guilds
        ]);
    }

    public function create() {
        return view('guilds.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'server' => 'required|in:Europe,America,Asia,Oceania',
            'level' => 'required|integer|min:1|max:100'
        ]);

        Guild::create($validated);

        return redirect()->route('guilds.index');
    }

    public function edit(Guild $guild) {
        return view('guilds.edit', [
            'guild' => $guild
        ]);
    }

    public function update(Request $request, Guild $guild) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'server' => 'required|in:Europe,America,Asia,Oceania',
            'level' => 'required|integer|min:1|max:100'
        ]);

        $guild->update($validated);

        return redirect()->route('guilds.index');
    }

    public function destroy(Guild $guild) {
        $guild->delete();

        return redirect()->route('guilds.index');
    }
}
