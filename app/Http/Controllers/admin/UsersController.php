<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected static $professions = [['Application Admin', 'مدير التطبيق'],  ['general manager', 'المدير العام'], ['Financial Manager', 'المدير المالى'], ['Inventory Man', 'أمين المخازن'], ['Accountant', 'المحاسب'], ['Store Man', 'مسئول التخزين'], ['labourer', 'عامل']];
    public function index()
    {
        //
        $users = User::where([])->orderBy('id', 'ASC')->paginate(10);

        $vars = [
            'users' => $users,
            'professions' => static::$professions
        ];
        return view ('admin.users.index', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //

        $vars = [
            'professions' => static::$professions,
        ];
        return view ('admin.users.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();

        $user->userName         = $request->userName;
        $user->email            = $request->email;
        $user->password         = $request->password;
        $user->company          = auth()->user()->company;
        $user->created_at       = date('Ymd H:i:s');

        if ($user->save()) {
            $profile = UserProfile::initiateNewProfile($request);
            $profile->userId = $user->id;
            if ($profile->save()) {
                return redirect () -> route('users.show', [$user->id, 1])->withSuccess('تمت الإضافة بنجاح');
            } 
            return redirect () -> back()->withError('تم إضافة موظف جديد بنجاح');
        } 
        return redirect () -> back()->withError('حدث خطأ أثناء حفظ الموظف الجديد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $tab)
    {
        //
        $vars = [
            'user' => User::find($id),
            'profile' => UserProfile::where(['userId' => $id])->first(),
            'professions' => static::$professions,
            'tab' => $tab
        ];

        return view ('admin.users.show', $vars);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
