<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $channels = channel::all();
        $channels = channel::orderByDesc('channel_id')->get();
        return view('index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $channels = channel::all();
        return view('channels.create', compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'channel_name' => 'required',
            'description' => 'required',
            'subscriberscount' => 'required',
            'url' => 'required',
        ]);
        $channel = new channel();
        $channel->channel_name = $validator['channel_name'];
        $channel->description = $validator['description'];
        $channel->subscriberscount = $validator['subscriberscount'];
        $channel->url = $validator['url'];
        $channel->save();
        return redirect()->route('channels.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        $channels = channel::all();
        return view('channels.edit', compact('channel', 'channels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $channel_id)
    {
        $validator = $request->validate([
            'channel_name' => 'required',
            'description' => 'required',
            'subscriberscount' => 'required',
            'url' => 'required',
        ]);
        $channel = channel::find($channel_id);
        $channel->channel_name = $validator['channel_name'];
        $channel->description = $validator['description'];
        $channel->subscriberscount = $validator['subscriberscount'];
        $channel->url = $validator['url'];
        $channel->save();
        return redirect()->route('channels.index')->with('success', 'Sửa thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        return redirect()->route('channels.index')->with('success', 'Xóa thành công!');

    }
}
