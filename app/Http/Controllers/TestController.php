<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class TestController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        // Récupération des informations pour le formulaire
        $author = Authors::with('city.country')->find($id);
        $countries = Countries::all();

        // Envoi du formulaire
        return view('edit', compact('author', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, int $id)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        // Mise à jour de l'auteur
        $author = Authors::query()->find($id);
        $author->name = $request->name;
        $author->city_id = $request->city;
        $author->save();

        // Redirection sur le formulaire
        return redirect(route('test.edit', $id))->with('success', 'L\'auteur a bien été mis à jour !');
    }

    /**
     * Get country's cities.
     *
     * @param int $id
     * @return Builder[]|Collection|Response
     */
    public function cities(int $id)
    {
        // Retour des villes pour le pays sélectionné
        return Cities::query()->whereIn('country_id',$id)->get();
    }
}
