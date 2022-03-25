
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/userlist.css') }}">

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="main-box clearfix">
        <div class="table-responsive">
          <table class="table user-list">
            <thead>
              <tr>
                <th><span>User Photo</span></th>
                <th><span>User Name</span></th>
                <th class="text-center"><span>Status</span></th>
                <th><span>Email</span></th>
                <th><span>Created</span></th>
                <th><span>Action</span></th>
              </tr>
            </thead>
            <tbody>
            @foreach($users AS $user)
              <tr>
                <td>
                  <img src="{{ $user->profile_photo_url }}" alt="">
                </td>
                <td>
                  {{ $user->name }}
                </td>
                <td class="text-center">
                  <span class="label label-default">{{ ($user->status == '1') ? 'Active' : 'Inactive' }}</span>
                </td>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                  {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                </td>
                <td style="width: 20%;">
                  <a href="{{ route('useredit', ['uid'=> $user->id]) }}" class="table-link">
                    <button class="btn btn-primary">
                      <i class="fa fa-pencil"></i>
                    </button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{  $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>