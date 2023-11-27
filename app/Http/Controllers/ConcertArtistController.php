<?php

namespace App\Http\Controllers;

use App\Models\ConcertArtist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConcertArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Attach an artist to a concert.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'artist_id' => 'required|exists:artists,id',
        ]);

        $concertArtist = ConcertArtist::create($request->all());

        return response()->json($concertArtist, 201);
    }

    /**
     * Detach an artist from a concert.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $request->validate([
            'concert_id' => 'required|exists:concerts,id',
            'artist_id' => 'required|exists:artists,id',
        ]);

        ConcertArtist::where($request->all())->delete();

        return response()->json(['message' => 'Relación eliminada exitosamente'], 200);
    }
}
