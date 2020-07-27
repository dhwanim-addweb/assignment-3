
Step:23 Refactoring to Controller Classes,Step:25 Meet Your Batteries Included Framework: Laravel

migration file
	<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateTableReg extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('table_reg', function (Blueprint $table) {
				$table->bigInteger("id");
				$table->string("uname",100);
				$table->string("pass",100);
				$table->string("fname",100);
				$table->string("address",100);
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('table_reg');
		}
	}
	?>

Routes/web.php
	<?php
	use Illuminate\Support\Facades\Route;
	
	Route::get('/','dmlController@index');
	Route::post('/insert','dmlController@ins');
	Route::get('/home','dmlController@home');
	Route::get('/editdata/{id}','refactorController@editdata');
	Route::any('/update','refactorController@updatedata');
	Route::get('/deletedata/{id}','refactorController@deletedata');
	?>
	
dmlModel.php
	<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class dmlModel extends Model
	{
	  public $table = 'table_reg';
	  public $guarded = ['id'];
	}
	?>
	
	
refactorController.php.

	<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\dmlModel;

	class refactorController extends Controller
	{
	  public function editdata($id)
	  {
		  $sel = dmlModel::findOrFail($id);
		  return view('dml.update',compact('sel'));
	  }
	  public function updatedata(Request $request)
	  {
		dmlModel::where('id',$request->myid)->update(["uname"=>$request->uname,"pass"=>$request->pass,
		"fname"=>$request->fname,"address"=>$request->address]);
		return redirect('/home');
	  }
	  public function deletedata($id)
	  {
		   $sel = dmlModel::findOrFail($id)->delete();

		   return redirect("/home");
	  }
	}
	?>	
	
dmlController.php

	<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\dmlModel;

	class dmlController extends Controller
	{
		public function index()
		{
			return view('dml.reg');
		}
		public function ins(Request $request)
		{
			//dd($request);
			dmlModel::create(["uname"=>$request->uname,"pass"=>$request->pass,"fname"=>$request->fname,"address"=>$request->address]);
			return view('dml.reg');
		}
		public function home()
		{
			$sel = dmlModel::all();
			return view('dml.home',compact('sel'));
		}
	}
	?>	
	
home.blade.php

<html>
<head>
	<title>Home</title>
</head>
<body>
	<form method="post" >
		@csrf()
	<table align="center" border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th colspan="6">Home</th>
		</tr>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Fullname</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
		@forelse($sel as $row)
		<tr>
			<td>{{$row->uname}}</td>
			<td>{{$row->pass}}</td>
			<td>{{$row->fname}}</td>
			<td>{{$row->address}}</td>
			<td><a href="/editdata/{{$row->id}}">Edit</a>|
				<a href="/deletedata/{{$row->id}}">Delete</a></td>
		</tr>
		@empty
		<tr>
			<td colspan="5" align="center">No record Found</td>
		</tr>
		@endforelse
	</table>
</form>
</body>
</html>

reg.blade.php
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form method="post" action="/insert">
		@csrf()
		<table align="center" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Username</th>
				<td><input type="text" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<th>Fullname</th>
				<td><input type="text" name="fname"></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><textarea name="address"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>

</body>
</html>
	
update.blade.php

<html>
<head>
	<title>Register</title>
</head>
<body>
	<form method="post" action="/update">
		@csrf()
		<table align="center" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<input type="hidden" name="myid" value="{{$sel->id}}">
				<th>Username</th>
				<td><input type="text" name="uname" value="{{$sel->uname}}"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="pass" value="{{$sel->pass}}"></td>
			</tr>
			<tr>
				<th>Fullname</th>
				<td><input type="text" name="fname" value="{{$sel->fname}}"></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><textarea name="address">{{$sel->address}}</textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
	