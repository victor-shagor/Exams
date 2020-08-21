@extends('layouts.layout')

@section('content')
        <div class="flex-center position-ref full-height">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body create-question">
      <form action="/question" method="POST">
  @csrf
    <label for="name">question:</label>
    <textarea name="question" id="question" rows="4" cols="50" required></textarea>
    <label for="category">Category:</label>
    <select name="category" id="category">
      <option value="technical">Technical</option>
      <option value="aptitude">Aptitude</option>
      <option value="logical">Logical</option>
    </select>
    <label for="name">Answers:</label>
    <input type="text" name="answers[]" id="answers1" require placeholder='option1'><br>
    <input type="text" name="answers[]" id="answers2" require placeholder='option2'><br>
    <input type="text" name="answers[]" id="answers3" require placeholder='option3'><br>
    <input type="text" name="answers[]" id="answers4" require placeholder='option4'><br>
    <input class='btn-primary' type="submit" value="Add Question">
  </form>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#exampleModal">
  Add Question
</button>
          <div class='cat-wrapper'>
            <div class="cat show tech">Technical</div>
            <div class="cat apt">Aptitude</div>
            <div class="cat log">Logical</div>
          </div>
        <div class='que-wrapper'>
          @foreach($technical as $question)
          <div class="">
          <div class="que card-que {{$question->category}}">
           <p>{{$loop->index+1}} {{ $question->question }}</p>
           <div class='option-grid'>
           @foreach($question->answers as $answer)
           <div class="single-que">
            <input type="radio" id="{{$loop->index}}" name="{{$answer}}" value="{{$loop->index+1}}">
            <label for="{{$loop->index}}">{{$answer}}</label><br>
          </div>
            @endforeach
           </div>
            <div class="action">
            <form action="/question/{{$question->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
        <button><i class="fas fa-edit text-success" data-toggle="modal" data-target="#edit" data-question_id="{{$question->id}}" data-category="{{$question->category}}"
          data-question="{{$question->question}}" data-answer1="{{$question->answers[0]}}" 
          data-answer4="{{$question->answers[3]}}" data-answer3="{{$question->answers[2]}}" 
          data-answer2="{{$question->answers[1]}}"></i></button>
        </div>
          </div>
        </div>
          @endforeach
          @foreach($aptitude as $question)
          <div class="">
          <div class="que card-que {{$question->category}}">
           <p>{{$loop->index+1}} {{ $question->question }}</p>
           <div class='option-grid'>
            @foreach($question->answers as $answer)
            <div class="single-que">
             <input type="radio" id="{{$loop->index}}" name="{{$answer}}" value="{{$loop->index+1}}">
             <label for="{{$loop->index}}">{{$answer}}</label><br>
           </div>
             @endforeach
            </div>
            <div class="action">
            <form action="/question/{{$question->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
          <button><i class="fas fa-edit text-success" data-toggle="modal" data-target="#edit" data-question_id="{{$question->id}}" data-category="{{$question->category}}"
            data-question="{{$question->question}}" data-answer1="{{$question->answers[0]}}" 
            data-answer4="{{$question->answers[3]}}" data-answer3="{{$question->answers[2]}}" 
            data-answer2="{{$question->answers[1]}}"></i></button>
            </div>
          </div>
        </div>
          @endforeach
          @foreach($logical as $question)
          <div class="">
          <div class="que card-que {{$question->category}}">
           <p>{{$loop->index+1}} {{ $question->question }}</p>
           <div class='option-grid'>
            @foreach($question->answers as $answer)
            <div class="single-que">
             <input type="radio" id="{{$loop->index}}" name="{{$answer}}" value="{{$loop->index+1}}">
             <label for="{{$loop->index}}">{{$answer}}</label><br>
           </div>
             @endforeach
            </div>
            <div class="action">
            <form action="/question/{{$question->id}}" method="POST">
          <!-- @csrf
          @method('DELETE') -->
          <button><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
          <button><i class="fas fa-edit text-success" data-toggle="modal" data-target="#edit" data-question_id="{{$question->id}}" data-category="{{$question->category}}" 
            data-question="{{$question->question}}" data-answer1="{{$question->answers[0]}}" 
            data-answer4="{{$question->answers[3]}}" data-answer3="{{$question->answers[2]}}" 
            data-answer2="{{$question->answers[1]}}"></i></button>
          </div>
        </div>
      </div>
          @endforeach
          </div>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body create-question">
      <form action="/question" method="POST">
  @csrf
  @method('PUT')
    <label for="name">question:</label>
    <textarea name="question" id="question" rows="4" cols="50" required></textarea>
    <label for="category">Category:</label>
    <select name="category" id="category">
      <option value="technical">Technical</option>
      <option value="aptitude">Aptitude</option>
      <option value="logical">Logical</option>
    </select>
    <label for="answers">Answers:</label>
    <input type="text" name="answers[]" id="answer1" require placeholder='option1'><br>
    <input type="text" name="answers[]" id="answer2" require placeholder='option2'><br>
    <input type="text" name="answers[]" id="answer3" require placeholder='option3'><br>
    <input type="text" name="answers[]" id="answer4" require placeholder='option4'><br>
    <input type="hidden" id="question_id" name='question_id'>
    <input class='btn-primary' type="submit" value="Edit Question">
  </form>
      </div>
    </div>
  </div>
</div>
        </div>       
@endsection
