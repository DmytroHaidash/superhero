<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\Models\Media;

class SuperheroesController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        $superheroes = Superhero::paginate(5);
        return \view('superheroes.index', compact('superheroes'));
    }

    /**
     * @param Superhero $hero
     * @return View
     */
    public function show(Superhero $hero):View
    {
        return \view('superheroes.show', compact('hero'));
    }

    /**
     * @return View
     */
    public function create():View
    {
        return \view('superheroes.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $superhero = Superhero::create([
            'nickname​' => $request->input('nickname​'),
            'real_name' => $request->input('real_name'),
            'origin_description​' => $request->input('origin_description'),
            'superpowers' => $request->input('superpowers'),
            'catch_phrase' => $request->input('catch_phrase')
        ]);

        if ($request->has('media')) {
            foreach ($request->media as $media) {
                Media::find($media)->update([
                    'model_type' => Superhero::class,
                    'model_id' => $superhero->id,
                ]);
            }
        }
        return redirect()->route('heroes.index')->with('success', 'Heroes successfully created');
    }

    /**
     * @param Superhero $hero
     * @return View
     */
    public function edit(Superhero $hero):View
    {
        return \view('superheroes.edit', compact('hero'));
    }

    public function update(Request $request, Superhero $superhero):RedirectResponse
    {
        $superhero->update([
            'nickname​' => $request->input('nickname​'),
            'real_name' => $request->input('real_name'),
            'origin_description​' => $request->input('origin_description​'),
            'superpowers' => $request->input('superpowers'),
            'catch_phrase' => $request->input('catch_phrase')
        ]);
        if ($request->has('media')) {
            foreach ($request->media as $media) {
                Media::find($media)->update([
                    'model_type' => Superhero::class,
                    'model_id' => $superhero->id,
                ]);
            }
        }
        return redirect()->route('heroes.index')->with('success', 'Heroes successfully updated');
    }

    /**
     * @param Superhero $hero
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Superhero $hero): RedirectResponse
    {
        $hero->clearMediaCollection('uploads');
        $hero->delete();
        return \redirect()->route('heroes.index')->with('success', 'Heroes successfully deleted');
    }
}
