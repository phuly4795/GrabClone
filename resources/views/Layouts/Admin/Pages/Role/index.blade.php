<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quyền hạn') }}
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
            <div >
                <!-- Button trigger modal -->
                <button type="button" style="background: blue; color:white" class="btn outline-dark my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Thêm quyền hạn
                </button>
                
                <!-- Modal add -->
                <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm quyền hạn</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('admin.role')}}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group my-3">
                                        <label for="code">Mã quyền hạn</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã quyền hạn" value="{{ old('code') }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="name">Tên quyền hạn</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quyền hạn" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary text-gray-900" data-bs-dismiss="modal">đóng</a>
                                    <button type="submit" class="btn btn-primary text-gray-900">Thêm</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                   <!-- Modal update -->
                   <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật quyền hạn</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('admin.role')}}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group my-3">
                                        <label for="code">Mã quyền hạn</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã quyền hạn" value="{{ old('code') }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="name">Tên quyền hạn</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quyền hạn" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary text-gray-900" data-bs-dismiss="modal">đóng</a>
                                    <button type="submit" class="btn btn-primary text-gray-900">Thêm</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã quyền</th>
                                <th>Tên quyền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="text-lg">
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href=""><i class="fa-solid fa-pen-to-square"></i> </a>
                                        |<i class="fa-solid fa-trash"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        let table = new DataTable('#myTable');
    </script>
    
</x-app-layout>
