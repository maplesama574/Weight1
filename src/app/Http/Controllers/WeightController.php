<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class WeightController extends Controller
{
    public function showStep1() {
        return view('register1');
    }

    public function index() {
        return view('login');
    }

    public function storeStep1(Request $request) {
        $request->session()->put('register.name', $request->name);
        $request->session()->put('register.email', $request->email);
        $request->session()->put('register.password', $request->password);

        return redirect()->route('register2');
    }

    public function showStep2() {
        return view('register2');
    }

    public function storeStep2(Request $request) {
        $request->session()->put('register.now', $request->now);
        $request->session()->put('register.ideal', $request->ideal);

        $name = $request->session()->get('register.name');
        $email = $request->session()->get('register.email');
        $password = $request->session()->get('register.password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'now' => $request->now,
            'ideal' => $request->ideal,
        ]);

        $request->session()->forget('register');

        return redirect()->route('login');
    }

    // モーダルで新規体重を追加
    public function storeWeight(Request $request)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'weight' => 'required|numeric',
        'calories' => 'nullable|integer',
        'exercise_time' => 'nullable',
        'exercise_content' => 'nullable|string',
    ]);

    $validated['user_id'] = auth()->id();

    $log = WeightLog::create($validated);

    return response()->json([
        'success' => true,
        'log' => $log,
    ]);
}


    // 検索
    public function search(Request $request) {
        $query = WeightLog::query();

        if ($request->has('date_range') && !empty($request->date_range)) {
            $dates = explode(' to ', $request->date_range);
            if(count($dates) == 2){
                $start = $dates[0];
                $end = $dates[1];
                $query->whereBetween('date', [$start, $end]);
            }
        }

        $weights = $query->paginate(8);
        return view('dashboard', compact('weights'));
    }

    // ページネーション
    public function show()
    {
        $weights = WeightLog::paginate(8);
        return view('dashboard', compact('weights')); 
    }



    // 更新
    public function update(Request $request, $id) {
        $weight = WeightLog::find($id);
        if (!$weight) {
            return redirect()->route('dashboard');
        }
        $weight->update($request->only([
            'date', 'weight', 'calories', 'exercise_time', 'exercise_content'
        ]));
        return redirect()->route('dashboard');
    }

    //体重ログ
    public function logs(){
        $logs=WeightLog::orderBy('date', 'desc')->get();
        return view('weight.logs', compact('logs'));
    }
    // 目標体重
    public function target()
    {
        $target = WeightTarget::first();
        return view('weight.target', compact('target'));
    }

    //weightlogテーブル
    public function showDashboard(){
        $logs=WeightLog::all();
        return view('dashboard', compact('logs'));
    }
    public function showDetail($Weightid)
{
    $log = WeightLog::findOrFail($Weightid);
    return view('detail', compact('log'));

}
}
