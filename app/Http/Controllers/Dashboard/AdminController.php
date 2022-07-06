<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminReq;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admins_read')->only(methods: 'index');
        $this->middleware('permission:admins_create')->only(methods: 'create');
        $this->middleware('permission:admins_update')->only(methods: 'edit');
        $this->middleware('permission:admins_delete')->only(methods: 'destroy');
    } // end of __construct

    public function index(Request $request)
    {


        $data = Admin::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query
                    ->where('first_name', 'like', '%' . $request->search . '%')

                    ->orWhere('last_name', 'like', '%' . $request->search . '%');
            });

        })->latest()->paginate(10);

        return view('dashboard.admins.index', compact('data'));
    } // end of index

    public function create()
    {
        return view('dashboard.admins.create');
    } // end of create

    public function store(AdminReq $request)
    {
        // return $request;
        $request_data = $request->except(['password', 'permissions', 'image']);

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $request_data['password'] = bcrypt($request->password);

        $admin = Admin::create($request_data);

        $admin->attachRole('admin');

        $admin->syncPermissions($request->permissions);

        session()->flash('success', 'Added successfully');

        return redirect()->route('dashboard.admins.index');
    } // end of store

    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', compact('admin'));
    } // end of edit

    public function update(Request $request, Admin $admin)
    {
        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'image' => 'image',
            'permissions' => 'required|min:1',

        ]);

        $request_data = $request->except(['permissions', 'image']);

        if ($request->image) {

            if ($admin->image != 'default.png') {

                Storage::disk('public_upload')->delete('/users/' . $admin->image);
            }

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $admin->update($request_data);

        $admin->syncPermissions($request->permissions);

        session()->flash('success', 'Updated successfully');

        return redirect()->route('dashboard.admins.index');
    } // end pf update

    public function destroy(Admin $admin)
    {
        if ($admin->image !== "default.png") {
            Storage::disk('public_upload')->delete('/users/' . $admin->image);
        }
        $admin->delete();

        session()->flash('success', 'Delete has been successfully');

        return redirect()->route('dashboard.admins.index');
    } // end of destroy

} // end of controller
