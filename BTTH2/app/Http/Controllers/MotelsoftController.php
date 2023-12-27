<?php

namespace App\Http\Controllers;

use App\Models\Motelsoft;
use Illuminate\Http\Request;

class MotelsoftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motelsofts = motelsoft::all();
        $motelsofts = motelsoft::orderByDesc('maphong')->get();
        return view('index', compact('motelsofts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motelsofts = motelsoft::all();
        return view('motelsofts.create', compact('motelsofts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'tenkhach' => 'required',
            'cccd' => 'required',
            'thoigiannhanphong' => 'required',
            'thoigiantraphong' => 'required',
            'sogiothue' => 'required',
            'dongiatheogio' => 'required',
            'tongtien' => 'required',
        ]);
        $motelsoft = new motelsoft();
        $motelsoft->tenkhach = $validator['tenkhach'];
        $motelsoft->cccd = $validator['cccd'];
        $motelsoft->thoigiannhanphong = $validator['thoigiannhanphong'];
        $motelsoft->thoigiantraphong = $validator['thoigiantraphong'];
        $motelsoft->sogiothue = $validator['sogiothue'];
        $motelsoft->dongiatheogio = $validator['dongiatheogio'];
        $motelsoft->tongtien = $validator['tongtien'];

        $motelsoft->save();
        return redirect()->route('motelsofts.index')->with('success', 'Thêm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Motelsoft $motelsoft)
    {
        return view('motelsofts.show', compact('motelsoft'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motelsoft $motelsoft)
    {
        $motelsofts = motelsoft::all();
        return view('motelsofts.edit', compact('motelsoft', 'motelsofts'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $maphong)
    {
        $validator = $request->validate([
            'tenkhach' => 'required',
            'cccd' => 'required',
            'thoigiannhanphong' => 'required',
            'thoigiantraphong' => 'required',
            'sogiothue' => 'required',
            'dongiatheogio' => 'required',
            'tongtien' => 'required',
        ]);
        $motelsoft = motelsoft::find($maphong);
        $motelsoft->tenkhach = $validator['tenkhach'];
        $motelsoft->cccd = $validator['cccd'];
        $motelsoft->thoigiannhanphong = $validator['thoigiannhanphong'];
        $motelsoft->thoigiantraphong = $validator['thoigiantraphong'];
        $motelsoft->sogiothue = $validator['sogiothue'];
        $motelsoft->dongiatheogio = $validator['dongiatheogio'];
        $motelsoft->tongtien = $validator['tongtien'];

        $motelsoft->save();
        return redirect()->route('motelsofts.index')->with('success', 'Sửa thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motelsoft $motelsoft)
    {
        $motelsoft->delete();
        return redirect()->route('motelsofts.index')->with('success', 'Xóa thành công!');

    }
}
