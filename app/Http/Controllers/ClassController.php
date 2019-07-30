<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index(){
        $classes = ClassRoom::all();
        return view('class.index',['classes' => $classes]);
    }
    public function add(){

        return view('class.add');
    }
    
    public function saveAdd(Request $request){
        // kiểm tra có dữ liệu vào chưa
        // dd($request->all());

        $this->validate($request,[
            'name' => 'required|string|min:8',
            'teacher_name' => 'required|string|min:5|max:15',
            'major' => 'required|string',
            'max_student' => 'nullable||numeric',   
            
        ]);

        $_data = $request->except('_token');
        // dd($_data);

        // khởi tạo đối tượng
        $classRoom = new ClassRoom();

        // gán giá trị vào các thuộc tính
        $classRoom->name = $_data['name'];
        $classRoom->teacher_name = $_data['teacher_name'];
        $classRoom->major = $_data['major'];
        $classRoom->max_student = $_data['max_student'];
        // kết thúc gán
        
        // lưu 
        $classRoom->save();
        
        // sau khi lưu sẽ trả về danh sách
        // return view('class.index',['classes'=> ClassRoom::all()]);
        return $this->index();
    }
}
