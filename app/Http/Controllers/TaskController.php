<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    // Listar tareas con paginación y filtros
    public function index(Request $request)
    {
        $query = Task::query();

        // Filtrar por estado
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filtrar por prioridad
        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        // Paginación
        $tasks = $query->paginate(10);

        return response()->json($tasks);
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        // Validar datos de entrada
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string|in:pending,in_progress,completed',
            'priority' => 'nullable|string|in:low,medium,high',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear tarea
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        // Notificar si la prioridad es alta
        if ($request->priority == 'high') {
            // Lógica de notificación por correo
            Mail::raw("Nueva tarea de alta prioridad: {$task->title}", function ($message) use ($task) {
                $message->to('responsable@example.com')->subject('Tarea de Alta Prioridad');
            });
        }

        return response()->json($task, 201);
    }

    // Mostrar una tarea específica
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    // Actualizar una tarea
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Validar datos de entrada
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string|in:pending,in_progress,completed',
            'priority' => 'nullable|string|in:low,medium,high',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar tarea
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return response()->json($task);
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
