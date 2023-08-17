<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cập nhật thông tin '. $userDetail->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ Session::get('message') }}</li>             
                    </ul>
                </div>
            @endif
            <a href="{{route('admin.user')}}" style="background: blue; color:white" class="btn outline-dark my-2">
                Trở về 
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thông tin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.user.update', [$userDetail->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group my-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control bg-neutral-400" id="email" readonly name="email" value="{{$userDetail->email}}">
                            </div>
                            <div class="form-group my-2">
                                <label for="name">Tên người dùng</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người dùng" value="{{ $userDetail->name }}">
                            </div>
                            <div class="form-group my-2">
                                <label for="role">Quyền hạn</label>
                                <select name="role" id="role"  class="form-control">
                                    @foreach($listRole as $role)
                                        <option value="{{$role->id}}" {{$userDetail->role_id == $role->id ? 'selected' :"" }} class="form-control" >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary text-gray-900">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>