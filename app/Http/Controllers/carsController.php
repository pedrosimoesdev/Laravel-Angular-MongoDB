<?php

namespace App\Http\Controllers;

use App\Models\Car;
use mysql_xdevapi\Exception;
use View;
use App\Http\Requests\carsRequest;


class carsController extends Controller
{

    public function index()
    {
        ini_set('memory_limit', '2048M'); // or you could use 1G
        $cars = Car::all();
        $return_cars = $cars->toArray();

        return View::make('cars',compact('return_cars'));
    }


    public function create()
    {
        return View::make('cars');
    }


    public function store(carsRequest $request)
    {
        $carName =  $request->car;
        $model =  $request->model;
        $year =  $request->year;

        $car = new Car();
        $car->car   = $carName;
        $car->model = $model;
        $car->year  = $year;

        if( $car->save()){
            return redirect('/cars');
        }
    }

    public function show(Car $car)
    {
        return view('show', [
            'car' => $car
        ]);
    }

    public function edit(Car $car)
    {
        dd($car->toArray());
    }



    public function update(carsRequest $request, Car $car)
    {
        $id =  $request->id;
        $carName =  $request->car;
        $model =  $request->model;
        $year =  $request->year;

       Car::where('_id',$id)
            ->update([
                'car' => $carName,
                'model' => $model,
                'year' => $year,
            ]);
        return "records Updated";
    }


    public function destroy(Car $car)
    {
        $id = $car->_id;

        $car = Car::find($id);
        $car->delete();

        return "records deleted";

    }
    public function createRecords()
    {
        try {
            $i = 0;
            while ($i < 150000)
            {

                $carName =  '123';
                $model =   '123';
                $year =  "1234";

                $car = new Car();
                $car->car   = $carName;
                $car->model = $model;
                $car->year  = $year;


                $car->save();

                $i++;
            }

            return 'saved';
        }catch (Exception $e){
            return $e;
    }



    }
}
