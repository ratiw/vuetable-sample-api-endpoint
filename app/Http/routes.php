<?php

Route::get('/api/users', function() {
$request = request();

// handle sort option
if (request()->has('sort')) {
    list($sortCol, $sortDir) = explode('|', request()->sort);
    $query = App\User::orderBy($sortCol, $sortDir);
} else {
    $query = App\User::orderBy('id', 'asc');
}

if ($request->exists('filter')) {
    $query->where(function($q) use($request) {
        $value = "%{$request->filter}%";
        $q->where('name', 'like', $value)
            ->orWhere('nickname', 'like', $value)
            ->orWhere('email', 'like', $value);
    });
}

$perPage = request()->has('per_page') ? (int) request()->per_page : null;

// The headers 'Access-Control-Allow-Origin' and 'Access-Control-Allow-Methods'
// are to allow you to call this from any domain (see CORS for more info).
// This is for local testing only. You should not do this in production server,
// unless you know what it means.
return response()->json(
        $query->paginate($perPage)
    )
    ->header('Access-Control-Allow-Origin', '*')
    ->header('Access-Control-Allow-Methods', 'GET');
});


Route::get('/', function() {
    return redirect('https://github.com/ratiw/vue-table');
});
