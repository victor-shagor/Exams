<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;

class ExamController extends Controller
{
    //
    public function index() {
        // function tech ($question){
        //     return $question->category == 'technical';
        // };
        $technical = Exam::where('category', '=', 'technical')->get();
        $logical = Exam::where('category', '=', 'logical')->get();
        $aptitude = Exam::where('category', '=', 'aptitude')->get();
        // $questionToArry = $questions->toArray();
        // $som = array_map(function ($var){
        //     error_log($var);
        //     // return $question->category;
        // },$questionToArry);
        // return ($questionToArry);
        return view('exam.index', [
          'technical' => $technical,
          'logical' => $logical,
          'aptitude' => $aptitude,
        ]);
      }

      public function store() {

        $exam = new Exam();
    
        $exam->question = request('question');
        $exam->answers = request('answers');
        $exam->category = request('category');
    
        $update = $exam->save();
    
        return redirect('/')->with('mssg', 'Question added succesfully');
        // return view('exam.index');
    
      }

      public function destroy($id) {

        $question = Exam::findOrFail($id);
        $question->delete();

        return redirect('/')->with('mssg', 'Question deleted succesfully');
    
      }

      public function update() {
        $id = request('question_id');
        $question = array(
          'question' => request('question'),
        'answers' => request('answers'),
        'category' => request('category')
        );
        Exam::where('id', $id)->update($question);

        return redirect('/')->with('mssg', 'Question updated succesfully');
    
      }
}
