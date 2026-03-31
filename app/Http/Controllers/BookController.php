<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display home page with book covers.
     */
    public function home()
    {
        $books = Book::with('category')->get();
        return view('home', compact('books'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::with('category');

        // SEARCH BERDASARKAN JUDUL
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // FILTER BERDASARKAN CATEGORY
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->get();
        $categories = Category::all();

        // Total book berdasarkan hasil filter
        $totalBooks = $books->count();

        // Total book per category (global)
        $totalPerCategory = Category::withCount('books')->get();

        return view('books.index', compact(
            'books',
            'categories',
            'totalBooks',
            'totalPerCategory'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|numeric',
            'judul'         => 'required',
            'penulis'       => 'required',
            'tahun_terbit'  => 'required|numeric',
            'stok'          => 'required|numeric',
            'cover_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis'      => 'nullable|string',
            'penerbit'      => 'nullable|string',
            'pengarang'     => 'nullable|string'
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $imageName = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('storage/covers'), $imageName);
            $data['cover_image'] = 'covers/' . $imageName;
        }

        Book::create($data);

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id'   => 'required|numeric',
            'judul'         => 'required',
            'penulis'       => 'required',
            'tahun_terbit'  => 'required|numeric',
            'stok'          => 'required|numeric',
            'cover_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis'      => 'nullable|string',
            'penerbit'      => 'nullable|string',
            'pengarang'     => 'nullable|string'
        ]);

        $book = Book::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            // Hapus gambar lama jika ada
            if ($book->cover_image && file_exists(public_path('storage/' . $book->cover_image))) {
                unlink(public_path('storage/' . $book->cover_image));
            }

            $imageName = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('storage/covers'), $imageName);
            $data['cover_image'] = 'covers/' . $imageName;
        }

        $book->update($data);

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil dihapus');
    }
}