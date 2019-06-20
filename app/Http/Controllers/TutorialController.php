<?php 

namespace App\Http\Controllers;

use \App\Tutorial;
use \App\RelatedTutorial;
use \App\ThumbsUp;
use \App\ThumbsDown;
use Illuminate\Http\Request;

class TutorialController extends Controller {
    

    public function getIndex() {
        $tutorials = Tutorial::orderBy('title')->paginate(10);
        return view('tutorial.index', ['tutorials'=>$tutorials]);
    }

    public function getTutorial($id)
    {
        $relatedTutorials = Tutorial::find($id)->relatedTutorials;
        $tutorial = Tutorial::where('id', $id)->first();
        return view('tutorial.guide', ['tutorial' => $tutorial, 'relatedTutorials' => $relatedTutorials]);
    }


    public function getTutorialThumbsUp($id) {
        $tutorial = Tutorial::where('id', $id)->first();
        $thumbsUp = new ThumbsUp();
        $tutorial->thumbsUps()->save($thumbsUp);
        return redirect()->back();
    }

    public function getTutorialThumbsDown($id) {
        $tutorial = Tutorial::where('id', $id)->first();
        $thumbsDown = new ThumbsDown();
        $tutorial->thumbsDowns()->save($thumbsDown);
        return redirect()->back();
    }

    public function getTutorialCreate() {
        $relatedTutorials = Tutorial::all();
        return view('admin.tutorialCreate', ['relatedTutorials' => $relatedTutorials]);
    }

    public function postTutorialCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $tutorial = new Tutorial([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $tutorial->save();
        $tutorial->relatedTutorials()->attach($request->input('relatedTutorials') === null ? [] : $request->input('relatedTutorials'));
        
        return redirect()->route('admin.tutorialList')->with('info', 'Tutorial created, Title is: ' . $request->input('title'));
        
    }

    public function getTutorialList() {
        $tutorials = Tutorial::orderBy('Title')->paginate(10);
        return view('admin.tutorialList', ['tutorials'=>$tutorials]);
    }

    public function getTutorialEdit($id) {
        $relatedTutorials = Tutorial::all();
        $tutorial = Tutorial::find($id);
        return view('admin.tutorialEdit', ['tutorial' => $tutorial, 'relatedTutorials' => $relatedTutorials]);
    }

    public function postTutorialUpdate(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $tutorial = Tutorial::find($request->input('id'));
        $tutorial->title = $request->input('title');
        $tutorial->content = $request->input('content');
        $tutorial->save();
        $tutorial->relatedTutorials()->sync($request->input('relatedTutorials') === null ? [] : $request->input('relatedTutorials'));

        return redirect()->route('admin.tutorialList')->with('info', 'Tutorial updated');
    }

    public function getTutorialDelete($id) {
        $tutorial = Tutorial::find($id);
        $tutorial->thumbsUps()->delete();
        $tutorial->thumbsDowns ()->delete();
        $tutorial->relatedTutorials()->detach();
        $tutorial->delete();
        return redirect()->route('admin.tutorialList')->with('info', 'Tutorial deleted');
    }
}

?>