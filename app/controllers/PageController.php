<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function buildPage($id)
	{	try {
			$user = User::findOrFail($id);
		}
		catch(ModelNotFoundException $e){
			$name = hash('crc32',$id);
			//return $id;
			$user = User::store(array('id'=>$id, 'name'=>$name));
			$user = User::find($id);
		}
		$posts = Page::get5RandomPosts($user->name);
    		return View::make('2')->with('id', $user->id)->with('name',$user->name)->with('posts',$posts);
	}
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'code'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/')
                ->withErrors($validator);
        } else {
            // store
	    $id = '/u/'.Session::getId();
	    Page::saveFormData(Input::except(array('_token')));
            return Redirect::to($id)->withMessage('Done!');
        }
    }
}
