<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cập nhật quyền '. $roleDetail->name) }}
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
            <a href="{{route('admin.role')}}" style="background: blue; color:white" class="btn outline-dark my-2">
                Trở về 
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật quyền hạn</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.role.update', [$roleDetail->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group my-3">
                                <label for="code">Mã quyền hạn</label>
                                <input type="text" class="form-control bg-neutral-400" id="code" readonly name="code" placeholder="Nhập mã quyền hạn" value="{{$roleDetail->code}}">
                            </div>
                            <div class="form-group my-2">
                                <label for="name">Tên quyền hạn</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quyền hạn" value="{{ $roleDetail->name }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary text-gray-900">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>