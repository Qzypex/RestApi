<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Person;
use Illuminate\Http\Request;

class PeopleController extends BaseController
{
    public function index(): JsonResponse
    {
      return response()->json(Person::all(), 200);
    }

    public function create(Request $request): JsonResponse
    {
      $jsonData = $request->json()->all();
      $person = new Person(
          [
            "first_name" => $jsonData['first_name'],
            "last_name" => $jsonData['last_name'],
            "phone" => $jsonData['phone'],
            "city" => $jsonData['city'],
            "country" => $jsonData['country'],
          ]
        );

      $person->save();

      return response()->json($person, 201);
    }

    public function read($id): JsonResponse
    {
      $person = Person::find($id);

      if ($person) {
        return response()->json($person, 200);
      } else {
        return response()->json(['message' => 'Not found'], 404);
      }
    }

    public function update(Request $request, $id): JsonResponse
    {
      $person = Person::find($id);
      
      $jsonData = $request->json()->all();

      
      if ($person) {
        $person->update($jsonData);
        return response()->json(['message' => 'Updated']);
      }

      return response()->json(['message' => 'Not found'], 404);
    }

    public function delete($id): JsonResponse
    {
      $person = Person::findOrFail($id);
      $person->delete();
      return response()->json(['message' => 'Deleted']);
    }
}
