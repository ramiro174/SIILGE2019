<?php
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    
    use App\alumno;
    use App\baraja;
    use Illuminate\Http\Request;
    
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get("/lista", function () {
        $nombre = ["Juan", "Pedro", "Alex"];
        $apellido = ["Esquivel", "Solis", "Romero"];
        $telefono = ["871-176-60-65", "871-130-30-12", "871-234-33-22"];
        $lista = array();
        for ($x = 0; $x <= 20; $x++) {
            $lista[] = array("id" => $x + 1, "Nombre" => $nombre[rand(0, 2)], "Apellido" => $apellido[rand(0, 2)], "Edad" => rand(1, 50), "Telefono" => $telefono[rand(0, 2)]);
        }
        return response($lista, 200)
            ->header('Content-Type', 'application/json')
            ->header('expires', 'Fri, 15 Feb 2019 19:52:41 GMT');
    });
    Route::get("/ListaNombre",function(){
        
        return alumno::all();
    });
    Route::get("/baraja/numero",function(){
       
       return ["numero"=>rand(1, 13)];
    });
    Route::post("/baraja/enviar",function(Request $request){
    
        $nombre=$request->get("nombre");
        $numero=$request->get("numero");
        $ar=baraja::create(["nombre"=>$nombre,"numero"=>$numero]);
    
        return response(["Mensaje"=>$nombre ." tus resultado ha sido almacenado"], 200)
            ->header('Content-Type', 'application/json')
            ->header('expires', 'Fri, 15 Feb 2019 19:52:41 GMT');
    
    });
    
    
    
    Route::post("/nombre", function (Request $request) {
        if ($request->exists('Nombre')) {
            $nombre = $request->input('Nombre');
        } else {
            $nombre = "Sin Nombre";
        }
         
         $ar=alumno::create(["nombre"=>$nombre]);
      
      
        $m = ["Mensaje" => "Bienvenido " . $ar->nombre];
        
        return response($m, 200)
            ->header('Content-Type', 'application/json')
            ->header('expires', 'Fri, 15 Feb 2019 19:52:41 GMT');
    });
