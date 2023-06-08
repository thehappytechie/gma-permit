<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Location;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserProfileController extends Controller
{
    public function edit($id)
    {
        $departments = Department::orderBy('name', 'asc')->get(['id', 'name']);
        $locations = Location::orderBy('name', 'asc')->get(['id', 'name']);
        $user = User::findOrFail($id);
        return view('profile.edit', compact(['user', 'locations', 'departments']));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $this->doValidation($request, $user);
        $user->update($data);
        session()->flash('success', 'Your profile has been updated.');
        return redirect()->back();
    }

    public function security()
    {
        return view('profile.security');
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }

    public function doValidation($request, $user)
    {
        return $request->validate([
            'name' => [$user->id ? 'sometimes' : 'required', 'string'],
            'email' => [$user->id ? 'sometimes' : 'required', Rule::unique('users', 'email')->ignore($user->id)],
            'department_id' => [$user->id ? 'sometimes' : 'exists:departments,id', 'nullable'],
            'title' => [$user->id ? 'sometimes' : 'string', 'nullable'],
            'employee_no' => [$user->id ? 'sometimes' : 'string', 'nullable'],
            'contact' => [$user->id ? 'sometimes' : 'string', 'numeric', 'nullable'],
            'location_id' => [$user->id ? 'sometimes' : 'exists:locations,id', 'nullable'],
        ]);
    }
}
