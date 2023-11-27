<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $concerts = Concert::all();

        return response()->json($concerts, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['error' => 'Concierto no encontrado'], 404);
        }

        return response()->json($concert, 200);
    }

    /***
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);

        $concert = Concert::create($request->all());

        return response()->json($concert, 201);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['error' => 'Concierto no encontrado'], 404);
        }

        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);

        $concert->update($request->all());

        return response()->json($concert, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['error' => 'Concierto no encontrado'], 404);
        }

        $concert->delete();

        return response()->json(['message' => 'Concierto eliminado exitosamente'], 200);
    }
}
