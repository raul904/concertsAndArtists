<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $artists = Artist::all();

        return response()->json($artists, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $artist = Artist::find($id);

        if (!$artist) {
            return response()->json(['error' => 'Artista no encontrado'], 404);
        }

        return response()->json($artist, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'band' => 'required|boolean',
        ]);

        $artist = Artist::create($request->all());

        return response()->json($artist, 201);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);

        if (!$artist) {
            return response()->json(['error' => 'Artista no encontrado'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'band' => 'required|boolean',
        ]);

        $artist->update($request->all());

        return response()->json($artist, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);

        if (!$artist) {
            return response()->json(['error' => 'Artista no encontrado'], 404);
        }

        $artist->delete();

        return response()->json(['message' => 'Artista eliminado exitosamente'], 200);
    }
}
