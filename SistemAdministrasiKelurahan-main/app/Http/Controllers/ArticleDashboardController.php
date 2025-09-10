<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use App\ArticleCategory;
use App\ArticleTag;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleDashboardController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->paginate(10);
        return view('dashboard.manajemen_artikel.artikel.artikel', compact('articles'));
    }

    public function create()
    {
        $categories = ArticleCategory::get();
        $tags = ArticleTag::get();
        return view('dashboard.manajemen_artikel.artikel.artikel-tambah', compact('categories', 'tags'));
    }

    /**
     * a) Store
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $thumbnailUrl = null;
        $documentUrl = null;
        $documentName = null;

        // thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail->getSize() <= 3000000) {
                $thumbnailName = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $thumbnail->extension();
                $thumbnailUrl = $thumbnail->storeAs("images/thumbnail", $thumbnailName, 'public');
            }
        }

        // document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            if ($document->getSize() <= 5000000) {
                $documentName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $document->extension();
                $documentUrl = $document->storeAs("document/article_document", $documentName, 'public');
            }
        }

        $attr = $request->validate([
            'category_id' => 'required|numeric',
            'title' => 'required|string',
            'thumbnail' => 'required|image|max:3000',
            'body' => 'required|string',
            'document' => 'file|max:5000',
            'tags' => 'required|array',
        ]);

        $attr['user_id'] = $userId;
        $attr['slug'] = \Str::slug($attr['title']);
        $attr['thumbnail'] = $thumbnailUrl;
        $attr['enabled'] = 1;
        $attr['commentable'] = 1;
        $attr['document'] = $documentName;
        $attr['link_document'] = $documentUrl;

        $article = Article::create($attr);
        $article->tags()->attach($request->tags);

        Alert::success(' Berhasil ', 'Artikel berhasil Ditambahkan');
        return redirect()->route('manajemen-artikel.artikel');
    }

    public function edit(Article $article)
    {
        $categories = ArticleCategory::get();
        $tags = ArticleTag::get();
        $tagCheck = \DB::table('article_article_tag')->where('article_id', $article->id)->pluck('tag_id')->toArray();

        return view('dashboard.manajemen_artikel.artikel.artikel-edit', compact('article', 'categories', 'tags', 'tagCheck'));
    }

    /**
     * b) Update
     */
    public function update(Request $request, Article $article)
    {
        $attr = $request->validate([
            'category_id' => 'required|numeric',
            'title' => 'required|string',
            'thumbnail' => 'image|max:3000',
            'body' => 'required|string',
            'tags' => 'required|array',
            'document' => 'file|max:5000',
        ]);

        $userId = Auth::user()->id;

        $thumbnailUrl = $article->thumbnail;
        $documentUrl = $article->link_document;
        $documentName = $article->document;

        // thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail->getSize() <= 3000000) {
                if ($article->thumbnail) {
                    Storage::disk('public')->delete($article->thumbnail);
                }
                $thumbnailName = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $thumbnail->extension();
                $thumbnailUrl = $thumbnail->storeAs("images/thumbnail", $thumbnailName, 'public');
            }
        }

        // document
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            if ($document->getSize() <= 5000000) {
                if ($article->link_document) {
                    Storage::disk('public')->delete($article->link_document);
                }
                $documentName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $document->extension();
                $documentUrl = $document->storeAs("document/article_document", $documentName, 'public');
            }
        }

        $attr['user_id'] = $userId;
        $attr['slug'] = \Str::slug($attr['title']);
        $attr['thumbnail'] = $thumbnailUrl;
        $attr['document'] = $documentName;
        $attr['link_document'] = $documentUrl;

        $article->update($attr);
        $article->tags()->sync($request->tags);

        Alert::success(' Berhasil ', 'Artikel berhasil Diperbarui');
        return redirect()->route('manajemen-artikel.artikel');
    }

    /**
     * c) Destroy
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();

        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        if ($article->link_document) {
            Storage::disk('public')->delete($article->link_document);
        }

        $article->delete();

        Alert::success(' Berhasil ', 'Artikel berhasil Dihapus');
        return redirect()->route('manajemen-artikel.artikel');
    }

    public function destroySelected(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:articles,id'
        ]);

        $articles = Article::whereIn('id', $request->ids)->get();

        foreach ($articles as $article) {
            // hapus relasi tags
            $article->tags()->detach();

            // hapus file thumbnail
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            // hapus dokumen
            if ($article->link_document) {
                Storage::disk('public')->delete($article->link_document);
            }

            // hapus artikel
            $article->delete();
        }

        Alert::success('Berhasil', 'Artikel terpilih berhasil dihapus');
        return redirect()->route('manajemen-artikel.artikel');
    }

    public function commentActivation(Request $request, Article $article)
    {
        $attr = $request->validate(['commentable' => 'required|boolean']);
        $article->update($attr);

        $message = $request->commentable == 1
            ? 'Komentar artikel berhasil di aktifkan'
            : 'Komentar artikel berhasil di non-aktifkan';

        Alert::success(' Berhasil ', $message);
        return redirect()->route('manajemen-artikel.artikel');
    }

    public function showActivation(Request $request, Article $article)
    {
        $attr = $request->validate(['enabled' => 'required|boolean']);
        $article->update($attr);

        $message = $request->enabled == 1
            ? 'Artikel berhasil di aktifkan'
            : 'Artikel berhasil di non-aktifkan';

        Alert::success(' Berhasil ', $message);
        return redirect()->route('manajemen-artikel.artikel');
    }
}
