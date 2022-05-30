
<a onclick="markNotificationAsRead('{{$notification->id}}')" 
  class="dropdown-item" 
    href='/studygroup/{{$notification->data['studygroup']['id']}}/course/{{$notification->data['course']['id']}}/questions'
      style="margin:2px; white-space: initial;"> 
  <b style="background-color: lightblue; padding:2px; border-radius:5px; ">New Question!</b>
  <br>
  <b>By -> </b>{{$notification->data["user"]["name"]}}
  <br>
  <b>StudyGroup -> </b>{{$notification->data["studygroup"]["name"]}}
  <br>
  <b>Course -> </b>{{$notification->data["course"]["title"]}}
  <hr>
  {{-- <br>
  <b>Question:</b> '{{$notification->data["question"]}}' --}}
</a>