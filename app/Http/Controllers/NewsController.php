<?php

namespace App\Http\Controllers;
use App\news;
use App\Exports\NewsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = news::when($request->search, function($query) use($request){
            $query->where('judul_news', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('news.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'judul_news'=>'required',
            'potongan_news'=>'required',
            'isi_news' => 'required',
            'tgl_news'=>'required',
            'gambar' => 'required|image|max:2048'
        ]);
     
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);
     
     
        News::create([
            'judul_news' => $request->judul_news,
            'potongan_news' => $request->potongan_news,
            'isi_news' => $request->isi_news,
            'tgl_news' => $request->tgl_news,
            'gambar' => $nama_file,
        ]);

        
        return redirect('/news')->with('success', 'Data is succesfully Added.');
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
        $news = news::findOrFail($id);
        return view('news.edit', compact('news'));
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
        $nama_file = $request->hidden_image;
        $file = $request->file('gambar');

        if ($file !='') {
                $this->validate($request, [
                'gambar' => 'required|image|max:2048',
                'judul_news'=>'required',
                'potongan_news'=>'required',
                'isi_news' => 'required',
                'tgl_news'=>'required',
            ]);
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'image';
                $file->move($tujuan_upload,$nama_file);
        }else{
            $request->validate([
                'judul_news'=>'required',
                'potongan_news'=>'required',
                'isi_news' => 'required',
                'tgl_news'=>'required',
            ]);
        }

        $form_data = array(
            'judul_news' => $request->judul_news,
            'potongan_news' => $request->potongan_news,
            'isi_news' => $request->isi_news,
            'tgl_news' => $request->tgl_news,
            'gambar' => $nama_file,
        );
        news::where('id_news',$id)->update($form_data);
        return redirect('/news')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = news::findOrFail($id);
        $delete->delete();
        return redirect('/news')->with('success', 'Data is succesfully deleted.');
    }
    public function export(Request $request)
    {
        return Excel::download(new NewsExport, 'news-'.date("Y-m-d").'.xlsx');
    }
}
