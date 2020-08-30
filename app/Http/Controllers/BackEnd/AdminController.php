<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Use App\Http\Requests\AdminsCreateRequest;
Use App\Http\Requests\AdminsUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Permission;
use App\Profile;

class AdminController extends Controller
{
    public function __construct() {

        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('update', 'edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    } // End Of Construct

    public function index()
    {
        $admins = DB::table('users')
            ->select('id', 'name', 'email', 'role_id')
            ->leftJoin('role_user','role_user.user_id', '=', 'users.id')
            ->latest()
            ->paginate(50);
        return view('pages.back-end.admin.index', compact('admins'));

    } // End Of Index

    public function create()
    {
        $permissions = Permission::all(); // Show All Permisstions
        $roles = Role::all(); // Show All Roles
        return view('pages.back-end.admin.create', compact('permissions', 'roles'));

    } // End OF Create

    public function store(AdminsCreateRequest $request)
    {
        $request_data = $request->except([
            'password',
            'password_confirmation',
            'status',
            'role',
            'permissions'
        ]);

        $request_data['password'] = bcrypt($request->password);

        $admin = User::create($request_data);

        // Whene Create New Admin Make Profile Dynamic For This User
        $profile = Profile::create([
            'user_id' => $admin->id,
        ]);
        $admin->syncRoles($request->role);
        $admin->syncPermissions($request->permissions);

        notify()->preset('admin-create');
        return redirect()->Route('admin.index');
    }


    public function edit($id)
    {
        $admin = User::findorfail($id);
        $permissions = Permission::all(); // Show All Permisstions
        $roles = Role::all(); // Show All Roles
        // dd($admin);
        return view('pages.back-end.admin.edit', compact('admin', 'roles', 'permissions'));

    } // End Of Edit

    public function update(AdminsUpdateRequest $request, $id)
    {
        $admin = User::findOrFail($id);

        $admin->name  = $request->name;
        $admin->email = $request->email;

        $admin->save();
        $admin->syncRoles($request->role);
        $admin->syncPermissions($request->permissions);

        notify()->preset('admin-update');
        return redirect()->Route('admin.index');

    }// End Of Update

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->profile()->delete();
        $admin->delete();
        notify()->preset('admin-delete');
        return redirect()->Route('admin.index');

    } // End Of Destroy

} // End Of Controller
