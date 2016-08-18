<?php

Route::get('/api/users', function() {
    $request = request();

    $query = app(App\User::class)->newQuery();

    // handle sort option
    if (request()->has('sort')) {
        // handle multisort
        $sorts = explode(',', request()->sort);
        foreach ($sorts as $sort) {
            list($sortCol, $sortDir) = explode('|', $sort);
            $query = $query->orderBy($sortCol, $sortDir);
        }
    } else {
        $query = $query->orderBy('id', 'asc');
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

    $pagination = $query->with('address')->paginate($perPage);
    $pagination->appends([
        'sort' => request()->sort,
        'filter' => request()->filter,
        'per_page' => request()->per_page
    ]);

    // The headers 'Access-Control-Allow-Origin' and 'Access-Control-Allow-Methods'
    // are to allow you to call this from any domain (see CORS for more info).
    // This is for local testing only. You should not do this in production server,
    // unless you know what it means.
    return response()->json(
            $pagination
        )
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET');
});

Route::get('browserify/bootstrap', function() {
    return view('welcome');
});

Route::get('webpack/bootstrap', function() {
    return view('webpack.bootstrap');
});

Route::get('play', function() {
    $users = App\User::paginate();
    return view('play', compact('users'));
});

Route::get('/', function() {
    return redirect('https://github.com/ratiw/vue-table');
});
