<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Message;
        // $datas = Message::all();
        //untuk menangkap isian kata kunci pencarian
        $keyword = $request->get('search');

        $datas = Message::where('isi_chat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('chat_status', 'LIKE', '%' . $keyword . '%')
            ->paginate();

        $datas->withPath('message');
        $datas->appends($request->all());
        return view('message.index', compact(
            'datas', 'model', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Message;
        return view('message.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $model= new Message;
        $model->customer_id =$request->get('customer_id');
        $model->isi_chat =$request->get('isi_chat');
        $model->tanggal_waktu =$request->get('tanggal').' '.$request->get('jam');
        $model->chat_previous =$request->get('chat_previous');
        $model->chat_status =$request->get('chat_status');
        $model->created_by = Auth::id();
        $model->updated_by = Auth::id();
        $model->save();

        return redirect('message')->with('success', 'Data berhasil ditambahkan');
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
        $model = Message::find($id); //SELECT * FROM barang WHERE id=...
        return view('message.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, $id)
    {
        $model= Message::find($id);
        $model->customer_id =$request->get('customer_id');
        $model->isi_chat =$request->get('isi_chat');
        $model->tanggal_waktu =$request->get('tanggal').' '.$request->get('jam');
        $model->chat_previous =$request->get('chat_previous');
        $model->chat_status =$request->get('chat_status');
        $model->created_by = Auth::id();
        $model->updated_by = Auth::id();
        $model->save();

        return redirect('message')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Message::find($id);
        $model->delete();
        return redirect('message');
    }
}
