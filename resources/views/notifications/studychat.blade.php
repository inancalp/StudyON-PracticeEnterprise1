
<a onclick="markNotificationAsRead('{{$notification->id}}')"
  class="dropdown-item" 
    href="/studygroup/{{$notification->data['studygroup']['id']}}/study-chat" 
      style=" border:1px solid black; margin:2px; white-space: initial;"> 

  <b>User:</b>{{$notification->data["user"]["name"]}}
  <br>
  <b>StudyGroup:</b>{{$notification->data["studygroup"]["name"]}}
  <br>
  <b>Message:</b> '{{$notification->data["message"]["text"]}}'
</a>