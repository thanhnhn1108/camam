<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Singer;

use App\Http\Requests\CheckForm; 
use Illuminate\Support\Facades\Auth;
class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Singer::with('nguoitao')->get()->sortByDesc("id");
        return view('admin.singer.indexSinger', ['namepage' => 'Ca sĩ'])->with('singers', $data );
    }

    /**
     * Show the form for creating a new resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.singer.createSinger', ['namepage' => 'Ca sĩ']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckForm $request)
    {
        $singer = new Singer;
        $singer->singername = $request->singername;
        $singer->note = $request->note;
        $singer->active = $request->active ? 1 : 0 ?? 0;
        $singer->user_id = Auth::user()->id;
        $singer->save();
        return redirect()->route('singer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.singer.editSinger')->with('singers', Singer::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $singer = Singer::find($id);
        $singer->singername = $request->singername;
        $singer->note = $request->note;
        $singer->active = $request->active ? 1 : 0 ?? 0;
        $singer->save();
        return redirect()->route('singer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singer = Singer::find($id);
        $singer->delete();
        return redirect()->route('singer.index');
    }
}
