<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Guild;

class MemberController extends Controller
{
    public function index() {
        $members = Member::with('guild')->get();

        return view('members.index', [
            'members' => $members
        ]);
    }

    public function create() {
        $guilds = Guild::all();

        return view('members.create', [
            'guilds' => $guilds
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'guild_id' => 'required|integer|exists:guilds,id',
            'username' => 'required|string|max:150',
            'level' => 'required|integer|min:1|max:100',
            'role' => 'required|in:Recruit,Officer,Leader',
            'contributionPoints' => 'required|integer|min:1'
        ]);

        Member::create($validated);

        return redirect()->route('members.index');
    }

    public function edit(Member $member) {
        $guilds = Guild::all();

        return view('members.edit', [
            'member' => $member,
            'guilds' => $guilds
        ]);
    }

    public function update(Request $request, Member $member) {
        $validated = $request->validate([
            'guild_id' => 'required|integer|exists:guilds,id',
            'username' => 'required|string|max:150',
            'level' => 'required|integer|min:1|max:100',
            'role' => 'required|in:Recruit,Officer,Leader',
            'contributionPoints' => 'required|integer|min:1'
        ]);

        $member->update($validated);

        return redirect()->route('members.index');
    }

    public function destroy(Member $member) {
        $member->delete();

        return redirect()->route('members.index');
    }
}