
{{-- INCLUDE BLADE FILE FOR NOTIFICATIONS --}}

<a onclick="markNotificationAsRead()" class="dropdown-item" 
        href='/studygroup/{{$notification->data["message"]["studygroup_id"]}}/study-chat'
        style=" border:1px solid black; margin:2px; white-space: initial;"
    > 
  <b>User:</b>{{$notification->data["user"]["name"]}}
  <br>
 <b>StudyGroup:</b>{{$notification->data["studygroup"]["name"]}}
  <br>
  <b>Message:</b> '{{$notification->data["message"]["text"]}}'
</a>

{{-- <a style="margin-left:4px;border:1px solid black;"href="">mark as read</a> --}}