
<a onclick="markNotificationAsRead('{{$notification->id}}')" 
  class="dropdown-item" 
    href='/studygroup/{{$notification->data['studygroup']['id']}}/course/{{$notification->data['course']['id']}}/questions'
      style=" border:1px solid red; margin:2px; white-space: initial;"> 
  <b>User:</b>{{$notification->data["user"]["name"]}}
  <br>
  <b>StudyGroup:</b>{{$notification->data["studygroup"]["name"]}}
  <br>
  <b>Course:</b>{{$notification->data["course"]["title"]}}
  <br>
  <b>Question:</b> '{{$notification->data["question"]}}'
</a>