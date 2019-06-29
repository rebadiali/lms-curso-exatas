<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('course', 'CourseController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('user', 'UserController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('verify', 'VerifyController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('professor', 'ProfessorController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('grading', 'GradingController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('theme', 'ThemeController',
   [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('question', 'QuestionController',
   [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('questionnaire', 'QuestionnaireController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::resource('questionnairebycourse', 'QuestionnaireByCourseController',
   [
        'except' => [
            "create",
            "edit"
        ],
    ]
 );

Route::put('question/{question}/associate', 'QuestionController@associateQuestionToTheme');

Route::resource('alternative', 'AlternativeController',
   [
        'except' => [
            "create"
        ],
    ]
);

Route::resource('answer', 'AnswerController',
    [
        'except' => [
            "create",
            "edit"
        ],
    ]
);

Route::post('user/register', 'APIRegisterController@register');

Route::post('user/login', 'APILoginController@login');

Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::post('user/logout', 'APILogoutController@logout');
});