<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
class UserController extends Controller
{
    const PATH_UPLOAD = 'users';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('deleted', 0)->select('users.*');
            return datatables()->of($users)
                ->addColumn('action', function ($users) {
                    $button = '<button type="button" name="edit" id="' . $users->id . '" class="edit btn btn-primary btn-sm">
                    <i class="uil-edit"></i>
                    </button>';
                    $button .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $users->id . '" class="delete btn btn-danger btn-sm">
                    <i class=" uil-trash-alt"></i>
                    </button>';
                    return $button;
                })
                ->addColumn('avatar', function ($users) {
                    if($users->avatar){
                        $avatarPath = asset('users/'. $users->avatar);
                    }else{
                        $avatarPath = asset('assets/images/profile.png');
                    }
                     return '<img src="' . $avatarPath . '" width="50px" height="45px"/>';
                })

                ->editColumn('status' , function ($users) {
                    if ($users->status == 0) {
                        $span = 'Active';
                    } else {
                        $span= 'Inactive';
                    }
                    return $span;
                })
                ->rawColumns(['action', 'avatar'])
                ->addIndexColumn()
                ->make(true);
        }
        $users = User::all();
        $roles = ['admin', 'client', 'lead'];
        return view('admin.users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = $request->user_id;

        $rules = [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,' . $userId],
            'role' => ['required', 'in:admin,client,lead'],
        ];

        if (empty($userId) || !empty($request->password)) {
            $rules['password'] = [
                'required',
                'min:8',
                'max:20',
//                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ];
        }

        $request->validate($rules);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->is_active,
            'deleted' => 0,
        ];

        if (!empty($request->password)) {
            $userData['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path(self::PATH_UPLOAD), $filename);
            $userData['avatar'] = $filename;
        }

        $user = User::updateOrCreate(['id' => $userId], $userData);

        if ($user) {
            return response()->json(['success' => 'User saved successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
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
    public function edit(string $id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user){
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        $user->deleted = 1;
        $user->save();
        return response()->json(['success' => 'Data Deleted Successfully'], 200);
    }
}
