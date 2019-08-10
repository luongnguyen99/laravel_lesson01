<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Http\Requests\ClassRoomRequest;
use Illuminate\Support\Facades\Auth;



class ClassController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth', 'active.admin', 'fpt.admin']);
    }

    public function index(){
       
            $classes = ClassRoom::all();
            // $classes = ClassRoom::find(6);
            $classes = $classes->load('admins');
            // dd($classes->toArray());
            // $classes = ClassRoom::all();
            return view('class.index', ['classes' => $classes]);       
    }
    public function add(){

        return view('class.add');
    }
    
    public function saveAdd(ClassRoomRequest $request){
        // kiểm tra có dữ liệu vào chưa
        // dd($request->all());

        // $this->validate($request,[
        //     'name' => 'required|string|min:8',
        //     'teacher_name' => 'required|string|min:5|max:15',
        //     'major' => 'required|string',
        //     'max_student' => 'nullable||numeric',   
            
        // ]);

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
        // $classRoom->save();
        
        // cách 2
        // ClassRoom::create($_data);

        // cách 3
        // $multiData = [
        //     $_data,
        //     $_data,
        //     $_data,
        // ];
        ClassRoom::insert($_data);

        // sau khi lưu sẽ trả về danh sách
        // return view('class.index',['classes'=> ClassRoom::all()]);
        return redirect('classes')->with('success','Thêm thành công');
    }


    // nếu đặt tên tham số nhận vào trùng với tham số ở route, Kèm theo kiểu classRoom
    // trả về luôn clasrrôm có id mà không cần thực hiện find()
    // $class = ClassRoom::find($id)
    public function editForm(ClassRoom $class){
        // dd($id);
        // $classRoom = ClassRoom::find($id);
        // dd($class);

        return view('class.add',['class' => $class]);

    }
    
    public function saveEdit(ClassRoomRequest $request){
        $_data  = $request->except('_token','id');
        // ClassRoom::find($request->id);
        $classRoom = ClassRoom::where('id','=',$request->id)->first();
        $classRoom->update($_data);

        return $this->index();
    }

    public function delete(ClassRoom $class){
       
        // dd($id);
        $class->delete();
        return $this->index();
    }
} 
   