<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Reserve;
use App\Seat;
class ValidationReserv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validation:reserv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este Comando valida las Fechas de expiracion y de activacion de las Reservas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
       $carbon = Carbon::now();
       /* $query  Valida que la fecha dada en activate_reserve haya sido superada por la fecha actual donde el estado de la reserva sea en espera , y la fecha de expiracion sea mayor a el tiempo actual */
        $query = Reserve::where([
        ['activate_reserve', '<=' , $carbon],
        ['expiration_reserve', '>=' , $carbon],
        ['id_reservestate' , 2]
        ])->get();


       foreach ($query as $query_result ) {
          if ($query_result->activate_reserve <= $carbon) {

                // Actuliza el estado de la plaza a vacia 
             Seat::where('id_seat' , $query_result->id_seat )
             ->update(['state_seat' => 1]);
                // Actualiza el estado de la reserva a inactiva 
             
             Reserve::where('id_reserve' , $query_result->id_reserve)
             ->update(['id_reservestate' => 1] );
         }
     }

     /* $query2  Valida que la fecha dada en expiration_reserve haya sido superada por la fecha actual donde el estado de la reserva sea activa */
      $query2 = Reserve::where([
        ['expiration_reserve', '<=' , $carbon],
        ['id_reservestate' , 1]
    ])->get();

     foreach ($query2 as $query_result2 ) {

            // Actualiza el estado de la plaza a vacia 
      Seat::where('id_seat' , $query_result2->id_seat )
      ->update(['state_seat' => 0]);
            
            // Actualiza el estado de la reserva a inactiva 
      Reserve::where('id_reserve' , $query_result2->id_reserve)
      ->update(['id_reservestate' => 0]);

  }
    }
}
