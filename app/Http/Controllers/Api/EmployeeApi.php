<?php

namespace App\Http\Controllers\Api;
use App\Models\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeApi extends Controller
{


        public function index()
        {
            $empData = Employee::all();
            return response()->json(['data' => $empData], 200);
        }

        public function DeleteEmployee($id)
    {
        try {
            // Find the employee by its ID and delete it
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return response()->json(['message' => 'Employee deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }

}
