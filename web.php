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
    
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    $api = app('Jetwaves\LaravelImplicitRouter\Router');
    $api->controller('prueba', 'App\Http\Controllers\PruebaController');
    $api->controller('refugio', 'App\Http\Controllers\Refugio\RefugioController');
    $api->controller('usuaria', 'App\Http\Controllers\UsuariaController');
//
//

//    Route::get('/', 'welcome');
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get("/principal",function(){
        $sessionExpires = new Carbon();
        $sessionExpires->addMinutes(5);
        
        
        $nombre=["Juan","Pedro","Alex"];
        $apellido=["Esquivel","Solis","Romero"];
        return response(array("Nombre"=>$nombre[rand (0,2)],"Apellido"=> $apellido[rand (0,2)],"Edad"=>rand (1,50)), 200)
            ->header('Content-Type', 'application/json')
            ->header('expires','Fri, 15 Feb 2019 19:52:41 GMT');
        
         
    
    
    });
    Route::get("/lista",function(){
        $nombre=["Juan","Pedro","Alex"];
        $apellido=["Esquivel","Solis","Romero"];
        $telefono=["871-176-60-65","871-130-30-12","871-234-33-22"];
        $lista=array();
        for($x=0;$x<=20;$x++){
         $lista[]=array("id"=>$x+1,"Nombre"=>$nombre[rand (0,2)],"Apellido"=> $apellido[rand (0,2)],"Edad"=>rand (1,50), "Telefono"=> $telefono[rand(0,2)]   );
        }
        return response($lista, 200)
            ->header('Content-Type', 'application/json')
            ->header('expires','Fri, 15 Feb 2019 19:52:41 GMT');
     });



    Route::get("/nombre",function(Request $request){
            
        
        if($request->exists('Nombre')){
        $nombre= $request->input('Nombre');    
        }else{
            $nombre="Sin Nombre";    
        }
        


            $m=["Mensaje"=>"Hola saludos :)". $nombre];

        return response($m, 200)
            ->header('Content-Type', 'application/json')
            ->header('expires','Fri, 15 Feb 2019 19:52:41 GMT');
 
    });
    
    
    Route::group(['middleware' => 'web'], function () {
    Route::get("/log",function(){
   
    
        return Auth::user();
});
});
