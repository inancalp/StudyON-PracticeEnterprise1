
<a onclick="markNotificationAsRead('{{$notification->id}}')"
  class="dropdown-item" 
    href="/studygroup/{{$notification->data['studygroup']['id']}}/study-chat" 
      style="margin:2px; white-space: initial;"> 
  <b style="background-color: lightblue; padding:2px; border-radius:5px; ">New Message!</b>
  <br>
  <b>By -> </b>{{$notification->data["user"]["name"]}}
  <br>
  <b>StudyGroup -> </b>{{$notification->data["studygroup"]["name"]}}
  <br>
  <b>Message -> </b> '{{$notification->data["message"]["text"]}}'
  <hr>
</a>