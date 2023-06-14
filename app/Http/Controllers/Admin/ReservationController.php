<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations =  Reservation::all();
        return  view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::whereIn('status', [TableStatus::Available, TableStatus::Pending])->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()
                ->with('warning', 'Пожалуйста, выберите столик c подходящим количеством мест');
        }

        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            $reservation_date = Carbon::parse($res->res_date); // Parse the string into a Carbon instance
            if ($reservation_date->format('Y-m-d\H:i') == $request_date->format('Y-m-d\TH:i')) {
                return back()
                    ->with('warning', 'Этот столик уже забронирован на это время')
                    ->withInput();
            }
        }


        Reservation::create($request->validated());

        return redirect()->route('admin.reservation.index')
            ->with('success', 'Бронирование успешно создано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation  $reservation)
    {
        $tables = Table::whereIn('status', [TableStatus::Available, TableStatus::Pending])->get();

        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()
                ->with('warning', 'Пожалуйста, выберите столик c подходящим количеством мест');
        }

        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            $reservation_date = Carbon::parse($res->res_date); // Parse the string into a Carbon instance
            if ($reservation_date->format('Y-m-d\H:i') == $request_date->format('Y-m-d\TH:i')) {
                return back()
                    ->with('warning', 'Этот столик уже забронирован на это время')
                    ->withInput();
            }
        }

        $reservation->update($request->validated());
        return redirect()->route('admin.reservation.index')
            ->with('success', 'Бронирование успешно обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservation.index')
        ->with('danger', 'Бронирование успешно Удалено!');
    }
}
