<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view("dashboard.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.users.add");

    }
    public function usersall(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="' . route("users.edit", $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
                        $btn .= ' <a href="' . route("users.delete", $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('users.index');
    }
//     public function usersall(Request $request)
// {
//     if ($request->ajax()) {
//         $data = User::where('id', $request->id)->get(); // modify the query to retrieve only the user with the given ID
//         return Datatables::of($data)
//                 ->addIndexColumn()
//                 ->addColumn('action', function($row){
//                     $btn = '<a href="' . route("users.edit", $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';
//                     $btn .= ' <a href="' . route("users.destroy", $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';
//                     return $btn;
//                 })
//                 ->rawColumns(['action'])
//                 ->make(true);
//     }
  
//     return view('users.index');
// }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
//     public function edit($id)
//     {
//         dd($id);
// return view("dashboard.users.edit",compact("users"));

//     }
public function edit(User $user)
{
    return view('dashboard.users.edit',compact('user'));
}
public function update(Request $request,  User $user)
{

    dd($user,$request->all());
}
    // public function edit(Request $request,$id)
    // {
    //     $users=User::find($id)->where("id",$request->id);
    //     return view('dashboard.users.edit', compact("users"));
    // }
//     public function edit( )
//     {
//         $users=User::all();
// ;return view("dashboard.users.edit",compact("users"));

//     }


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */public function destroy($id)
{

    // User::findOrFail($id)->delete();
    // return redirect()->back();
}
public function delete($id){
    $user = User::where('id',$id)->first();
if ($user) {
  $user->delete();
  return redirect()->back()->with('success', 'User deleted successfully.');
} else {
  return redirect()->back()->with('error', 'User not found.');
}
}
public function showUser()
{
    $users = User::all();
    dd($users->toArray());
    return view('users.show', compact('users'));
}
    // public function destroy(Request $request)
    // {
    //         User::where("id",$request->id)->delete();
    //         $user=User::where("id",$request->id)->withTrashed()->get();
    //         dd($user);
    //         return view("dashboard.users.delete",compact("user"));
    // }
}

