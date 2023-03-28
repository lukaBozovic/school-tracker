<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginatedFaculties = Faculty::query()->paginate(4);
        return view('faculties.index', ['faculties' => $paginatedFaculties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        Faculty::query()->create($request->validated());
        return redirect()->route('faculties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return view('faculties.show', ['faculty' => $faculty]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return view('faculties.edit', ['faculty' => $faculty]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        Faculty::query()
            ->where('id', $faculty->id)->update($request->validated());

        /* alternative way to update a faculty
        $faculty->name = $request->name;
        $faculty->city = $request->city;
        $faculty->country = $request->country;
        $faculty->description = $request->description;
        $faculty->save();
        */
        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty, Request $request)
    {
        $redirectPage = $this->calculateRedirectPage($request->perPage, $request->total, $request->currentPage);
        $faculty->delete();
        return redirect()->route('faculties.index', ['page' => $redirectPage]);
    }

    //function to calculate redirect page after deleting a faculty
    //this is necessary because the pagination is not working properly
    //when deleting a faculty from the last page
    private function calculateRedirectPage($perPage, $total, $currentPage)
    {
        if ($total < $perPage)
            return 1;

        $numberOfElementsCurrentPage = $total - ($currentPage - 1) * $perPage;
        if ($numberOfElementsCurrentPage == 1)
            return $currentPage - 1;

        return $currentPage;
    }
}
