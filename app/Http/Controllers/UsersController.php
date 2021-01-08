<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;
use App\Notifications\SetPassword as SetPasswordNotification;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));

        $this->sendVerifiedAndSetPasswordLink($user);

        return redirect()->route('users.index')->with('success', 'User created!')->with('info', 'Verified email send');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get()->pluck('name', 'id');
        $user_roles = $user->roles()->pluck('id')->toArray();

        return view('users.edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        $user->update($request->all());
        $user->syncRoles($request->input('roles'));

        if ($user->wasChanged('email') || !$user->email_verified_at) {
            $this->sendVerifiedAndSetPasswordLink($user);

            return redirect()->route('users.index')->with('success', 'User updated!')->with('info', 'Verified email send');
        }

        return redirect()->route('users.index')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted!');
    }

    /**
     * [sendVerifiedAndSetPasswordLink description].
     *
     * @param User $user [description]
     *
     * @return [type] [description]
     */
    public function sendVerifiedAndSetPasswordLink(User $user)
    {
        Password::sendResetLink(['email' => $user->email], function ($user, $token) {
            $user->notify(new SetPasswordNotification($token));
        });
    }
}
