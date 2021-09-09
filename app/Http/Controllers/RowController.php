<?php

namespace App\Http\Controllers;

use App\Models\Row;
use App\Services\RowService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RowController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(RowService $rowService) {
        $groups = $rowService->getGroupRows();
        return view('rows.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Row $row
     * @return Response
     */
    public function show(Row $row) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Row $row
     * @return Response
     */
    public function edit(Row $row) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Row     $row
     * @return Response
     */
    public function update(Request $request, Row $row) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Row $row
     * @return Response
     */
    public function destroy(Row $row) {
        //
    }
}
