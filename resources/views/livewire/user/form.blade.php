<link rel="stylesheet" type="text/css" href="{{ URL::to('css/userlist.css') }}">
<div class="container">
  <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ $user->profile_photo_url }}" alt="Admin" class="rounded-circle p-1 bg-default" width="110">
                    <div class="mt-3">
                        <h4>{{ $user->name }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"></div>
                        <div class="text-secondary">
                        <div class="profile_btn btn btn-primary px-4">Select New Photo<input type="file" name="profile_file" wire:model="profilephoto"></div>
                        <div class="profile_btn btn btn-danger px-4">Remove Photo<input type="button" class="btn btn-danger px-4" value=""></div>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" wire:model="name">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" value="{{ $user->email }}" name="mail" wire:model="mail">
                    </div>
                    </div>
                    <!-- <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button> -->
                    <div class="row">
                    <div class="col-sm-12 text-secondary">
                        <!-- <input type="button" class="btn btn-primary px-4" value="Save Changes" > -->
                        <button wire:click="saveuser({{$user->uid}})" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
  </div>
</div>

<style>
  .profile_btn {
  position: relative;
  overflow: hidden;
}
.profile_btn input {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
</style>
