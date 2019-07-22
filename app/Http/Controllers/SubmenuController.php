<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Menu;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Submenu Management';
        $menu = Menu::all();
        $submenu = Submenu::all();
        $data = array(
            'menu' => $menu,
            'submenu' => $submenu
        );
        return view('/menu/submenu')->with(['title' => $title, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tidak digunakan karena tidak membuka page baru
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'submenu' => 'required',
            'menu' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);

        $submenu = new Submenu();
        $submenu->title = $request->input('submenu');
        $submenu->menu_id = $request->input('menu');
        $submenu->url = $request->input('url');
        $submenu->icon = $request->input('icon');
        $submenu->is_active = $request->input('is_active');
        $submenu->save();

        return redirect('/submenu')->with('success', 'Submenu Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //tidak digunakan karena tidak membuka page baru
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //tidak digunakan karena tidak membuka page baru
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
        $this->validate($request, [
            'submenu' => 'required',
            'menu' => 'required',

        ]);

        $submenu = Submenu::find($id);
        $submenu->title = $request->input('submenu');
        $submenu->url = $request->input('url');
        $submenu->save();

        return redirect('/submenu')->with('success', 'Submenu Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submenu = Submenu::find($id);

        $submenu->delete();
        return redirect('/submenu')->with('success', 'Submenu Deleted');
    }
}
