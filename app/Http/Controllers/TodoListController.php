<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller
{

    public function Index()
    {
        $todo_lists = TodoList::all();
        return view('todos.index')->with('todo_lists', $todo_lists);
    }

    public function Show($id)
    {
        $list = TodoList::findOrFail($id);
        $items = $list->listItems()->get();
        return view('todos.show')
            ->withList($list)
            ->withItems($items);
    }

    public function Create()
    {
        return view('todos.create');
    }

    public function Store()
    {
        // define rules
        $rules = array(
                'name' => array('required', 'unique:todo_lists'),
            );

        // pass input to validator
        $validator = Validator::make(Input::all(), $rules);

        // test if input fails
        if ($validator->fails()) {
            return Redirect::route('todos.create')->withErrors($validator)->withInput();    
        }

        $name = Input::get('name');
        $list = new TodoList();
        $list->name = $name;
        $list->save();
        return Redirect::route('todos.index')->withMessage('List was created');
    }

    public function Edit($id)
    {
        $list = TodoList::findOrFail($id);
        return view('todos.edit')->withList($list);
    }

    public function Update($id)
    {

        // define rules
        $rules = array(
            'name' => array('required', 'unique:todo_lists'),
        );

        // pass input to validator
        $validator = Validator::make(Input::all(), $rules);

        // test if input fails
        if ($validator->fails()) {
            return Redirect::route('todos.edit', $id)->withErrors($validator)->withInput();    
        }

        $name = Input::get('name');
        $list = TodoList::findOrFail($id);
        $list->name = $name;
        $list->update();
        return Redirect::route('todos.index')->withMessage('List was updated');
    }

    public function Destroy($id)
    {
        $todo_list = TodoList::findOrFail($id)->delete();
        return Redirect::route('todos.index')->withMessage('Item deleted');
    }


}
