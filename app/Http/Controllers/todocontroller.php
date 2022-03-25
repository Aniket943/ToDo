<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

/**
 *
 */
class todocontroller extends Controller {

  /**
   *
   */
  public function AllList($id = 0) {
    $list_details = [];
    $list = todolist::where('user_id', auth()->id())->where('deleted_at', NULL)->orderBy('mark_as_completed', 'asc')->orderBy('created_at', 'asc')->paginate(10);
    if ($id > 0) {
      $list_details = todolist::where('id', $id)->first();
    }
    return view('todolist', ["list_items" => $list, "id" => $id, "list_details" => $list_details]);
  }

  /**
   *
   */
  public function AddEditItem(Request $request, $id = 0) {
    // dd($request->input());
    $data = $request->input();
    try {
      if ($id > 0) {
        todolist::where('id', $id)->update(['discription' => $data['task_desc'], 'updated_at' => date('Y-m-d H:i:s')]);
        $action = "Updated";
      }
      else {
        $todolist = new todolist();
        $todolist->user_id = auth()->id();
        $todolist->discription = $data['task_desc'];
        $todolist->mark_as_completed = 0;
        $todolist->created_at = date('Y-m-d H:i:s');
        $todolist->save();
        $action = "Inserted";
      }

      return redirect('todolist')->with('success', $action . " successfully");
    }
    catch (Exception $e) {
      return redirect('todolist')->with('error', "operation failed");
    }
  }

  /**
   *
   */
  public function DeleteItem($id) {
    try {
      todolist::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
      return redirect('todolist')->with('success', "Item Deleted successfully");
    }
    catch (Exception $e) {
      return redirect('todolist')->with('error', "operation failed");
    }

  }

  /**
   *
   */
  public function MarkCompletedItem($id) {
    try {
      todolist::where('id', $id)->update(['mark_as_completed' => 1]);
      return redirect('todolist')->with('success', "Item Mark As Completed");
    }
    catch (Exception $e) {
      return redirect('todolist')->with('error', "operation failed");
    }
  }

}
