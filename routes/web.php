<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Route to the main welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route for the "Meklēt" button
Route::get('/meklet', function () {
    // Define what happens when the "Meklēt" button is clicked
    return 'Meklēt button clicked!';
});

// Route to display the pievieno.blade.php view
Route::get('/pievieno', function () {
    return view('pievieno');
});

// Route to handle form submission from pievieno.blade.php
Route::post('/submit', function (Request $request) {
    // Validate incoming form data
    $validatedData = $request->validate([
        'svitrkods' => 'required|digits:8',
        'nosaukums' => 'required|string',
        'daudzums' => 'required|integer|min:0',
        'mervieniba' => 'required|string',
        'nosaukums_veikals' => 'required|string',
        'valsts' => 'required|string',
        'pilseta' => 'required|string',
        'iela' => 'required|string',
        'cena_vienu' => 'required|numeric|min:0',
        'cena_vienibu' => 'required|numeric|min:0',
        'akcijas_cena' => 'required|numeric|min:0',
        'akcijas_garums' => 'nullable|date_format:Y-m-d',
    ]);
    //-----------------------------------------------------------------------
    // Check if the svitrkods already exists in the database
    $existingCount = DB::table('cenas.Produkts')
        ->where('svitrkods', $validatedData['svitrkods'])
        ->count();

    // If no record exists, insert the new data
    if ($existingCount == 0) {
        DB::table('cenas.Produkts')->insert([
            'svitrkods' => $validatedData['svitrkods'],
            'nosaukums' => $validatedData['nosaukums'],
            'daudzums' => $validatedData['daudzums'],
            'mervieniba' => $validatedData['mervieniba'],
        ]);

        // Flash a success message to the session
        $request->session()->flash('success', 'Submission successful!');
    } else {
        // Flash a message indicating that the record already exists
        $request->session()->flash('error', 'Record with this svitrkods already exists!');
    }
    //-----------------------------------------------------------------------
    // Check if the lokacija already exists in the database
    $existingCount = DB::table('cenas.Lokacija')
        ->where('Iela', $validatedData['iela'])
        ->where('Pilseta', $validatedData['pilseta'])
        ->where('Valsts', $validatedData['valsts'])
        ->count();

    // If no record exists, insert the new data
    if ($existingCount == 0) {
        DB::table('cenas.Lokacija')->insert([
            'Iela' => $validatedData['iela'],
            'Pilseta' => $validatedData['pilseta'],
            'Valsts' => $validatedData['valsts'],
        ]);

        // Flash a success message to the session
        $request->session()->flash('success', 'Submission successful!');
    } else {
        // Flash a message indicating that the record already exists
        $request->session()->flash('error', 'Record with this lokacija already exists!');
    }
    //-----------------------------------------------------------------------
    // Check if the Veikals already exists in the database
    $existingCount = DB::table('cenas.Veikals')
        ->where('Iela', $validatedData['iela'])
        ->where('Nosaukums', $validatedData['nosaukums_veikals'])
        ->count();

    // If no record exists, insert the new data
    if ($existingCount == 0) {
        DB::table('cenas.Veikals')->insert([
            'Vieta' => $validatedData['iela'],
            'Nosaukums' => $validatedData['nosaukums_veikals'],
        ]);

        // Flash a success message to the session
        $request->session()->flash('success', 'Submission successful!');
    } else {
        // Flash a message indicating that the record already exists
        $request->session()->flash('error', 'Record with this veikals already exists!');
    }
    //-----------------------------------------------------------------------



    // Redirect back to the form with the submitted data
    return redirect('/pievieno')->with('submitted_data', $validatedData);
});
