<div class="account-details">
<table>
  <tbody>
    <tr>
      <td>Name</td>
      <td>{{$account[0]->name}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{$account[0]->email}}</td>
    </tr>
    <tr>
      <td>Access</td>
      <td>{{$account[0]->access}}</td>
    </tr>
  </tbody>
</table>
<br>
@if($account[0]->access_id != 0 )
<table>
  <tbody>
    <tr>
      <td>School</td>
      <td>{{$account[0]->school}}</td>
    </tr>
  </tbody>
  <tr>
      <td>Academic Year</td>
      <td>@if(count($activeAY) == 0) no active Academic Year @else {{Carbon\Carbon::parse($activeAY[0]->from)->format('Y')}} - {{Carbon\Carbon::parse($activeAY[0]->to)->format('Y')}} @endif</td>
    </tr>
</table>
@endif

</div>