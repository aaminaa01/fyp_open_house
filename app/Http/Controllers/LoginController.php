<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Evaluator;
use App\Models\FypGroup;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|exists:admin_users,id|exists:evaluators,id|exists:fyp_groups,id',
        //     'user_type' => 'required|in:admin,evaluator,fyp_group',
        // ]);

        $id = $request->input('id');
        $userType = $request->input('user_type');

        // Check if the record exists based on user type
        switch ($userType) {
            case 'admin':
                $userExists = AdminUser::where('id', $id)->exists();
                break;
            case 'evaluator':
                $userExists = Evaluator::where('id', $id)->exists();
                break;
            case 'fyp_group':
                $userExists = FypGroup::where('id', $id)->exists();
                break;
            default:
                $userExists = false;
        }

        if ($userExists) {
            // Redirect to corresponding user type's home page
            // Adjust the route names as needed
            return redirect()->route($userType . '.home')->with('id', $id);
        } else {
            // Record doesn't exist, stay on the login screen
            return back()->withErrors(['id' => 'Invalid ID']);
        }
    }
}
