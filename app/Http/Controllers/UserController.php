<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // showall
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    // add new newsletter
    public function newuser(Request $request)
    {
        // validation 
        $this->validate($request, [
            'name'=> 'required',
            'username' => 'required',
            'email'=>'required|unique:users'
            ]);
            $user = User::create($request->all());
            return response()->json($user);
            
        }

        //show a particular newsletter
        public function showone($id)
        {
            $user = User::findOrFail($id);
            return response()->json($user);
        }
        
        // update 
        public function update(Request $request, $id)
        {
            //validate
            $this->validate($request, [
                'title'=> 'required',
                'content' => 'required'
                ]);
                //update
                $user= User::findOrFail($id);
                
                $user->title = $request->input('title');
                $user->content = $request->input('content');
                $user->save();
                return response()->json($user);
                
            }
            

            // delete
            public function destroy($id)
            {
                // $user = User::findOrFail($id);
                // $user->orderBy('id', 'desc')->limit(1)->delete();
               $user = DB::table('users')->
               latest('id')->first()->delete();
                return response()->json('news removed successfully');
            }

    
}
