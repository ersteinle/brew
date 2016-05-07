<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Event;
use App\EventsImg;
use \Auth as Auth;

class EventsController extends Controller
{
    
    public function __construct() {
        
    }
    
    /*
     * Index is accessed through the GET route. It gathers all events that have
     * not passed and sends an array of events to the events view. Sends the view
     * a message (if any), and toggleEdit (true: enables admin to edit any event).
     */
    public function index(Request $request, $edit = 0) {
        $toggleEdit;
        //Sets $edit variable from route paramater "edit"
        if($toggleEdit = $request->get('enableEdit')) {
            
        } else {
            $toggleEdit = 0;
        }
        
        //get all events that have not passed from database
        $currentEvents = Event::where('date', '>=', date('Y-m-d h-i-s', time()))->orderBy('date')->get();
        
        //menuSelect highlights current page on menu, events returns array of current events, messaage carries info such as "Succesfull update", toggleEdit enables editing 
        $eventArray = array('menuSelect' => 1, 'events' => $currentEvents, 'message' => $request->get('message'), 'toggleEdit' => $toggleEdit);

        return view('events', $eventArray);
    }
    
    /*
     * Called when submiting a new event (POST route). Image is resized to XXwXXXh
     * and added to 'eventsImg' table. Then event info is inserted into 'events' table
     */
    public function create(Request $request) {
        
       /**
        * Use GD to Resize
        */
       $id;
        
        //Ensure img has an acceptable extention
        if(true) {
            $eventImg = new EventsImg;

                $eventImg->img = file_get_contents($request->file('img'));
                $eventImg->created_at = date('Y-m-d h:i:s',time()); 

                $eventImg->save();
                
                $id = $eventImg->id;
                
                echo $id;
            
        } else { 
            $img = "0";
        }
        
        //add event to database
       if(Event::insert(
            [
               'title' => $request->get('title'),
               'date' => $request->get('date'),
               'img' => $id,
               'description' => $request->get('shortDesc'),
               'longDescription' => $request->get('longDesc'),
               'link' => $request->get('link'),
               'uploaderID' => Auth::user()->id,
               'authCheck' => $request->get('authCheck'),
               'highlight' => $request->get('authCheck'),
               'created_at' => date('Y-m-d h-i-s',time()),
           ])) {
           
           return (redirect()->route('events')->with('message', 'Successfully Added Event ' . $id));
       }
       
       else {
           echo "Error. Event not added to database";
       }
    }
    
    /*
     * Called when user clicks 'Edit Event' on events page. Calls editEvent page
     * and passes event ID.
     */
    public function edit(Request $request) {
        //Edit Form
       return view('editEvent', ['id' => $request->get('id')]);
    }
    
    /*
     * Edit Event (PUT Route). When user submits an edit, this updates the table
     * to reflect changes.
     */
    public function update(Request $request) {
        
        //if user changes photo
        if($request->file('img') != '') {
        $eventImg = EventsImg::find(Event::find($request->get('id'))->img);

                $eventImg->img = file_get_contents($request->file('img'));
                $eventImg->updated_at = date('Y-m-d h:i:s',time()); 

                $eventImg->save();
                
        } else {
            
        }
        
        $updateEvent = Event::find($request->get('id'));
        
        $updateEvent->title = $request->get('title');
        $updateEvent->date = $request->get('date');
        $updateEvent->description = $request->get('shortDesc');
        $updateEvent->longDescription = $request->get('longDesc');
        $updateEvent->link = $request->get('link');
        $updateEvent->uploaderID = Auth::user()->id;
        $updateEvent->authCheck = $request->get('authCheck');
        $updateEvent->highlight = $request->get('authCheck');
        $updateEvent->updated_at = date('Y-m-d h:i:s',time());

        if($updateEvent->save()) {
           return (redirect()->route('events')->with('message', 'Successfully Updated Event - ID: ' . $updateEvent->id));
       }
       
       else {
           echo "Error. Event not Updated";
       }
    }
    
    /*
     * Delete Event (DELETE Route)
     */
    public function delete(Request $request) {
        
       if(Event::destroy($request->get('id'))) {
           
           return (redirect()->route('events')->with('message', 'Successfully Deleted Event'));
       }
       
       else {
           echo "Error. Event not deleted";
       }
    }
}