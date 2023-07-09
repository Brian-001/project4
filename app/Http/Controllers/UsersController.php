<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requsts\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**The first line checks if the user is denied access based on 'user_access
         * If user is denied access, it6 throws '403 FORBIDDEN HTTP exception witha an error message
         *If user is granted access, the second line proceeds to fetch all users from db along 
         with associated roles using eager loading
         *Retrieved users are then passed to the view function users.index

         * */
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         * pluck() retrieves a list of role titles as values and their corresponding role IDs as keys
         * Retrieved roles are then passed to view
         * compact() creates an associative array where variables named 'roles' becomes key and 
         * variable value '$roles' becomes value. 
         * **/
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::pluck('title', 'id');
        return view ('users.create', compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     * sync() on the roles() relshp of the $user model updates the roles on pivot table that connects
     * users and roles
     * [] passed as default value ensures that if no roles are provided, the user will have empty set
     * of roles.
     */
    public function store(StoreUserRequest $request)
    {
        //
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::pluck('title', 'id');

        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->delete();

        return redirect('users.index');
    }
}
