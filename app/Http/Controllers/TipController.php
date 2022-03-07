<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipRequest;
use App\Http\Requests\UpdateTipRequest;
use App\Models\Tip;
use App\Models\vehicle\Brand;
use App\Models\vehicle\Type;
use Illuminate\Support\Facades\Auth;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tip::all();
        $types = Type::all();
        return view('admin.tips.index', compact('tips', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipRequest $request)
    {
        $user = Auth::user();

        $user->tips()->create($request->only(['name', 'description', 'brand_id', 'model', 'version']));

        return redirect()->back()->with('success', 'Operação realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function show(Tip $tip)
    {
        return Tip::find($tip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function edit(Tip $tip)
    {
        $types = Type::all();
        return view('admin.tips.edit', compact('tip', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipRequest  $request
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipRequest $request, Tip $tip)
    {
        $tip->update($request->only(['name', 'description', 'brand_id', 'model', 'version']));
        return redirect()->route('tips.index')->with('success', 'Operação realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tip  $tip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip)
    {
        $tip->delete();
        return redirect()->route('tips.index')->with('success', 'Operação realizada com sucesso!');
    }
}
