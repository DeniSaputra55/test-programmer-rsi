<?php

namespace App\Http\Controllers;
//import model todolist
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //menampilkan halaman awal todo list
    public function loadAlltodolist()
    {
        $all_todo = Todo::all();
        return view('todo', compact('all_todo'));
    }
    //function untuk menampilkan halama tambah todo
    public function loadAddTodoForm()
    {
        return view('add-todo');
    }
    //function untuk tambah data new todo
    public function AddTodo(Request $request)
    {
        //untuk validasi form
        $request->validate([
            'todo' => 'required|string',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ]);
        try {
            //resigtrasi todo
            $new_todo = new Todo;
            $new_todo->todo = $request->todo;
            $new_todo->tanggal = $request->tanggal;
            $new_todo->jam = $request->jam;
            $new_todo->status = $request->status;
            $new_todo->save();

            return redirect('/todo')->with('success', 'Todo Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/todo')->with('fail', $e->getMessage());
        }
    }
    //function untuk proses edit
    public function EditTodo(Request $request)
    {
        // perform form validation here
        $request->validate([
            'todo' => 'required|string',
            'tanggal' => 'required',
            'jam' => 'required',
            'status'=> 'required',
        ]);
        try {
            // update todo here
            $update_todo = Todo::where('id', $request->todo_id)->update([
                'todo' => $request->todo,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'status' => $request->status,
            ]);

            return redirect('/todo')->with('success', 'Todo Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/todo')->with('fail', $e->getMessage());
        }
    }
    //function untuk menampilkan halaman  edit data todo
    public function loadEditForm($id)
    {
        $todo = Todo::find($id);
        return view('edit-todo', compact('todo'));
    }
    //function delete/hapus data
    public function deleteTodo($id)
    {
        try {
            Todo::where('id', $id)->delete();
            return redirect('/todos')->with('success', 'Todo deleted successfully');
        } catch (\Exception $e) {
            return redirect('/todos')->with('fail', $e->getMessage());
        }
    }

}
