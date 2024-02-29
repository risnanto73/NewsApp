<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data category berdasarkan data terbaru
        $title = 'Category Index';
        $category = Category::latest()->paginate(2);


        return view('home.category.index', compact('title', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // title untuk halaman create
        $title = 'Category Create';

        return view('home.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // melakukan upload image
        $image = $request->file('image');
        // menyimpan image yang 
        // diupload ke folder 
        // storage/app/public/category
        // fungsi hashName untuk generate nama yang unik
        // fungsi getClientOriginalName 
        // itu menggunakan nama asli dari image
        $image->storeAs('public/category', $image->hashName());

        //melakukan insert data ke table category dengan kondisi if else
        if(Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image->hashName()
        ])){
            //jika berhasil direct ke category.index
            return redirect()->route('category.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //jika gagal direct ke category.index
            return redirect()->route('category.index')->with(['error' => 'Data Gagal Disimpan!']);
        }



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
        //title untuk halaman edit
        $title = 'Category Edit';

        //mengambil data category berdasarkan id
        $category = Category::find($id);
        return view('home.category.edit', compact('title', 'category'));
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
        //melakukan validasi data
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //mengambil data category berdasarkan id
        $category = Category::find($id);

        //kondisi jika image kosong
        if($request->file('image') == "") {

            //update data tanpa image
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

        } else {

            //hapus old image dengan basename
            // function basename itu untuk mengambil data sesuai dengan nama file
            Storage::disk('local')->delete('public/category/' .basename($category->image));

            //upload new image
            $image = $request->file('image');

            // function storeAs itu untuk upload image
            // dengan nama yang baru dan unique dari hashName
            $image->storeAs('public/category', $image->hashName());

            //update dengan image baru
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image->hashName()
            ]);

        }

        //jika berhasil direct ke category.index
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
