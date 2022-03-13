<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
*the DocumentController needs to retrieve users from a data source
*where we inject a service capable of retrieving documents from the db
*note: we can swap Eloquent injector with another
*/
class DocumentController extends Controller{
    /**
     * The document implementation
     * 
     * @var Document
    */

    /**
      * Create a new controller instance
      *
      *@param Document $docs
      *@return void
    */

    public function __construct(Document $docs)
    {
      $this->docs = $docs;
    }

    public function upload(Request $request)
    {
        $email=$_REQUEST['email'];
        $user = User::select('select id from users where email = ?', [$email]);
        
        $file = $request->file('file');
        $doc_id=$_REQUEST['id'];
        $user_id=$user->id;
        $upload_date=$_REQUEST[SQL_TIMESTAMP];
        $title=$file['title'];
        $type=$file->getClientOriginalExtension();

          DB::table('documents')->insert([
              ['doc_id'=>$doc_id, 'user_id'=>$user_id, 'upload_date'=>$upload_date,'title'=>$title,'type'=>$type, 'file_metadata'=>$file]
          ]);
    }

    public function create_document_list(Request $request){
        $email=$_REQUEST['email'];
        $user = User::select('select id from users where email = ?', [$email]);
        
        $file = $request->file('file');
        $doc_id=$_REQUEST['id'];
        $user_id=$user->id;
        $upload_date=$_REQUEST[SQL_TIMESTAMP];
        $title=$file['title'];
        $type=$file->getClientOriginalExtension();
        foreach($request as $request){
          DB::table('documents')->insert([
              ['doc_id'=>$doc_id, 'user_id'=>$user_id, 'upload_date'=>$upload_date,'title'=>$title,'type'=>$type, 'file_metadata'=>$file]
          ]);
        }
    }

    public function find_document_by_status()
    {
          $docs= DB::select('select id from documents where status = ?', []);
          if($docs['status'] == "visited"){
              return view('user.index', ['documents'=> $docs]);
          }
    }

    public function get_document_by_id(Request $request)
    {
        $email=$_REQUEST['email'];
        $user = User::select('select id from users where email = ?', [$email]);
        $user_id=$user->id;

        $file = $request->file('file');
        $title = $file['title'];
        $doc_id = DB::select('select * from documents where title = ? and user_id = ?', $title, $user_id);
        DB::select('select * from documents where id = ?', $doc_id);
    }

    public function delete_document_by_id(Request $request){
        $email=$_REQUEST['email'];
        $user = User::select('select id from users where email = ?', [$email]);
        $user_id=$user->id;

        $file = $request->file('file');
        $title = $file['title'];
        $doc_id = DB::select('select * from documents where title = ? and user_id = ?', $title, $user_id);
        DB::delete([$doc_id]);
    }

    // public function search_documents_by_query(Request $request){

    // }



}