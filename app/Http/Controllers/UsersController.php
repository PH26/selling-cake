<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Order;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            ]);
        User::create($request->all());
        return redirect('admin/user/index')->with('notification','The user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
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
        request()->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'phone' => 'sometimes|required',
            'address' => 'sometimes|required',
            ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect('admin/user/index')->with('notification','The user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
    	$order = Order::where('user_id', $user->id)->get();
        if ($order->count() > 0){
            return redirect('admin/user/index')->with('warning', "You can't delete the user because he has order incompleted!");
        } else {
            User::destroy($id);
            return redirect('admin/user/index')->with('notification','The user deleted successfully');
        }
    }

    public function action(Request $request)
    {
     if($request->ajax()) {
      $output = '';
      $query = $request->get('query');
      if($query != '') {
       $data = \DB::table('users')
         ->where('name', 'LIKE', "%{$query}%")
         ->orwhere('email','LIKE',"%{$query}%")
         ->orwhere('address','LIKE',"%{$query}%")
         ->orwhere('phone','LIKE',"%{$query}%")
         ->orderBy('id', 'desc')
         ->paginate(5)->appends(['query'=> $query]);
        $total_row = $data->count();

      } else {
        $data = \DB::table('users')
          ->orderBy('id', 'desc')
          ->paginate(5);
        $total_row = DB::table('users')->count();
      }

      if($total_row > 0){
       foreach($data as $row){
        $output .= '
        <tr>
            <td class="center">'.$row->id.'</td>
            <td class="center">'.$row->name.'</td>
            <td class="center">'.$row->email.'</td>
            <td class="center">'.$row->address.'</td>
            <td class="center">'.$row->phone.'</td>
            <td class="center">'.
                $row->role
            .'</td>
            <td class="center">
                <div class="hidden-sm hidden-xs action-buttons">
                    <a class="green" href="admin/user/edit/'.$row->id.'">
                    <i class="ace-icon fa fa-pencil bigger-130"></i></a>
                    <a class="red" data-userid='.$row->id.' data-toggle="modal" data-target="#delete" title="Delete product">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                </div>
            </td>
        </tr>
        ';


       }
     } else {
         $output = '
         <tr>
          <td align="center" colspan="5">No Data Found</td>
         </tr>
         ';
    }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      // dd($data);
      echo json_encode($data);
     }
   }
}
