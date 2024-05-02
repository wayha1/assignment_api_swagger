<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    /**
 * @OA\Tag(
 *     name="Students",
 *     description="API Endpoints for managing students"
 * )
 */
    /**
     * @OA\Get(
     *     path="/api/students",
     *     tags={"Students"},
     *     summary="Get all students",
     *     description="Returns a list of all students",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * @OA\Post(
     *     path="/api/students",
     *     tags={"Students"},
     *     summary="Create a new student",
     *     description="Create a new student record",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            // Add more validation rules as needed
        ]);

        return Student::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/students/{id}",
     *     tags={"Students"},
     *     summary="Get a specific student",
     *     description="Returns a specific student by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the student",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Student not found"
     *     )
     * )
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }
}
