<?php

namespace App\Http\Controllers\Api\V1;

use App\News;
use App\Http\Controllers\Controller;
use App\Http\Resources\News as NewsResource;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class NewsController extends Controller
{
    public function index()
    {
        

        return new NewsResource(News::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('news_view')) {
            return abort(401);
        }

        $news = News::with([])->findOrFail($id);

        return new NewsResource($news);
    }

    public function store(StoreNewsRequest $request)
    {
        if (Gate::denies('news_create')) {
            return abort(401);
        }

        $news = News::create($request->all());
        
        

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        if (Gate::denies('news_edit')) {
            return abort(401);
        }

        $news = News::findOrFail($id);
        $news->update($request->all());
        
        
        

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('news_delete')) {
            return abort(401);
        }

        $news = News::findOrFail($id);
        $news->delete();

        return response(null, 204);
    }
}
